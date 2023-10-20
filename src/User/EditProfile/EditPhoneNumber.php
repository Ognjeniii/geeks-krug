<?php

require __DIR__ . '/../User.php';

class EditPhoneNumber extends User
{
    public static function updatePhoneNumber($user_id, $phone_number)
    {
        $db = Database::getInstance();

        try {
            $db->update(
                'User',
                'update users set phone_number = :phone_number where id like :id',
                [
                    ':id' => $user_id,
                    ':phone_number' => $phone_number,
                ],
            );

            return 1;
        } catch (Exception $e) {
            echo $e;
            die();
        }
    }
}
