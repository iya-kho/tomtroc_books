<?php
/**
 * Class that manages messages.
 */

class MessageManager extends AbstractEntityManager
{
  /**
   * Get the last messages of each user's conversation.
   * @return array : an array of Message objects.
   */
  public function getChatLastMessages($userId) : array
  {
    $sql = "SELECT * 
            FROM messages 
            WHERE id IN (
                SELECT MAX(id) 
                FROM messages 
                WHERE sender_id = :userId OR receiver_id = :userId 
                GROUP BY (LEAST(sender_id, receiver_id)), GREATEST(sender_id, receiver_id)
            ) 
            ORDER BY datetime_creation DESC";
    
    $result = $this->db->query($sql, ['userId' => $userId]);
    $messages = [];

    while ($message = $result->fetch()) {
      $messages[] = new Message($message);
    }
    return $messages;
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

}