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
        $this->view('products' . DS . 'add');
    }

    public function categories()
    {
        $this->addScript('libs/jquery.nestable');
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
                if(!$category['position']) {
                    $category['position'] = $this->model('categories')->getByField('parent', 0, false, 'position DESC', 1)['position'] + 1;
                }
                if($category['id'] = $this->model('categories')->insert($category)) {
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

            case "get_category_data":
                $category = $this->model('categories')->getById($_POST['category_id']);
                echo json_encode(array('status' => 1, 'category' => $category));
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
                        echo json_encode(array('status' => 1));
                    } else {
                        echo json_encode(array('status' => 2));
                    }
                } else {
                    echo json_encode(array('status' => 3));
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
            $this->model('categories')->insert($row,1);
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