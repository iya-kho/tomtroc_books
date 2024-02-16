<?php
/**
 * Class that manages users.
 */

class UserManager extends AbstractEntityManager
{
  /**
   * Get a user by their id.
   * @param int $id : the id of the user.
   * @return User : the user.
   */
  public function getUserById(int $id) : ?User
  {
    $sql = "SELECT * FROM users WHERE id = ?";
    $result = $this->db->query($sql, [$id]);
    $user = $result->fetch();
    return $user ? new User($user) : null;
  }
}