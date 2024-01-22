<?php

require __DIR__ . '/../User.php';

class EditGitHub extends User
{
    public static function updateGitHub($user_id, $github)
    {
        $db = Database::getInstance();

        try {
            $db->update(
                'User',
                'update users set github = :github where id like :id',
                [
                    ':id' => $user_id,
                    ':github' => $github,
                ]
            );
            return 1;
        } catch (Exception $e) {
            echo $e;
            die();
        }
    }
}
