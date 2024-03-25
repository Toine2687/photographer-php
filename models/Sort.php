<?php

/**
 * [Classe intermédiaire entre les articles et les catégories d'articles]
 */
class Sort
{
    private int $articles_id;
    private int $categories_id;

    public function set_articles_id($id)
    {
        $this->articles_id  = $id;
    }
    public function get_articles_id(): int
    {
        return $this->articles_id;
    }

    public function set_categories_id($id)
    {
        $this->categories_id = $id;
    }
    public function get_categories_id(): int
    {
        return $this->categories_id;
    }

    // CONSTRUCTOR
    public function __construct(int $articles_id, int $categories_id)
    {
        $this->articles_id = $articles_id;
        $this->categories_id = $categories_id;
    }

    // METHODES
    /**
     * @return [bool]
     * Permet d'associer un article à une catégorie
     */
    public function add()
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = 'INSERT INTO `sort` (`articles_id`, `categories_id`) VALUES (:articles_id, :categories_id);';
        $sth = $db->prepare($sql);
        $sth->bindValue(':articles_id', $this->articles_id);
        $sth->bindValue(':categories_id', $this->categories_id);
        return ($sth->execute());
    }

    /**
     * @param mixed $articles_id
     * 
     * @return [bool]
     * Permet d'accéder aux catégories d'un article
     */
    public static function getByArticle($articles_id)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT 
        `sort`.`articles_id`, 
        `sort`.`categories_id`,
        `article`.`title`,
        FROM `sort` 
        INNER JOIN `articles` 
        ON `sort`.`articles_id` = `articles`.`articles_id` 
        WHERE `articles_id` = :articles_id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':articles_id', $articles_id);
        $sth->execute();
        $fetch = $sth->fetch();
        return $fetch;
    }

    /**
     * @param mixed $categories_id
     * 
     * @return [bool]
     * Permet d'accéder aux articles d'une catégorie
     */
    public static function getByCategory($categories_id)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT 
        `sort`.`articles_id`, 
        `sort`.`categories_id`,
        `categories`.`title`,
        FROM `sort` 
        INNER JOIN `categories` 
        ON `sort`.`categories_id` = `categories`.`categories_id` 
        WHERE `categories_id` = :categories_id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':categories_id', $categories_id);
        $sth->execute();
        $fetch = $sth->fetch();
        return $fetch;
    }

    /**
     * @param mixed $articles_id
     * @param mixed $categories_id
     * 
     * @return [bool]
     * Permet de retirer une association article <-> categorie
     */
    public static function delete($articles_id, $categories_id)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "DELETE FROM `sort` WHERE `articles_id` = :articles_id AND `categories_id` = :categories_id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':articles_id', $articles_id);
        $sth->bindValue(':categories_id', $categories_id);
        return $sth->execute();
    }

    /**
     * @param mixed $articles_id
     * 
     * @return [bool]
     * Méthode qui permet de supprimer toutes les catégories auxquelles un article peut être associé
     * A utiliser avant la méthode add() lors d'un update d'article.
     */
    public static function deleteAll($articles_id)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "DELETE FROM `sort` WHERE `articles_id` = :articles_id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':articles_id', $articles_id);
        return $sth->execute();
    }
}
