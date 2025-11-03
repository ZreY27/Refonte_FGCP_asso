<?php

interface ISurvey
{
    public function updateUserSurvey(Utilisateur $user) : bool;
    public function saveEnqueteResponses($survey, $idUser);
    public function updateSurveyStatus($email, $status);

}