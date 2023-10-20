<?php

require __DIR__ . '/../User.php';

class EditLinkedIn extends User
{
    public static function updateLinkedIn($user_id, $linkedin): int
    {
        $db = Database::getInstance();

        try {
            $db->update(
                'User',
                'update users set linkedin = :linkedin where id like :id',
                [
                    ':id' => $user_id,
                    ':linkedin' => $linkedin,
                ]
            );
            return 1;
        } catch (Exception $e) {
            echo $e;
            die();
        }
    }
}
