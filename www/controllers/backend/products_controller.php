<?php
/**
 * Created by PhpStorm.
 * User: asus1
 * Date: 29.08.2015
 * Time: 2:07
 */
class products_controller extends controller
{
    public function index()
    {
        $this->view('products' . DS . 'list');
    }

    public function index_ajax()
    {
        switch ($_REQUEST['action']) {
            case "get_list":

                exit;
                break;
        }
    }
    
    public function add()
    {
        $this->breadcrumbs();
        $this->view('products' . DS . 'add');
    }

    public function categories()
    {
        $this->addScript('libs/jquery.nestable');
        $this->addScript('libs/ajax_upload');
        $this->addStyle('libs/jquery.nestable');
        $categories = $this->model('categories')->getCategories();
        $this->render('categories', $categories);
        $this->render('inactive_categories', $this->model('categories')->getByField('active', 0, true));
        $this->breadcrumbs();
        $this->deleteModal();
        $this->view('products' . DS . 'categories');
    }

    public function categories_ajax()
    {
        switch ($_REQUEST['action']) {
            case "save_category":
                $category = $_POST['category'];
                if(!$category['position'] && !$category['id'] && $category['active']) {
                    $category['position'] = $this->model('categories')->getByField('parent', 0, false, 'position DESC', 1)['position'] + 1;
                }
                if($category['id'] = $this->model('categories')->insert($category)) {
                    if($_POST['category']['id']) {
                        if($route = $this->model('frontend_routes')->getByFields(array('entity_id' => $category['id'], 'entity_table' => 'categories'))) {
                            $route['url_key'] = $category['category_key'];
                            $this->model('frontend_routes')->insert($route);
                        }
                    } else {
                        $route = [];
                        $route['controller'] = 'category_controller';
                        $route['method'] = 'view_category';
                        $route['url_key'] = $category['category_key'];
                        $route['entity_id'] = $category['id'];
                        $route['entity_table'] = 'categories';
                        $this->model('frontend_routes')->insert($route);
                    }
                    if($category['image']) {
                        $ext = array_pop(explode('.', $category['image']));
                        $image_name = $category['id'] . '.' . $ext;
                        rename(ROOT_DIR . 'tmp' . DS . 'uploaded' . DS . $category['image'], ROOT_DIR . 'uploads' . DS . 'images' . DS . 'category_images' . DS . $image_name);
                        $this->model('categories')->insert(array('id' => $category['id'], 'image' => $image_name));
                    }
                    unset($category['image']);
                    $this->render('category', $category);
                    if ($category['active']) {
                        $template = $this->fetch('products' . DS . 'ajax' . DS . 'active_category');
                    } else {
                        $template = $this->fetch('products' . DS . 'ajax' . DS . 'inactive_category');
                    }
                    echo json_encode(array('status' => 1, 'active' => $category['active'], 'category_id' => $category['id'], 'category_name' => $category['category_name'], 'template' => $template));
                }
                exit;
                break;

            case "serialize":
                $order = $_POST['order'];
                foreach ($order as $position => $v) {
                    $row = [];
                    $row['id'] = $v['id'];
                    $row['position'] = $position;
                    $row['parent'] = 0;
                    $this->model('categories')->insert($row);
                    unset($order[$position]);
                    if($v['children']) {
                        $this->nestable_recursion($v['children'], $v['id']);
                    }
                }
                exit;
                break;

            case "get_category_form":
                $this->render('category', $this->model('categories')->getById($_POST['category_id']));
                $template = $this->fetch('products' . DS . 'ajax' . DS . 'category_form');
                echo json_encode(array('status' => 1, 'template' => $template));
                exit;
                break;

            case "get_inactive_category":
                $template = '';
                $ids = [];
                foreach ($_POST['categories'] as $id => $name) {
                    $category = [];
                    $category['id'] = $id;
                    $ids[] = $id;
                    $category['category_name'] = $name;
                    $this->render('category', $category);
                    $template .= $this->fetch('products' . DS . 'ajax' . DS . 'inactive_category');
                }
                $this->model('categories')->makeInactive($ids);
                echo json_encode(array('status' => 1, 'template' => $template));
                exit;
                break;

            case "activate_category":
                $row = [];
                $row['id'] = $_POST['id'];
                $row['active'] = 1;
                if($id = $this->model('categories')->insert($row)) {
                    $this->render('category', $this->model('categories')->getById($id));
                    $template = $this->fetch('products' . DS . 'ajax' . DS . 'active_category');
                    echo json_encode(array('status' => 1, 'template' => $template));
                } else {
                    echo json_encode(array('status' => 2));
                }
                exit;
                break;

            case "delete_category":
                if($_POST['id'] && $_POST['table']) {
                    if($this->model($_POST['table'])->deleteById($_POST['id'])) {
                        $this->model('products_categories_relations')->delete('category_id', $_POST['id']);
                        $this->model('frontend_routes')->deleteByFields(array('entity_id' => $_POST['id'], 'entity_table' => 'categories'));
                        echo json_encode(array('status' => 1));
                    } else {
                        echo json_encode(array('status' => 2));
                    }
                } else {
                    echo json_encode(array('status' => 3));
                }
                exit;
                break;

            case "save_category_img":
                foreach ($_FILES as $file) {
                    $ext = array_pop(explode('.', $file['name']['image']));
                    move_uploaded_file($file['tmp_name']['image'], ROOT_DIR . 'tmp' . DS . 'uploaded' . DS . $_POST['rand'] . '.' . $ext);
                    echo json_encode(array('status' => 1, 'img' => $_POST['rand'] . '.' . $ext));
                }
                exit;
                break;

            case "check_unique_category_key":
                if(!$this->model('frontend_routes')->getByField('url_key', $_POST['category_key'])) {
                    echo json_encode(array('status' => 1));
                } else {
                    echo json_encode(array('status' => 2));
                }
                exit;
                break;
        }
    }

    public function nestable_recursion($order, $parent)
    {
        foreach ($order as $position => $v) {
            $row = [];
            $row['id'] = $v['id'];
            $row['position'] = $position;
            $row['parent'] = $parent;
            $this->model('categories')->insert($row);
            unset($order[$position]);
            if($v['children']) {
                $this->nestable_recursion($v['children'], $v['id']);
            }
        }
    }

    public function attributes()
    {
        $this->view('products' . DS . 'attributes');
    }
}