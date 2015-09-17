<?php
/**
 * Created by PhpStorm.
 * User: asus1
 * Date: 16.09.2015
 * Time: 23:31
 */
class categories_model extends model
{
    public function getCategories()
    {
        $tmp = $this->get_all($stm = $this->pdo->prepare('
            SELECT * FROM categories ORDER BY parent, position
        '));
        $res = [];
        foreach ($tmp as $k => $v) {
            if(!$v['parent']) {
                $res[$v['id']] = $v;
                unset($tmp[$k]);
            }
        }
        foreach ($tmp as $k => $v) {
            if(array_key_exists($v['parent'], $res)) {
                unset($tmp[$k]);
                $res[$v['parent']]['children'][$v['id']] = $v;
                $res[$v['parent']]['children'] = $this->getCategoriesChildren($tmp, $res[$v['parent']]['children'], $v['id']);
            }
        }
        return $res;
    }


    private function getCategoriesChildren($tmp, $res, $parent)
    {
        foreach ($tmp as $k => $v) {
            if($parent == $v['parent']) {
                if(!array_key_exists($parent, $res)) {
                    unset($tmp[$k]);
                    $res[$v['id']] = $v;
                } else {
                    unset($tmp[$k]);
                    $res[$v['parent']]['children'][$v['id']] = $v;
                    $res[$v['parent']]['children'] = $this->getCategoriesChildren($tmp, $res[$v['parent']]['children'], $v['id']);
                }
            }

        }
        return $res;
    }
}