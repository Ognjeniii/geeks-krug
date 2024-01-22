<?php

require __DIR__ . '/../User.php';

class EditPassword extends User
{
    public static function editPassword($user_id, $old_password, $new_password)
    {
        $db = Database::getInstance();
        try {
            $pass_returned = self::checkPass($user_id, $old_password);
            if ($pass_returned == 0) {
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

    public static function checkPass($user_id, $old_password): int
    {
        $db = Database::getInstance();
        try {
            $user = $db->select(
                'User',
                "select * from users where id like :id",
                [
                    ':id' => $user_id
                ]
            );

            $pass = null;
            foreach ($user as $p) {
                $pass = $p;

                if (password_verify($old_password, $pass->getPassword())) {
                    return 1;
                }
            }
        } catch (Exception $ee) {
//            echo $ee;
//            die();
            return 0;
        }
        return 0;
    }
}
