<?php

require __DIR__ . '/../Database/Database.php';

class ProgrammingLanguage
{
    protected $id;
    protected $programming_language;

    public function getId()
    {
        return $this->id;
    }

    public static function checkProgrammingLanguage($programming_language)
    {
        $db = Database::getInstance();
        try {
            $result = $db->select(
                'ProgrammingLanguage',
                "select * from programming_languages where programming_language like :programming_language",
                [
                    ':programming_language' => $programming_language
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

}
