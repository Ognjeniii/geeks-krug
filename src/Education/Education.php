<?php

class Education
{
    protected $id;
    protected $school;
    protected $degree;
    protected $field_of_study;

    public static function createEducation($school, $degree, $field_of_study)
    {
        $db = Database::getInstance();
        $db->insert(
            'Education',
            "insert into education (school, degree, field_of_study) values (:school, :degree, :field_of_study)",
            [
                ':school' => $school,
                ':degree' => $degree,
                ':field_of_study' => $field_of_study
            ]
        );
        return $db->lastInsertId();
    }
}
