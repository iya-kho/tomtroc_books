<?php
/**
 * Class that manages users.
 */

class UserManager extends AbstractEntityManager
{
  /**
   * Find a user by a parameter.
   * @param string $attr : the attribute to search for.
   * @param string|int $value : the value of the attribute.
   * @return User : the user.
   */
  public function findUser(string $attr, string|int $value) : ?User
  {
    $sql = "SELECT * FROM users WHERE $attr = :$attr";
    $result = $this->db->query($sql, [$attr => $value]);
    $user = $result->fetch();
    return $user ? new User($user) : null;
  }

  /**
   * Add a user to the database.
  */
  public function addUser(User $user) : void
  {
    $sql = "INSERT INTO users (username, email, password, date_signup) VALUES (:username, :email, :password, :date_signup)";
    $this->db->query($sql, [
      'username' => $user->getUsername(),
      'email' => $user->getEmail(),
      'password' => $user->getPassword(),
      'date_signup' => Utils::dateToString($user->getDateSignup())
    ]);
  }

  /**
   * Modify the information of a user in the database.
   */
  public function updateUser(User $user) : void
  {
    $sql = "UPDATE users SET username = :username, email = :email, password = :password, image_url = :image_url WHERE id = :id";
    $this->db->query($sql, [
      'username' => $user->getUsername(),
      'email' => $user->getEmail(),
      'password' => $user->getPassword(),
      'image_url' => $user->getImageUrl(),
      'id' => $user->getId()
    ]);
  }
}