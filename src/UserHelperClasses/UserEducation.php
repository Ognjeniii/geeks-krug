<?php

class UserEducation
{
    protected $id;
    protected $user_id;
    protected $education_id;

    public static function createUserEducation($user_id, $education_id)
    {
        $db = Database::getInstance();
        $db->insert(
            'UserEducation',
            "insert into users_education (user_id, education_id) values (:user_id, :education_id)",
            [
                ':user_id' => $user_id,
                ':education_id' => $education_id
            ]
        );
        return $db->lastInsertId();
    }

}
