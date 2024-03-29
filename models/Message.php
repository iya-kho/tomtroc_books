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
  private bool $isRead = false;

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
   * Setter for the isRead.
   * @param bool $isRead
   */
  public function setIsRead(bool $isRead) : void
  {
    $this->isRead = $isRead;
  }

  /**
   * Getter for the isRead.
   * @return bool
   */
  public function getIsRead() : bool
  {
    return $this->isRead;
  }

   /**
   * Format the date and time of creation
   * @param string $format : the format of the date and time.
   * @return string
   */
  public function getFormattedDatetimeCreation(string $format = 'short') : string
  {
    $now = new DateTime();
    $interval = $now->diff($this->datetimeCreation);

    if ($format === 'short') {
      switch (true) {
        case $interval->y > 0:
          $result = $this->datetimeCreation->format('j.m.Y');
          break;
        case $interval->d > 0:
          $result = $this->datetimeCreation->format('j.m');
          break;
        default:
          $result = $this->datetimeCreation->format('H:i');
      };

      return $result;
    }

    switch (true) {
      case $interval->y > 0:
        $result = $this->datetimeCreation->format('j.m.Y H:i');
        break;
      default:
        $result = $this->datetimeCreation->format('j.m H:i');
    };

    return $result;
  }

}