<?php

require __DIR__ . '/../User.php';

class EditUsername extends User
{
    public static function updateUsername($user_id, $username): int
    {
        $db = Database::getInstance();
        try {
            $user = User::getUserByUsername($username);

            if ($user == null) {
                $db->update(
                    'User',
                    "update users set username = :username where id like :id",
                    [
                        ':username' => $username,
                        ':id' => $user_id
                    ]
                );
                return 1;
            } elseif ($user->getId() == $user_id) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $ee) {
//            echo $ee;
//            die();
        }
        return 0;
    }
}
