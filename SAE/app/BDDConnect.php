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

            $this->pdo = new PDO("sqlite:" . $databasePath, '', '', $options ?? []);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $sql = "
        CREATE TABLE IF NOT EXISTS user (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            civilite VARCHAR(3) NOT NULL,
            nom VARCHAR(30) NOT NULL,
            prenom VARCHAR(30) NOT NULL,
            email VARCHAR(30) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            administrator BOOLEAN NOT NULL DEFAULT 0,
            survey BOOLEAN NOT NULL DEFAULT 0
        );

        CREATE TABLE IF NOT EXISTS survey (
            idSurvey INTEGER PRIMARY KEY AUTOINCREMENT,
            q1 VARCHAR(30) NOT NULL,
            q2 VARCHAR(30) NOT NULL,
            q3 VARCHAR(30) NOT NULL,
            FOREIGN KEY(idUser) REFERENCES user(id)
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

    public function getSurveyAnswersByQuestion($question) {
        $stmt = $this->pdo->prepare("SELECT `$question` FROM SURVEY");
        $stmt->execute();
        return json_encode($stmt->fetchAll(PDO::FETCH_COLUMN));
    }
}
