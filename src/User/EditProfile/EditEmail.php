<?php


require __DIR__ . '/../User.php';

class EditEmail extends User
{
    public static function updateEmail($user_id, $email): int
    {
        $db = Database::getInstance();
        try {
            $user = User::getUserByEmail($email);
            if ($user == null) {
                $db->update(
                    'User',
                    "update users set email = :email where id like :id",
                    [
                        ':email' => $email,
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
            return 0;
        }
    }
}
