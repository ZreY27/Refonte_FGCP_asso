<?php

namespace Iutrds\Tp5;

class Authentification {

  public function __construct(private IUserRepository $userRepository) { }

  /**
   * @throws AuthentificationException
   */
  public function register(string $email, string $password, string $repeat) : bool {
    // TODO : À compléter en appellant les exceptions AuthentificationException

    $user = new User($email, $password);
    return $this->userRepository->saveUser($user);
  }

  /**
   * @throws AuthentificationException
   */
  public function authenticate(string $email, string $password) : string {
    // TODO : À compléter
  }

}