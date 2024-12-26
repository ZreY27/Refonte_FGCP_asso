<?php

class Utilisateur
{
    public function __construct(private string $civilite, private string $prenom, private string $nom, private string $email, private string $mdp){}

    public function getMail() : string{
        return $this->email;
    }

}