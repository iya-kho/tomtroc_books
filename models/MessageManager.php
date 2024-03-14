<?php
/**
 * Class that manages messages.
 */

class MessageManager extends AbstractEntityManager
{
  /**
   * Get all the user's interlocutors.
   * @param int $userId : the id of the user.
   * @return array : an array of User objects.
   */
  public function getInterlocutors(int $userId) : array
  {    
    $sql = "SELECT * 
            FROM users 
            WHERE id IN (
                SELECT sender_id 
                FROM messages 
                WHERE receiver_id = :userId 
                UNION 
                SELECT receiver_id 
                FROM messages 
                WHERE sender_id = :userId
            )";
    $result = $this->db->query($sql, ['userId' => $userId]);
    $interlocutors = [];

    while ($interlocutor = $result->fetch()) {
      $interlocutors[] = new User($interlocutor);
    }

    return $interlocutors;
  }

  /**
   * Get the messages between two users.
   * @param int $userId : the id of the user.
   * @param int $interlocutorId : the id of the interlocutor.
   * @return array : an array of Message objects.
   */
  public function getMessagesBetweenUsers(int $userId, int $interlocutorId) : array
  {
    $sql = "SELECT * 
            FROM messages 
            WHERE (sender_id = :userId AND receiver_id = :interlocutorId) 
            OR (sender_id = :interlocutorId AND receiver_id = :userId) 
            ORDER BY datetime_creation DESC";
    
    $result = $this->db->query($sql, ['userId' => $userId, 'interlocutorId' => $interlocutorId]);
    $messages = [];

    while ($message = $result->fetch()) {
      $messages[] = new Message($message);
    }
    return $messages;
  }

  /**
   * Send a message.
   * @param Message $message : the message to send.
   */
  public function sendMessage(Message $message) : void
  {
    $sql = "INSERT INTO messages (sender_id, receiver_id, content, datetime_creation) VALUES (:senderId, :receiverId, :content, NOW())";
    $this->db->query($sql, [
      'senderId' => $message->getSenderId(),
      'receiverId' => $message->getReceiverId(),
      'content' => $message->getContent()
    ]);
  }

  /**
   * Get the number of unread messages.
   * @param int $userId : the id of the user.
   * @return int : the number of unread messages.
   */
  public function getUnreadMessagesCount(int $userId) : int
  {
    $sql = "SELECT COUNT(*) 
            FROM messages 
            WHERE receiver_id = :userId 
            AND is_read = 0";
    $result = $this->db->query($sql, ['userId' => $userId]);
    $unreadMessagesCount = $result->fetchColumn();
    return $unreadMessagesCount;
  }

  /**
   * Mark the messages as read.
   * @param int $userId : the id of the user.
   * @param int $interlocutorId : the id of the interlocutor.
   */
  public function markMessagesAsRead(int $userId, int $interlocutorId) : void
  {
    $sql = "UPDATE messages 
            SET is_read = 1 
            WHERE receiver_id = :userId 
            AND sender_id = :interlocutorId";
    $this->db->query($sql, ['userId' => $userId, 'interlocutorId' => $interlocutorId]);
  }
}