<?php

require_once __DIR__ . '/../config/config.php';

/**
 * [Classe de connexion à instance unique]
 */
class Singleton
{
    private static $instance = null;
    private $cnx;
    // constructeur privé pour empecher la diversité des instances
    private function __construct()
    {
        $this->cnx = new PDO(DSN, USER, PASSWORD);
        $this->cnx->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
    }

    public static function getInstance()
    {
        // pas de doublon
        if (!self::$instance) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
    
    /**
     * Connxion à la bdd
     */
    public function sConnect(){
        return $this->cnx;
    }
}
