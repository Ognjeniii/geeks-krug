<?php

require_once __DIR__ . '/../Database/Database.php';

class WorkExperience
{
    protected $id;
    protected $user_id;
    protected $company_name;
    protected $title;
    protected $location;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->company_name;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

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
        } catch (Exception $ee) {
            return 0;
        }
    }

    public static function getUserExperienceByUserId($user_id): array
    {
        $db = Database::getInstance();
        return $db->select(
            'WorkExperience',
            "select * from work_experience where user_id like :user_id",
            [
                ':user_id' => $user_id
            ]
        );
    }
}
