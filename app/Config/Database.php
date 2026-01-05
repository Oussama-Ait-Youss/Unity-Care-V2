<?php

class Database {
    // 1. Instance unique de la classe (Singleton)
    private static $instance = null;
    // 2. La connexion PDO réelle
    private $pdo;

    // 3. Paramètres de connexion (A MODIFIER SELON VOTRE CONFIG)
    private $host = 'db';
    private $db_name = 'UnityClinic_V2'; // Vérifiez le nom de votre BDD
    private $username = 'root';      // Vérifiez votre user (souvent 'root')
    private $password = 'root';          // Vérifiez votre mot de passe (souvent vide ou 'root')

    // 4. Constructeur privé : Empêche de faire "new Database()"
    private function __construct() {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8";
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            // Active les erreurs SQL (très important pour le débogage)
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            die("Erreur de connexion BDD : " . $e->getMessage());
        }
    }

    // 5. Point d'accès unique au Singleton
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // 6. Méthode pour récupérer l'objet PDO dans les Repositories
    public function getConnection() {
        return $this->pdo;
    }
}