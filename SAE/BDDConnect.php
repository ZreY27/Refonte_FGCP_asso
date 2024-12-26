<?php

class BDDConnect{
    public \PDO $pdo;

    public function __construct($databasePath = 'basePers.db', $options= null)
    {
        try {
            $this->pdo = new PDO("sqlite:" . $databasePath);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            // En cas d'erreur, afficher un message et arrêter l'exécution
            die("Erreur de connexion à la base SQLite : " . $e->getMessage());
            //throw new BddConnectException("Erreur de connexion BDD : il faut configurer la classe BDDConnect avec les bonnes valeurs");
        }
    }

    public function getConnection() : \PDO {
        return $this->pdo;
    }


}