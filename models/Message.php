<?php

/**
 * Entity Message, a message is defined by the fields
 * id, senderId, receiverId, datetimeCreation, content
 */
class Message extends AbstractEntity
{
  private int $senderId;
  private int $receiverId;
  private ?DateTime $datetimeCreation = null;
  private string $content = '';

  /**
   * Setter for the senderId.
   * @param int $senderId
   */
  public function setSenderId(int $senderId) : void
  {
    $this->senderId = $senderId;
  }

  /**
   * Getter for the senderId.
   * @return int
   */
  public function getSenderId() : int
  {
    return $this->senderId;
  }

  /**
   * Setter for the receiverId.
   * @param int $receiverId
   */
  public function setReceiverId(int $receiverId) : void
  {
    $this->receiverId = $receiverId;
  }

  /**
   * Getter for the receiverId.
   * @return int
   */
  public function getReceiverId() : int
  {
    return $this->receiverId;
  }

  /**
  * Setter for the date and time of creation. If the date is a string, we convert it to a DateTime object.
  * @param string|DateTime $dateCreation
  */ 
  public function setDatetimeCreation(string|DateTime $datetimeCreation) : void 
  {
      $this->datetimeCreation = Utils::stringToDate($datetimeCreation, 'Y-m-d H:i:s');
  }

  /**
   * Getter for the date and time of creation.
   * @return DateTime
   */
  public function getDatetimeCreation() : DateTime
  {
      return $this->datetimeCreation;
  }

  /**
   * Setter for the content.
   * @param string $content
   */
  public function setContent(string $content) : void
  {
    $this->content = $content;
  }

  /**
   * Getter for the content.
   * @return string
   */
  public function getContent(int $length = -1) : string
  {
    return Utils::truncate($this->content, $length);
  }

  /**
   * Get the interlocutor of the logged in user.
   * @return User
   */
  public function getInterlocutor() : User
  {
    $userController = new UserController();
    $userController->checkIfUserIsConnected();
    $userManager = new UserManager();

    $interlocutorId = $this->senderId === $_SESSION['userId'] ? $this->receiverId : $this->senderId;
    return $userManager->findUser('id', $interlocutorId);
  }

  /**
   * Format the date and time of creation
   * @return string
   */
  public function getFormattedDatetimeCreation() : string
  {
    $now = new DateTime();
    $interval = $now->diff($this->datetimeCreation);

    if ($interval->y > 0) {
      $result = $this->datetimeCreation->format('j.m.Y');
    } elseif ($interval->d > 0) {
      $result = $this->datetimeCreation->format('j.m');
    } else {
      $result = $this->datetimeCreation->format('H:i');
    }

    return $result;
  }

}