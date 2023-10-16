<?php

class UserProgrammingLanguages
{
    protected $id;
    protected $user_id;
    protected $programming_language_id;

    public static function createUserPLang($user_id, $programming_language_id)
    {
        $db = Database::getInstance();
        $db->insert(
            'UserProgrammingLanguages',
            "insert into users_programming_languages (user_id, programming_language_id) values (:user_id, :programming_language_id)",
            [
                ':user_id' => $user_id,
                'programming_language_id' => $programming_language_id
            ]
        );
        return $db->lastInsertId();
    }
}
