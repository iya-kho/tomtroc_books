<?php

class MessageController 
{ 
  private UserController $userController;
  private MessageManager $messageManager;

  public function __construct()
  {
    $this->userController = new UserController();
    $this->messageManager = new MessageManager();
  }

  public function showMessenger() : void
  {
   //If the user is not connected, we redirect him to the login page
    $this->userController->checkIfUserIsConnected();

    //Find the last messages of each user's conversation
    $chatLastMessages = $this->messageManager->getChatLastMessages($_SESSION['userId']);

    $view = new View("Messenger");
    $view->render("messenger", ["chatLastMessages" => $chatLastMessages]);
  }
}