<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 26.03.15
 * Time: 12:52
 */
class asanatt_users_model extends model
{
    public function getUsers()
    {
        $stm = $this->pdo->prepare('
        SELECT
            u.*,
            g.group_name
        FROM
            asanatt_users u
        JOIN
            asanatt_user_groups g
            ON u.user_group_id = g.id
        ORDER BY create_date
        ');
        return $this->get_all($stm);
    }

}