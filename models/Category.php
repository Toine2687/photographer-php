<?php

/**
 * [Classe de catégorie d'articles de blog, ne comporte qu'un titre et un id]
 */
class Category
{

    private int $categories_id;
    private string $title;

    // constructor
    public function __construct(string $title)
    {
        $this->title = $title;
    }

    //setters et getters
    public function set_id($id)
    {
        $this->categories_id = $id;
    }
    public function get_id(): int
    {
        return $this->categories_id;
    }

    public function set_title($title)
    {
        $this->title = $title;
    }
    public function get_title(): string
    {
        return $this->title;
    }

    /**
     * @return bool
     * Permet l'ajout d'une nouvelle catégorie
     */
    public function add():bool
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = 'INSERT INTO `categories` (`title`) VALUES (:title);';
        $sth = $db->prepare($sql);
        $sth->bindValue(':title', $this->title);
        return ($sth->execute());
    }

    /**
     * @param mixed $title
     * 
     * Permet de controller l'existence d'une catégorie.
     */
    public static function isExist($title)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT `title` FROM `categories` WHERE `title`=:title";
        $sth = $db->prepare($sql);
        $sth->bindValue(':title', $title);
        $sth->execute();
        $fetch = $sth->fetch();
        return $fetch;
    }

    /**
     * @param mixed $id
     * 
     * Permet de récupérer une catégorie, pour son affichage ou sa modification
     */
    public static function get($id)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT `categories_id` FROM `categories` WHERE `categories_id` = :id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':id', $id);
        $sth->execute();
        $fetch = $sth->fetch();
        return $fetch;
    }

    /**
     * Permet de récupérer la liste des catégories existantes
     */
    public static function getAll():array
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT `categories_id`, `title` FROM `categories`;";
        $sth = $db->query($sql);
        $fetch = $sth->fetchAll();
        return $fetch;
    }

    /**
     * @param mixed $id
     * 
     * @return bool
     * Permet la suppression d'une catégorie d'article
     */
    public static function delete($id):bool
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "DELETE FROM `categories` WHERE `categories_id` = :id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':id', $id);
        return $sth->execute();
    }
}
