<?php

class Gallery
{
    private int $galleries_id;
    private string $shooting_date;
    private string $shooting_location;
    private string $title;
    private string $main_picture;
    private string $created_at;
    private ?string $sent_at;
    private string $deleted_at;
    private int $users_id;


    //constructor
    public function __construct(string $title, string $shooting_date, string $shooting_location, string $main_picture, int $users_id, $sent_at = NULL)
    {
        $this->title = $title;
        $this->main_picture = $main_picture;
        $this->shooting_date = $shooting_date;
        $this->shooting_location = $shooting_location;
        $this->users_id = $users_id;
        $this->sent_at = $sent_at;
    }

    public function set_id($id)
    {
        $this->galleries_id = $id;
    }
    public function get_id(): int
    {
        return $this->galleries_id;
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

    public function set_shooting_date($shooting_date)
    {
        $this->shooting_date = $shooting_date;
    }
    public function get_shooting_date(): string
    {
        return $this->shooting_date;
    }

    public function set_shooting_location($shooting_location)
    {
        $this->shooting_location = $shooting_location;
    }
    public function get_shooting_location(): string
    {
        return $this->shooting_location;
    }

    public function set_created_at($created_at)
    {
        $this->created_at = $created_at;
    }
    public function get_created_at(): string
    {
        return $this->created_at;
    }

    public function set_sent_at($sent_at)
    {
        $this->sent_at = $sent_at;
    }
    public function get_sent_at(): string
    {
        return $this->sent_at;
    }

    public function set_deleted_at($deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }
    public function get_deleted_at(): int
    {
        return $this->deleted_at;
    }

    //Méthodes

    /**
     * @return [bool]
     * Permet l'ajout d'une galerie d'images ainsi que son attribution à un client.
     */
    public function add():bool
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = 'INSERT INTO `galleries` (`title`,`shooting_date`, `shooting_location`,  `main_picture`, `users_id`) 
        VALUES (:title, :shooting_date, :shooting_location, :main_picture, :users_id);';
        $sth = $db->prepare($sql);
        $sth->bindValue(':title', $this->title);
        $sth->bindValue(':shooting_date', $this->shooting_date);
        $sth->bindValue(':shooting_location', $this->shooting_location);
        $sth->bindValue(':main_picture', $this->main_picture);
        $sth->bindValue(':users_id', $this->users_id);
        return ($sth->execute());
    }

    /**
     * @param mixed $title
     * 
     * Permet de controler l'existence d'une galerie d'images, via son titre.
     */
    public static function isExist($title)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT `title` FROM `galleries` WHERE `title`=:title";
        $sth = $db->prepare($sql);
        $sth->bindValue(':title', $title);
        $sth->execute();
        $fetch = $sth->fetch();
        return $fetch;
    }

    /**
     * @param mixed $id
     * 
     * Permet de récupérer une galerie, pour son affichage ou sa modificatoin
     */
    public static function get($id)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT 
        `users`.`firstname`, 
        `users`.`lastname`,
        `users`.`partner_firstname`,
        `galleries`.`main_picture`,
        `galleries`.`galleries_id`,
        `galleries`.`shooting_date`, 
        `galleries`.`shooting_location`,
        `galleries`.`created_at`,
        `galleries`.`title`,
        `galleries`.`sent_at`, 
        `galleries`.`deleted_at`,
        `galleries`.`users_id`
        FROM `galleries` 
        INNER JOIN `users` 
        ON `users`.`users_id` = `galleries`.`users_id` 
        WHERE `galleries_id` = :id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':id', $id);
        $sth->execute();
        $fetch = $sth->fetch();
        return $fetch;
    }

    /**
     * @param mixed $users_id
     * 
     * @return [bool
     * Permet de récupérer une galerie en fonction de l'id de l'utilisateur]
     */
    public static function getByUser($users_id)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT `galleries`.`main_picture`,
        `galleries`.`galleries_id`,
        `galleries`.`shooting_date`, 
        `galleries`.`shooting_location`,
        `galleries`.`title`
        FROM `galleries`
        INNER JOIN `users`
        ON `users`.`users_id` = `galleries`.`users_id` 
        WHERE `users`.`users_id` = :id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':id', $users_id);
        $sth->execute();
        $fetch = $sth->fetch();
        return $fetch;
    }

    /**
     * @return array
     * Permet de récupérer la liste des galleries existantes.
     */
    public static function getAll():array
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT `users`.`firstname`, 
            `users`.`lastname`, 
            `users`.`partner_firstname`,
            `galleries`.`shooting_date`, 
            `galleries`.`shooting_location`,
            `galleries`.`galleries_id`,
            `galleries`.`created_at`,
            `galleries`.`title`,
            `galleries`.`sent_at`, 
            `galleries`.`deleted_at` 
        FROM `galleries` 
        INNER JOIN `users` 
        ON `users`.`users_id` = `galleries`.`users_id`";
        $sth = $db->query($sql);
        $fetch = $sth->fetchAll();
        return $fetch;
    }

    /**
     * @param mixed $id
     * 
     * Permet la mise à jour d'une galerie
     */
    public function update($id)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "UPDATE `galleries` SET 
        `shooting_date` = :shooting_date,
        `shooting_location` = :shooting_location,
        `title` = :title,
        `main_picture` = :main_picture,
        `sent_at` = :sent_at
        WHERE `galleries`.`galleries_id` = :id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':shooting_date', $this->shooting_date);
        $sth->bindValue(':shooting_location', $this->shooting_location);
        $sth->bindValue(':title', $this->title);
        $sth->bindValue(':main_picture', $this->main_picture);
        $sth->bindValue(':sent_at', $this->sent_at);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        return $sth->execute();
    }

    /**
     * @param mixed $id
     * 
     * @return bool
     * Permet la suppresion d'une galerie.
     */
    public static function delete($id):bool
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "DELETE FROM `galleries` WHERE `galleries_id` = :id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':id', $id);
        return $sth->execute();
    }
}
