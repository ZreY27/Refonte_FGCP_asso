<?php

namespace Iutrds\Tp5;

class MariaDBUserRepository implements IUserRepository {

  public function __construct(private \PDO $dbConnexion) { }

  /**
   * Effectue l'enregistrement d'un utilisateur (email/password) dans la base MariaDB
   * retourne true en cas de succès et false en cas d'erreur
   * @param User $user
   * @return bool
   */
  public function saveUser(User $user) : bool {
    // TODO: Implement saveUser() method.

  }


  /**
   * Recherche un utilisateur à partir de son email dans la base MariaDB.
   * Retourne l'utilisateur si l'utilisateur est enregistré. Sinon null
   * @param string $email
   * @return User|null
   */
  public function findUserByEmail(string $email) : ?User {
    // TODO: Implement findUserByEmail() method.

  }
}