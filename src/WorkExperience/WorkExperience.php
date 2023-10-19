<?php

class WorkExperience
{
    protected $id;
    protected $user_id;
    protected $company_name;
    protected $title;
    protected $location;

    public static function addWorkExperience($user_id, $company_name, $title, $location)
    {
        $db = Database::getInstance();
        try {
            $db->insert(
                'WorkExperience',
                "insert into work_experience (user_id, company_name, title, location) values (:user_id, :company_name, :title, :location)",
                [
                    ':user_id' => $user_id,
                    ':company_name' => $company_name,
                    ':title' => $title,
                    ':location' => $location
                ]
            );
            return 1;
        }catch (Exception $ee){
//            echo $ee;
//            die();
            return 0;
        }
    }

}
