<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 29.10.2015
 * Time: 11:21
 */
$result = mail('yourmail@domain.ru', 'subject', 'message');

if($result)
{
    echo '��� �����';
}
else
{
    echo '���-�� �� ���';
}