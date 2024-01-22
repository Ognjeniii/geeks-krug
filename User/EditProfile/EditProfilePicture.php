<?php

require __DIR__ . '/../User.php';

class EditProfilePicture extends User
{
    public static function updatePicture($user_id, $picture)
    {
        $db = Database::getInstance();

        try {
            $db->update(
                'User',
                'update users set picture = :picture where id like :id',
                [
                    ':id' => $user_id,
                    ':picture' => $picture
                ]
            );
            return 1;
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function getProfilePictureById($user_id)
    {
        $db = Database::getInstance();

        $result = $db->select(
            'User',
            'select picture from users where id like :id',
            [
                ':id' => $user_id
            ]
        );

        foreach ($result as $r) {
            return $r;
        }
        return null;
    }

    public static function binToPicture($user_id)
    {
        $user = User::getUserById($user_id);
        if($user->getPicture() == null){
            return null;
        }
        $binary_data = $user->getPicture();
        return base64_encode($binary_data);
    }
}
