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
        $this->view('products' . DS . 'categories');
    }

    public function attributes()
    {
        $this->view('products' . DS . 'attributes');
    }
}