<?php

require __DIR__ . '/../User.php';

class EditPassword extends User
{
    public static function editPassword($user_id, $old_password, $new_password)
    {
        $db = Database::getInstance();
        try {
            $user = self::checkPass($user_id, $old_password);
            echo $user->getUsername();
            die();
            if ($user == null) {
                return 0;
            }
            $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $db->update(
                'User',
                "update users set password = :new_password where id like :id",
                [
                    ':new_password' => $hashed_new_password,
                    ':id' => $user_id,
                ]
            );
            return 1;
        } catch (Exception $ee) {
            echo $ee;
            die();
            return 0;
        }
    }

    public static function checkPass($user_id, $old_password)
    {
        $db = Database::getInstance();
        try {
            $hashed_old_password = password_hash($old_password, PASSWORD_DEFAULT);
            $users = $db->select(
                'User',
                "select * from users where id like :id and password like :password",
                [
                    ':id' => $user_id,
                    ':password' => $hashed_old_password
                ]
            );

            foreach ($users as $user) {
                return $user;
            }
        } catch (Exception $ee) {
            return null;
        }
        return null;
    }
}
