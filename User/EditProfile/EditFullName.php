<?php

require __DIR__ . '/../User.php';

class EditFullName extends User
{
    public static function updateFullName($user_id, $full_name): int
    {
        $db = Database::getInstance();
        try {
            $db->update(
                'User',
                "update users set full_name = :full_name where id like :id",
                [
                    ':full_name' => $full_name,
                    ':id' => $user_id
                ]
            );
            return 1;
        } catch (Exception $ee) {
//            echo $ee;
//            die();
        }
        return 0;
    }

}

