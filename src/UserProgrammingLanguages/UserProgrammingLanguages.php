<?php

require_once __DIR__ . '/../Database/Database.php';

class UserProgrammingLanguages
{
    protected $id;
    protected $user_id;
    protected $programming_language_id;

    public function getProgrammingLanguageId()
    {
        return $this->programming_language_id;
    }

    public static function doesAlreadyExist($user_id, $programming_language_id)
    {
        $db = Database::getInstance();
        try {
            $result = $db->select(
                'UserProgrammingLanguages',
                "select * from users_programming_languages where user_id like :user_id and programming_language_id like :programming_language_id",
                [
                    ':user_id' => $user_id,
                    ':programming_language_id' => $programming_language_id
                ]
            );

            foreach ($result as $r) {
                return $r;
            }
        } catch (Exception $ee) {
            return null;
        }
        return null;
    }

    public static function createUserPLang($user_id, $programming_language_id)
    {
        $db = Database::getInstance();
        try {
            $db->insert(
                'UserProgrammingLanguages',
                "insert into users_programming_languages (user_id, programming_language_id) values (:user_id, :programming_language_id)",
                [
                    ':user_id' => $user_id,
                    ':programming_language_id' => $programming_language_id
                ]
            );
            return 1;
        } catch (Exception $ee) {
            echo $ee;
            return 0;
        }
    }

    public static function getProgrammingLanguagesByUserId($user_id)
    {
        $db = Database::getInstance();

        try {
            $result = $db->select(
                'UserProgrammingLanguages',
                'select programming_language_id from users_programming_languages where user_id like :user_id',
                [
                    ':user_id' => $user_id,
                ]
            );

            return $result;
        } catch (Exception $e) {
            echo $e;
            return [];
        }
    }

    public static function deleteProgrammingLanguageByUserId($user_id, $programming_language_id)
    {
        $db = Database::getInstance();

        return $db->delete('delete from users_programming_languages where user_id = :user_id and programming_language_id = :programming_language_id', [
            ':user_id' => $user_id,
            'programming_language_id' => $programming_language_id,
        ]);
    }
}
