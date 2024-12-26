<?php

require 'Utilisateur.php';
class BDUser{
    public function __construct(\PDO $connexion){}

    /**
     * Effectue l'enregistrement d'un utilisateur dans la base
     * retourne true en cas de succès et false en cas d'erreur
     * @param Utilisateur $user
     * @return bool
     */
    public function saveUser(Utilisateur $user) : bool {

        $bdConnect= new BDDConnect('basePers.db');

        if ($this->findUserByEmail($user->getMail())===null){

            $requete= "INSERT INTO $user (civilite, prenom, nom, email, password)";
            $retour= $bdConnect->prepare($requete);
            $retour->execute();

            return true;
        }

        return false;
    }


    /**
     * Recherche un utilisateur à partir de son email dans la base
     * Retourne l'utilisateur si l'utilisateur est enregistré. Sinon null
     * @param string $email
     * @return Utilisateur|null
     */
    public function findUserByEmail(string $email) : ?Utilisateur {
        // TODO: Implement findUserByEmail() method.
        $bdConnect= new BDDConnect('basePers.db');

        $requete= "SELECT * FROM user WHERE $email= :email";
        $retour= $bdConnect->query($requete);
        if($retour === false ){
            return null;
        }
        return Utilisateur;

    }
}