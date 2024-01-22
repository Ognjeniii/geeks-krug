<?php


require_once __DIR__ . '/../Database/Database.php';

class User
{
    protected $id;
    protected $user_type_id;
    protected $full_name;
    protected $gender;
    protected $username;
    protected $email;
    protected $password;
    protected $picture;
    protected $phone_number;
    protected $address;
    protected $birthday;
    protected $github;
    protected $linkedin;
    protected $x;
    protected $leetcode;
    protected $website;


    //region getters
    public function getId()
    {
        return $this->id;
    }

    public function getUserTypeId()
    {
        return $this->user_type_id;
    }

    public function getFullName()
    {
        return $this->full_name;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getGithub()
    {
        return $this->github;
    }

    public function getLeetcode()
    {
        return $this->leetcode;
    }

    public function getLinkedin()
    {
        return $this->linkedin;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function getX()
    {
        return $this->x;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getWebsite()
    {
        return $this->website;
    }
    //endregion

    //region register
    public static function register(
        $full_name,
        $username,
        $email,
        $password,
    ) {
        $db = Database::getInstance();

        $existingUser = $db->select(
            'User',
            'SELECT id FROM users WHERE email = :email',
            [':email' => $email]
        );

        if ($existingUser && count($existingUser) > 0) {
            header('Location: /resources/views/auth/signup.php?error=email-exists');
            die();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $db->insert(
            'User',
            'INSERT INTO users ( user_type_id, full_name, username, email, password)
                VALUES
                        (:user_type_id, :full_name, :username, :email, :password)',
            [
                ':user_type_id' => 2,
                ':full_name' => $full_name,
                ':username' => $username,
                ':email' => $email,
                ':password' => $hashedPassword,
            ]
        );
        return $db->lastInsertId();
    }
    //endregion

    //region login
    public static function login(
        $email,
        $password,
    ) {
        $db = Database::getInstance();

        $users = $db->select(
            'User',
            'SELECT * FROM users WHERE email LIKE :email',
            [
                ':email' => $email,
            ]
        );

        if (count($users) > 0) {
            $user = $users[0];
            $hashedPassword = $user->password;

            if (password_verify($password, $hashedPassword)) {
                return $user;
            }
        }

        return null;
    }

    //endregion

    //region reset pass
    public static function resetPassword($email, $newPassword): int
    {
        $db = Database::getInstance();

        try {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $db->update(
                'User',
                "update users set password = :password where email like :email",
                [
                    ':password' => $hashedPassword,
                    ':email' => $email
                ]
            );
            return 1;
        } catch (Exception $ee) {
            //            echo $ee;
            //            die();
        }
        return 0;
    }
    //endregion

    //region check email
    public static function checkEmail($email)
    {
        $db = Database::getInstance();

        $users = $db->select(
            'User',
            "select * from users where email like :email",
            [
                ':email' => $email,
            ]
        );

        foreach ($users as $user) {
            return $user;
        }
        return null;
    }
    //endregion

    //region get user by email
    public static function getUserByEmail($email)
    {
        $db = Database::getInstance();
        $users = $db->select(
            'User',
            "select * from users where email like :email",
            [
                ":email" => $email
            ]
        );

        foreach ($users as $user) {
            return $user;
        }
        return null;
    }
    //endregion

    //region get user by id
    public static function getUserById($id)
    {
        $db = Database::getInstance();
        $users = $db->select(
            'User',
            "select * from users where id like :id",
            [
                ":id" => $id
            ]
        );

        foreach ($users as $user) {
            return $user;
        }
        return null;
    }
    //endregion

    //region get user by username
    public static function getUserByUsername($username)
    {
        $db = Database::getInstance();
        $users = $db->select(
            'User',
            "select * from users where username like :username",
            [
                ":username" => $username
            ]
        );

        foreach ($users as $user) {
            return $user;
        }
        return null;
    }
    //endregion
}
