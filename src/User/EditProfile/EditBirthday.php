<?php

require __DIR__ . '/../User.php';

class EditBirthday extends User
{
    public static function updateBirthday($user_id, $birthday)
    {
        $db = Database::getInstance();

        try {
            $db->update(
                'User',
                'update users set birthday = :birthday where id like :id',
                [
                    ':id' => $user_id,
                    ':birthday' => $birthday,
                ]
            );
            return 1;
        } catch (Exception $e) {
            echo $e;
            die();
        }
    }
}
