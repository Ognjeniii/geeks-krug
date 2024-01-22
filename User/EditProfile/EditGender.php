<?php

require __DIR__ . '/../User.php';

class EditGender extends User
{
    public static function updateGender($user_id, $gender): int
    {
        $db = Database::getInstance();
        try {
            $db->update(
                'User',
                "update users set gender = :gender where id like :id",
                [
                    ':gender' => $gender,
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
