<?php

require __DIR__ . '/../User.php';

class EditLeetCode extends User
{
    public static function updateLeetCode($user_id, $leetcode): int
    {
        $db = Database::getInstance();

        try {
            $db->update(
                'User',
                'update users set leetcode = :leetcode where id like :id',
                [
                    ':id' => $user_id,
                    ':leetcode' => $leetcode,
                ]
            );
            return 1;
        } catch (Exception $e) {
            echo $e;
            die();
        }
    }
}
