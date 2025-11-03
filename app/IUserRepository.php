<?php


interface IUserRepository {
  public function saveUser(\Utilisateur $user): bool;
  public function findUserByEmail(string $email): ?Utilisateur;
}