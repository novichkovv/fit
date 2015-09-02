<?php
/**
 * Created by PhpStorm.
 * User: asus1
 * Date: 01.09.2015
 * Time: 19:51
 */
class finance_controller extends controller
{
    public function index()
    {

    }

    public function streams()
    {
        $this->view('finance' . DS . 'streams');
    }

    public function streams_ajax()
    {
        switch ($_REQUEST['action']) {
            case "get_list":
                $params = [];
                $params['table'] = 'finance_streams s';
                $params['select'] = array(
                    'IF(stream_type = 0, "income","outcome")',
                    's.type_name'
                );
                exit;
                break;
        }
    }
}