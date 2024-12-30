<?php

require 'Utilisateur.php';
require 'IUserRepository.php';

class BDUser implements \IUserRepository{
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
            "INSERT INTO user (civilite, prenom, nom, email, password) VALUES (:civilite, :prenom, :nom, :email, :password)");

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
        // TODO: Implement findUserByEmail() method.
        $stmt = $this->connexion->prepare(
            "SELECT * FROM user WHERE email = :email"
        );

        $retour= $stmt->fetch(\PDO::FETCH_ASSOC);
        if($retour === false ){
            return null;
        }
        return new Utilisateur(null, null, null, $retour['email'], $retour['password']);
    }
}