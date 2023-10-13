<?php

require_once __DIR__ . '/../Database/Database.php';

class User
{
    protected $id;
    protected $full_name;
    protected $username;
    protected $email;
    protected $password;
    protected $picture;
    protected $phone_number;
    protected $address;
    protected $birthday;
    protected $education;
    protected $work_experience;
    protected $programming_languages;
    protected $github;
    protected $linkedin;
    protected $twitter;
    protected $leetcode;
    protected $website;

    public function getId()
    {
        return $this->id;
    }

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
            header('Location: /signup?error=email-exists');
            die();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $db->insert(
            'User',
            'INSERT INTO users (full_name, username, email, password)
                VALUES
                        (:full_name, :username, :email, :password)',
            [
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
        }
        catch (Exception $ee) {
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

        foreach($users as $user){
            return $user;
        }
        return null;
    }
    //endregion
}
