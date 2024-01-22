<?php

require __DIR__ . '/../User.php';

class EditAddress extends User
{
    public static function updateAddress($user_id, $address)
    {
        $db = Database::getInstance();

        try {
            $db->update(
                'User',
                'update users set address = :address where id like :id',
                [
                    ':id' => $user_id,
                    ':address' => $address,
                ],
            );

            return 1;
        } catch (Exception $e) {
            echo $e;
            die();
        }
    }
}
