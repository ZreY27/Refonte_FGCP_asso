<?php

class BDDConnect {
    public \PDO $pdo;

    /**
     * @throws Exception
     */
    public function __construct($databasePath = null, $options = null) {
        $databasePath = $databasePath ?? (__DIR__ . '/../basePers');

        try {
            if (!file_exists($databasePath)) {
                throw new \Exception("Le fichier de base de données SQLite est introuvable : $databasePath");
            }

            $this->pdo = new PDO("sqlite:" . $databasePath, null, null, $options ?? []);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $sql = "
    CREATE TABLE IF NOT EXISTS user (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        civilite VARCHAR(3) NOT NULL,
        nom VARCHAR(30) NOT NULL,
        prenom VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL UNIQUE,
        password VARCHAR(30) NOT NULL
    );
    ";
            $this->pdo->exec($sql);

        } catch (\PDOException $e) {
            throw new \Exception("Erreur de connexion à la base SQLite : " . $e->getMessage());
        }
    }

    public function getConnection(): \PDO {
        return $this->pdo;
    }
}
