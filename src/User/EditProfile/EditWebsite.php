<?php

require __DIR__ . '/../User.php';

class EditWebsite extends User
{
    public static function updateWebsite($user_id, $website)
    {
        $db = Database::getInstance();

        try {
            $db->update(
                'User',
                'update users set website = :website where id like :id',
                [
                    ':id' => $user_id,
                    ':website' => $website,
                ]
            );
            return 1;
        } catch (Exception $e) {
            echo $e;
            die();
        }
    }
}
