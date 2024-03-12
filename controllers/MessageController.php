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

  public function showMessenger() : void
  {
   //If the user is not connected, we redirect him to the login page
    $this->userController->checkIfUserIsConnected();

    //Find the last messages of each user's conversation
    $chatLastMessages = $this->messageManager->getChatLastMessages($_SESSION['userId']);
    $messagesBetweenUsers = [];

    //If the id is set in the URL, the messenger will show the messages between the user and the interlocutor.
    if (isset($_GET['id'])) {
      $interlocutor = $this->userManager->findUser('id', $_GET['id']);

      if (!$interlocutor) {
        throw new Exception("L'utilisateur n'existe pas");
      }

      $messagesBetweenUsers = $this->messageManager->getMessagesBetweenUsers($_SESSION['userId'], $interlocutor->getId());
    }

    $view = new View("Messenger");
    $view->render("messenger", [
      "chatLastMessages" => $chatLastMessages, 
      "messagesBetweenUsers" => $messagesBetweenUsers,
      "interlocutor" => $interlocutor ?? null
    ]);
  }
}