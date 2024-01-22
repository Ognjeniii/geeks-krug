<?php

require_once __DIR__ . '/../Database/Database.php';

class Education
{
    protected $id;
    protected $user_id;
    protected $school;
    protected $degree;
    protected $field_of_study;

    public function getId()
    {
        return $this->id;
    }

    public function getSchool()
    {
        return $this->school;
    }

    public function getDegree()
    {
        return $this->degree;
    }

    public function getFieldOfStudy()
    {
        return $this->field_of_study;
    }

    public static function addEducation($user_id, $school, $degree, $field_of_study): int
    {
        $db = Database::getInstance();
        try {
            $db->insert(
                'Education',
                "insert into education (user_id, school, degree, field_of_study) values (:user_id, :school, :degree, :field_of_study)",
                [
                    'user_id' => $user_id,
                    ':school' => $school,
                    ':degree' => $degree,
                    ':field_of_study' => $field_of_study
                ]
            );
            return 1;
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function getUserEducationByUserId($user_id)
    {
        $db = Database::getInstance();

        return $db->select(
            'Education',
            'select * from education where user_id like :user_id',
            [
                ':user_id' => $user_id,
            ]
        );
    }
}
