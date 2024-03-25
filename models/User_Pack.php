<?php

/**
 * [Classe permettant la liaison entre un client et une formule commandée]
 */
class User_Pack
{
    private int $users_id;
    private int $packs_id;

    public function set_users_id($id)
    {
        $this->users_id = $id;
    }
    public function get_users_id(): int
    {
        return $this->users_id;
    }

    public function set_packs_id($id)
    {
        $this->packs_id = $id;
    }
    public function get_packs_id(): int
    {
        return $this->packs_id;
    }

    // Constructor
    public function __construct(int $users_id, int $packs_id,)
    {
        $this->users_id = $users_id;
        $this->packs_id = $packs_id;
    }

    // Méthodes
        /**
     * @return [bool]
     * Permet d'attribuer une formule à un client
     */
    public function add()
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = 'INSERT INTO `users_packs` (`users_id`, `packs_id`) VALUES (:users_id, :packs_id);';
        $sth = $db->prepare($sql);
        $sth->bindValue(':users_id', $this->users_id);
        $sth->bindValue(':packs_id', $this->packs_id);
        return ($sth->execute());
    }

    /**
     * @param mixed $users_id
     * @param mixed $packs_id
     * 
     * @return [bool]
     * Permet la suppression de l'association formule <-> client
     * (en cas d'annulation)
     */
    public static function delete($users_id, $packs_id)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "DELETE FROM `users_packs` WHERE `users_id` = :users_id AND `packs_id` = :packs_id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':users_id', $users_id);
        $sth->bindValue(':packs_id', $packs_id);
        return $sth->execute();
    }

############################################################  GROS DOUTE ##########################################################

    /**
     * @param mixed $users_id
     * 
     * @return [mixte]
     * Permet de retrouver la formule éventuellement souscrite par un client
     */
    public static function getByClient($users_id)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT 
        `users_packs`.`users_id`, 
        `users_packs`.`packs_id`,
        `packs`.`label`
        FROM `users_packs` 
        INNER JOIN `packs`
        ON `users_packs`.`packs_id` = `packs`.`packs_id`
        WHERE `users_packs`.`users_id` = :users_id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':users_id', $users_id);
        $sth->execute();
        $fetch = $sth->fetch();
        return $fetch;
    }
}