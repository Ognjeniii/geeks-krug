<?php

require_once __DIR__ . '/../Database/Database.php';

class Blog
{
    protected $id;
    protected $title;
    protected $short_description;
    protected $blog_data;
    protected $picture;
    protected $created_at;
    protected $user_id;

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getShortDescription()
    {
        return $this->short_description;
    }

    public function getBlogData()
    {
        return $this->blog_data;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUserByUserId($user_id) {
        $user = User::getUserById($user_id);
        return $user->getUsername();
    }

    public static function createBlog($user_id, $title, $short_description, $blog_data, $picture)
    {
        $db = Database::getInstance();
        $db->insert(
            "Blog",
            "insert into blogs (user_id, title, short_description, blog_data, picture) values (:u, :t, :s, :b, :p)",
            [
                ':u' => $user_id,
                ':t' => $title,
                ':s' => $short_description,
                ':b' => $blog_data,
                ':p' => $picture
            ]
        );
    }

    public static function createBlogWithoutPic($user_id, $title, $short_description, $blog_data)
    {
        $db = Database::getInstance();
        $db->insert(
            "Blog",
            "insert into blogs (user_id, title, short_description, blog_data) values (:u, :t, :s, :b)",
            [
                ':u' => $user_id,
                ':t' => $title,
                ':s' => $short_description,
                ':b' => $blog_data
            ]
        );
    }

    public static function getBlogById($blog_id)
    {
        $db = Database::getInstance();
        $blogs = $db->select(
            'Blog',
            'select * from blogs where id like :blog_id',
            [
                ':blog_id' => $blog_id
            ],

        );

        foreach ($blogs as $blog) {
            return $blog;
        }

        return null;
    }

    public static function getBlogByTitle($blogTitle)
    {
        $db = Database::getInstance();

        $decodedTitle = str_replace('-', ' ', $blogTitle);

        $blogs = $db->select(
            'Blog',
            'select * from blogs where title like :decodedTitle',
            [
                ':decodedTitle' => $decodedTitle
            ]
        );

        foreach ($blogs as $blog) {
            return $blog;
        }

        return null;
    }

    public static function generateSlug($title)
    {
        $slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $title));
        return $slug;
    }

    public static function getBlogByUserId($user_id)
    {
        $db = Database::getInstance();
        $blogs = $db->select(
            'Blog',
            'select * from blogs where user_id like :user_id',
            [
                ':user_id' => $user_id
            ]
        );

        return $blogs;
    }

    public static function binToPicture($blog_title)
    {
        $blog = self::getBlogByTitle($blog_title);

        if ($blog->getPicture() == null) {
            return null;
        }

        $binary_data = $blog->getPicture();

        return base64_encode($binary_data);
    }

    public static function getAllBlogs(): array
    {
        $db = Database::getInstance();
        try {
            $blogs = $db->select(
                'Blog',
                "select * from blogs",
                []
            );
            return $blogs;
        } catch (Exception $e) {
            return [];
        }
    }

    public static function getLastId() {
        $db = Database::getInstance();
        try {
            $blogs = $db->select('Blog',
            "SELECT * FROM blogs ORDER BY id DESC LIMIT 1",
            []);
            foreach ($blogs as $blog) {
                return $blog->getId();
            }

        } catch (Exception $e) {
            return null;
        }
    }

    public static function getLastRecords() {
        $db = Database::getInstance();
        try{
            $blogs = $db->select(
                'Blog',
                "select * from blogs order by id desc limit 5",
                []
            );
            return $blogs;
        } catch (Exception $e) {
            return [];
        }
    }

    public static function getNextRecords($id): array
    {
        $db = Database::getInstance();
        try {
            $blogs = $db->select(
                'Blog',
             "select * from blogs where id < :id order by id desc limit 5",
              [':id' => $id]
            );
            return $blogs;
        } catch (Exception $e) {
            return [];
        }
    }

    public static function getPreviousRecords($id): array
    {
        $db = Database::getInstance();
        try {
            $blogs = $db->select(
                'Blog',
             "select * from blogs where id > :id limit 5",
              [':id' => $id]
            );
            return $blogs;
        } catch (Exception $e) {
            return [];
        }
    }
}
