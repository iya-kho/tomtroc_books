<?php

class MessageController 
{ 
  private UserController $userController;
  private UserManager $userManager;
  private MessageManager $messageManager;

  public function __construct()
  {
    $this->userController = new UserController();
    $this->userManager = new UserManager();
    $this->messageManager = new MessageManager();
  }

  /**
   * Show the messenger page
   */
  public function showMessenger() : void
  {
   //If the user is not connected, we redirect him to the login page
    $this->userController->checkIfUserIsConnected();
    
    //Find the user in the database
    $user = $this->userManager->findUser('id', $_SESSION['userId']);

    $messagesBetweenUsers = [];
    
    //If the id is set in the URL, the messenger will show the messages between the user and the interlocutor.
    if (isset($_GET['id'])) {
      $interlocutor = $this->userManager->findUser('id', $_GET['id']);

      if (!$interlocutor) {
        throw new Exception("L'utilisateur n'existe pas");
      }

      $chat = new Conversation($user, $interlocutor);

      //Mark the messages as read
      if ($chat->getUnreadMessagesCount() > 0) {
        $this->messageManager->markMessagesAsRead($user->getId(), $interlocutor->getId());
      }

      $messagesBetweenUsers = array_reverse($chat->getMessages());
    }

    //Find all the user's conversations
    $conversations = $this->getConversations($user->getId());

    $view = new View("Messenger");
    $view->render("messenger", [
      "conversations" => $conversations, 
      "messagesBetweenUsers" => $messagesBetweenUsers,
      "interlocutor" => $interlocutor ?? null
    ]);
  }

  /**
   * Send a message
   */
  public function sendMessage(): void
  {
    //If the user is not connected, we redirect him to the login page
    $this->userController->checkIfUserIsConnected();

    //If the form is not empty
    if (!Utils::isEmpty($_POST)) {
      $message = new Message([
        'senderId' => $_SESSION['userId'],
        'receiverId' => $_POST['receiverId'],
        'content' => $_POST['content'],
      ]);

      $this->messageManager->sendMessage($message);
    }

    //Redirect to the conversation page
    Utils::redirect('messenger&id=' . $_POST['receiverId']);
  }

  /**
   * Get all the user's conversations.
   * @param int $userId : the id of the user.
   * @return array : an array of Conversation objects.
   */
  public function getConversations(int $userId) : array
  { 
    //Find the user in the database
    $userManager = new UserManager();
    $user = $userManager->findUser('id', $userId);

    //Find all the user's interlocutors
    $interlocutors = $this->messageManager->getInterlocutors($userId);

    //Create a conversation for each interlocutor
    $conversations = [];
    foreach ($interlocutors as $interlocutor) {
      $conversations[] = new Conversation($user, $interlocutor);
    }

    return $conversations;
  }
}