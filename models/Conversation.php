<?php

class Conversation 
{
  private User $user1;
  private User $user2;
  private array $messages = [];

  public function __construct($user1, $user2) {
    $this->user1 = $user1;
    $this->user2 = $user2;
    $this->loadMessages();
  }

  /**
   * Load the messages between the two users and sort them by date.
   */
  private function loadMessages()
  {
    $messageManager = new MessageManager();
    $messages = $messageManager->getMessagesBetweenUsers($this->user1->getId(), $this->user2->getId());

    usort($this->messages, function($a, $b) {
      return $b->getDatetimeCreation() <=> $a->getDatetimeCreation();
    });

    $this->messages = $messages;
  }

  /**
   * Getter for the messages.
   */
  public function getMessages() : array
  {
    return $this->messages;
  }

  /**
   * Get the last message of the conversation.
   */
  public function getLastMessage() : Message|null
  {
    if (empty($this->messages)) {
      return null;
    }

    return $this->messages[0];
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

    $interlocutor = $this->user1->getId() === $_SESSION['userId'] ? $this->user2 : $this->user1;

    return $interlocutor;
  }

  /**
   * Get the number of unread messages of the logged in user in the current conversation.
   * @return int
   */
  public function getUnreadMessagesCount() : int
  {
    $unreadMessages = array_filter($this->messages, function($message) {
      return $message->getReceiverId() === $_SESSION['userId'] && !$message->getIsRead();
    });

    $unreadMessagesCount = count($unreadMessages);

    return $unreadMessagesCount;
  }
}