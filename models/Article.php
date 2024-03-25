<?php

/**
 * [Classe Dédié aux articles de blog, articles dans la bdd]
 */
class Article
{
    private int $articles_id;
    private string $title;
    private string $main_picture;
    private string $description;
    private string $content;
    private int $users_id;
    private string $created_at;
    private string $updated_at;
    private string $deleted_at;


    //constructor
    public function __construct(string $title, string $description, string $content, string $main_picture, int $users_id, string $created_at = '', string $updated_at = '', string $deleted_at = '')
    {
        $this->title = $title;
        $this->main_picture = $main_picture;
        $this->description = $description;
        $this->content = $content;
        $this->users_id = $users_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
    }

    public function set_id($id)
    {
        $this->articles_id = $id;
    }
    public function get_id(): int
    {
        return $this->articles_id;
    }

    public function set_title($title)
    {
        $this->title = $title;
    }
    public function get_title(): string
    {
        return $this->title;
    }

    public function set_main_picture($main_picture)
    {
        $this->main_picture = $main_picture;
    }
    public function get_main_picture(): string
    {
        return $this->main_picture;
    }

    public function set_description($description)
    {
        $this->description = $description;
    }
    public function get_description(): string
    {
        return $this->description;
    }

    public function set_content($content)
    {
        $this->content = $content;
    }
    public function get_content(): string
    {
        return $this->content;
    }

    function set_users_id($users_id)
    {
        $this->users_id = $users_id;
    }
    function get_users_id()
    {
        return $this->users_id;
    }

    public function set_created_at($created_at)
    {
        $this->created_at = $created_at;
    }
    public function get_created_at(): string
    {
        return $this->created_at;
    }

    public function set_updated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }
    public function get_updated_at(): string
    {
        return $this->updated_at;
    }

    public function set_deleted_at($deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }
    public function get_deleted_at(): int
    {
        return $this->deleted_at;
    }

    // Méthodes ----------------------------

    /**
     * @return bool
     * Permet l'ajout d'un article
     */
    public function add(): bool
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = 'INSERT INTO `articles` (`title`, `description`, `content`, `main_picture`, `users_id`) VALUES (:title, :description, :content, :main_picture, :users_id);';
        $sth = $db->prepare($sql);
        $sth->bindValue(':title', $this->title);
        $sth->bindValue(':description', $this->description);
        $sth->bindValue(':content', $this->content);
        $sth->bindValue(':main_picture', $this->main_picture);
        $sth->bindValue(':users_id', $this->users_id, PDO::PARAM_INT);

        return ($sth->execute());
    }

    /**
     * @param mixed $title
     * 
     * @return bool
     * Permet de controler que l'article n'est pas déjà existant, via son titre.
     */
    public static function isExist($title):bool
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT `title` FROM `articles` WHERE `title`=:title";
        $sth = $db->prepare($sql);
        $sth->bindValue(':title', $title);
        $sth->execute();
        $fetch = $sth->fetch();
        return $fetch;
    }

    /**
     * @param mixed $id
     * 
     * Permet de récupérer un article, en vue de son affichage ou de sa modification
     */
    public static function get($id)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT `users`.`firstname`, `users`.`lastname`, `articles`.`articles_id`, `title`, `description`, `articles`.`created_at`,`articles`.`content`, `articles`.`updated_at`, `articles`.`main_picture`
        FROM `articles` 
        INNER JOIN `users` 
        ON `users`.`users_id` = `articles`.`users_id` 
        WHERE `articles_id` = :id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':id', $id);
        $sth->execute();
        $fetch = $sth->fetch();
        return $fetch;
    }

    /**
     * @return array
     * Permet de récupérer la liste des articles existants en bdd
     */
    public static function getAll():array
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT `users`.`firstname`, `users`.`lastname`, `articles`.`articles_id`, `title`, `description`, `articles`.`created_at`, `articles`.`updated_at`, `articles`.`content`, `articles`.`main_picture`
        FROM `articles` 
        INNER JOIN `users` 
        ON `users`.`users_id` = `articles`.`users_id`";
        $sth = $db->query($sql);
        $fetch = $sth->fetchAll();
        return $fetch;
    }

    /**
     * @param mixed $id
     * 
     * @return bool
     * Permet de mettre à jour un article existant
     */
    public function update($id):bool
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "UPDATE `articles` SET 
        `description` = :description,
        `content` = :content,
        `title` = :title,
        `main_picture` = :main_picture
        WHERE `articles`.`articles_id` = :id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':description', $this->description);
        $sth->bindValue(':content', $this->content);
        $sth->bindValue(':title', $this->title);
        $sth->bindValue(':main_picture', $this->main_picture);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        return $sth->execute();
    }

    /**
     * @param mixed $id
     * 
     * @return bool
     * Permet la suppression d'un article en bdd
     */
    public static function delete($id):bool
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "DELETE FROM `articles` WHERE `articles_id` = :id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':id', $id);
        return $sth->execute();
    }
}
