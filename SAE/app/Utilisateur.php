<?php

class Utilisateur
{
    private string $civilite;
    private string $prenom;
    private string $nom;
    private string $email;
    private string $password;
    private bool $survey;

    public function __construct(string $civilite, string $nom, string $prenom, string $email, string $mdp){
        $this->password = $mdp;
        $this->email = $email;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->civilite = $civilite;
    }

    public function getMail() : string{
        return $this->email;
    }

    public function getPassword() : string { return $this->password; }

    public function getCivilite(): string
    {
        return $this->civilite;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @return bool
     */
    public function isSurveyDone(): bool
    {
        return $this->survey;
    }

    /**
     * @param bool $survey
     */
    public function setSurvey(bool $survey): void
    {
        $this->survey = $survey;
    }

}