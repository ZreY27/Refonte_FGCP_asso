<?php

require 'Utilisateur.php';
require 'IUserRepository.php';
require 'ISurvey.php';
require 'Survey.php';

class BDUser implements IUserRepository, ISurvey {
    private PDO $connexion;

    public function __construct(\PDO $connexion){
        $this->connexion = $connexion;
    }

    /**
     * Effectue l'enregistrement d'un utilisateur dans la base
     * retourne true en cas de succès et false en cas d'erreur
     * @param Utilisateur $user
     * @return bool
     */
    public function saveUser(Utilisateur $user) : bool {
        $stmt = $this->connexion->prepare(
            "INSERT INTO user (civilite, nom, prenom, email, password) VALUES (:civilite, :nom, :prenom, :email, :password)");

        return $stmt->execute([
            'email' => $user->getMail(),
            'password' => password_hash($user->getPassword(), PASSWORD_DEFAULT),
            'civilite' => $user->getCivilite(),
            'prenom' => $user->getPrenom(),
            'nom' => $user->getNom(),
        ]);

//        $bdConnect= new BDDConnect('basePers.db');
//
//        if ($this->findUserByEmail($user->getMail())===null){
//
//            $requete= "INSERT INTO user (civilite, prenom, nom, email, password) VALUES (:civilite, :prenom, :nom, :email, :password)";
//            $retour= $bdConnect->prepare($requete);
//            $retour->execute();
//
//            return true;
//        }
//
//        return false;
    }


    /**
     * Recherche un utilisateur à partir de son email dans la base
     * Retourne l'utilisateur si l'utilisateur est enregistré. Sinon null
     * @param string $email
     * @return Utilisateur|null
     */
    public function findUserByEmail(string $email) : ?Utilisateur {
        $stmt = $this->connexion->prepare(
            "SELECT * FROM user WHERE email = :email"
        );
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if($result) {
            return new Utilisateur($result['civilite'], $result['nom'], $result['prenom'], $result['email'], $result['password']);
        }
        return null;
    }

    public function updateUserSurvey(Utilisateur $user) : bool {
        $stmt = $this->connexion->prepare(
            "UPDATE user SET survey = :survey WHERE email = :email");

        return $stmt->execute([
            'email' => $user->getMail(),
            'survey' => $user->isSurveyDone()
        ]);
    }

    public function saveEnqueteResponses($survey, $email) {
        $stmt = $this->connexion->prepare("SELECT id FROM user WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $idUser = $stmt->fetchColumn();

        $stmt = $this->connexion->prepare(
            "INSERT INTO survey (idUser, Q1, Q2, Q3) VALUES (:idUser, :Q1, :Q2, :Q3)"
        );
        return $stmt->execute([
            'idUser' => $idUser,
            'Q1' => $survey->getQ1(),
            'Q2' => $survey->getQ2(),
            'Q3' => $survey->getQ3(),
        ]);
    }


    public function updateSurveyStatus($email, $status) {
        $user = $this->findUserByEmail($email);
        $user->setSurvey($status);
        $this->updateUserSurvey($user);
    }

}