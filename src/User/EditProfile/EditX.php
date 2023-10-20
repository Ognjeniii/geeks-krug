<?php

require __DIR__ . '/../User.php';

class EditX extends User
{
    public static function updateX($user_id, $x): int
    {
        $db = Database::getInstance();

        try {
            $db->update(
                'User',
                'update users set x = :x where id like :id',
                [
                    ':id' => $user_id,
                    ':x' => $x,
                ]
            );

            return 1;
        } catch (Exception $e) {
            echo $e;
            die();
        }
    }
}
