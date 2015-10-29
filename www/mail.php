<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 29.10.2015
 * Time: 11:21
 */
$result = mail('novichkovv@bk.ru', 'subject', 'message');

if($result)
{
    echo 'все путем';
}
else
{
    echo 'что-то не так';
}