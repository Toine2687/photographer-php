<?php

require_once __DIR__ . '/Singleton.php';
/**
 * [Classe relative aux utilisateurs : clients et administrateurs]
 */
class User
{
    private int $users_id;
    private string $lastname;
    private string $firstname;
    private string $phone;
    private string $mail;
    private string $partner_lastname;
    private string $partner_firstname;
    private ?string $password;
    private string $created_at;
    private int $role;
    private string $address;
    private int $zip;
    private string $city;

    //constructor
    public function __construct(string $lastname, string $firstname, string $phone, string $mail,  string $address, int $zip, string $city, int $role = 0, string $password = NULL, string $partner_lastname = '', string $partner_firstname = '')
    {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->phone = $phone;
        $this->mail = $mail;
        $this->password = $password;
        $this->partner_lastname = $partner_lastname;
        $this->partner_firstname = $partner_firstname;
        $this->role = $role;
        $this->address = $address;
        $this->zip = $zip;
        $this->city = $city;
    }

    //gettters & setters
    public function set_id($id)
    {
        $this->users_id = $id;
    }
    public function get_id(): int
    {
        return $this->users_id;
    }

    public function set_lastname($lastname)
    {
        $this->lastname = $lastname;
    }
    public function get_lastname(): string
    {
        return $this->lastname;
    }

    public function set_firstname($firstname)
    {
        $this->firstname = $firstname;
    }
    public function get_firstname(): string
    {
        return $this->firstname;
    }

    public function set_phone($phone)
    {
        $this->phone = $phone;
    }
    public function get_phone(): string
    {
        return $this->phone;
    }

    public function set_mail($mail)
    {
        $this->mail = $mail;
    }
    public function get_mail(): string
    {
        return $this->mail;
    }

    public function set_partner_lastname($partner_lastname)
    {
        $this->partner_lastname = $partner_lastname;
    }
    public function get_partner_lastname(): string
    {
        return $this->partner_lastname;
    }

    public function set_partner_firstname($partner_firstname)
    {
        $this->partner_firstname = $partner_firstname;
    }
    public function get_partner_firstname(): string
    {
        return $this->partner_firstname;
    }

    public function set_role($role)
    {
        $this->role = $role;
    }
    public function get_role(): int
    {
        return $this->role;
    }

    public function set_address($address)
    {
        $this->address = $address;
    }
    public function get_address(): string
    {
        return $this->address;
    }

    public function set_zip($zip)
    {
        $this->zip = $zip;
    }
    public function get_zip(): int
    {
        return $this->zip;
    }

    public function set_city($city)
    {
        $this->city = $city;
    }
    public function get_city(): string
    {
        return $this->city;
    }

    public function set_password($password)
    {
        $this->password = $password;
    }
    public function get_password(): string
    {
        return $this->password;
    }

    public function set_created_at($created_at)
    {
        $this->created_at = $created_at;
    }
    public function get_created_at(): string
    {
        return $this->created_at;
    }


    // =============== Méthodes ===============
    /**
     * @return [type]
     * Permet la création d'un nouvel utilisateur
     */
    public function add():bool
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "INSERT INTO `users` (`lastname`, `firstname`, `phone`, `mail`, `partner_lastname`, `partner_firstname`, `password` , `role`, `address`, `zip`, `city`) 
        VALUES (:lastname, :firstname, :phone, :mail, :partner_lastname, :partner_firstname, :password, :role, :address, :zip, :city);";
        $sth = $db->prepare($sql);
        $sth->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $sth->bindValue(':firstname', $this->firstname);
        $sth->bindValue(':phone', $this->phone);
        $sth->bindValue(':mail', $this->mail);
        $sth->bindValue(':partner_lastname', $this->partner_lastname);
        $sth->bindValue(':partner_firstname', $this->partner_firstname);
        $sth->bindValue(':password', $this->password);
        $sth->bindValue(':role', $this->role, PDO::PARAM_INT);
        $sth->bindValue(':address', $this->address);
        $sth->bindValue(':zip', $this->zip, PDO::PARAM_INT);
        $sth->bindValue(':city', $this->city);
        return ($sth->execute());
    }

    /**
     * @param mixed $mail
     * 
     * Contrôle l'existence d'un utilisateur
     */
    public static function isExist($mail)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT `mail` FROM `users` WHERE `mail`=:mail";
        $sth = $db->prepare($sql);
        $sth->bindValue(':mail', $mail);
        $sth->execute();
        $fetch = $sth->fetch();
        return $fetch;
    }

    /**
     * @param mixed $id
     * 
     * Récupère un utilisateur via son id
     */
    public static function get($id)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT * FROM `users` WHERE `users_id` = :id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':id', $id);
        $sth->execute();
        $fetch = $sth->fetch();
        return $fetch;
    }

    /**
     * @param mixed $mail
     * 
     * Récupère un utilisateur via son adresse mail
     */
    public static function getByMail($mail)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT * FROM `users` WHERE `mail` = :mail;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':mail', $mail);
        $sth->execute();
        $fetch = $sth->fetch();
        return $fetch;
    }

    /**
     * Retourne la liste des utilisateurs enregistrés en bdd
     */
    public static function getAll()
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT * FROM `users`;";
        $sth = $db->query($sql);
        $fetch = $sth->fetchAll();
        return $fetch;
    }

    /**
     * @param mixed $id
     * 
     * Supprime un utilisateur
     */
    public static function delete($id)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "DELETE FROM `users` WHERE `users_id` = :id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':id', $id);
        return $sth->execute();
    }

    /**
     * @param mixed $id
     * 
     * Met à jour les données d'un utilisateur
     */
    public function update($id)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "UPDATE `users` SET 
        `lastname` = :lastname,
        `firstname` = :firstname,
        `phone` = :phone,
        `mail` = :mail,
        `partner_lastname` = :partner_lastname,
        `partner_firstname` = :partner_firstname,
        `password` = :password,
        `role` = :role,
        `address` = :address,
        `zip` = :zip,
        `city` = :city
        WHERE `users`.`users_id` = :id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':lastname', $this->lastname);
        $sth->bindValue(':firstname', $this->firstname);
        $sth->bindValue(':phone', $this->phone);
        $sth->bindValue(':mail', $this->mail);
        $sth->bindValue(':partner_lastname', $this->partner_lastname);
        $sth->bindValue(':partner_firstname', $this->partner_firstname);
        $sth->bindValue(':password', $this->password);
        $sth->bindValue(':role', $this->role, PDO::PARAM_INT);
        $sth->bindValue(':address', $this->address);
        $sth->bindValue(':zip', $this->zip, PDO::PARAM_INT);
        $sth->bindValue(':city', $this->city);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        return $sth->execute();
    }

    /**
     * Contrôle le fait que le visiteur soit un utilisateur enregistré
     */
    public static function checkUser()
    {

        if (empty($_SESSION['user']) || empty($_COOKIE['session_token'])) {
            header('Location: /clients');
            die;
        }
    
        // Comparer le jeton de session avec le jeton stocké dans le cookie
        if ($_SESSION['session_token'] !== $_COOKIE['session_token']) {
            header('Location: /clients');
            die;
        }
    }

    /**
         * Contrôle le fait que le visiteur soit un administrateur
     */
    public static function checkAdmin()
    {
        if ($_SESSION['user']->role != 1) {
            header('location: /clients');
            die;
        }
    }

    /**
     * @param mixed $password
     * 
     * Hash et enregistre le mot de passe d'un utilisateur en bdd
     */
    public static function setPassword($password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "UPDATE `users` 
                SET `password` = :password 
                WHERE `users`.`users_id` = :id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':password', $hashed_password);
        return $sth->execute();
    }
}
