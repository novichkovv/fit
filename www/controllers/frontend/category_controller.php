<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 17.09.2015
 * Time: 16:39
 */
class category_controller extends controller
{
    public function index()
    {
        $this->addScript('libs/isotope.min');
        $this->view_only('category' . DS . 'index');
    }

    public function index_na()
    {
        $this->index();
    }
}