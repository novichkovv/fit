<?php
/**
 * Created by PhpStorm.
 * User: asus1
 * Date: 19.09.2015
 * Time: 21:08
 */
class common_controller extends controller
{
    public function index()
    {
        $categories = $this->model('categories')->getCategories();
        $this->render('menu_categories', $categories);
    }

    protected function render($key, $value)
    {
        $common_vars = registry::get('common_vars');
        if(!$common_vars) {
            $common_vars = [];
        }
        $common_vars[$key] = $value;
        registry::set('common_vars', $common_vars);
    }
}