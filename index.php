<?php 

require_once 'config/config.php';
require_once 'config/autoload.php';
require_once 'config/content.php';

// Get the action to perform
// If no action is specified, we will display the home page
$action = Utils::request('action', 'home');

// Global try/catch block
try {
    switch ($action) {
        // Pages accessible to everyone
        case 'home':
          $bookController = new BookController();
          $bookController->showHome();
          break;
        case 'books':
          $bookController = new BookController();
          $bookController->showAllBooks();
          break;
        case 'book':
          $bookController = new BookController();
          $bookController->showOneBook();
          break;
        case 'login':
        case 'signup':
          $userController = new UserController();
          $userController->showLoginSignup();
          break;
        //Public or private profile
        case 'profile':
          $userController = new UserController();
          $userController->showProfile();
          break;
        //Admin
        case 'modifyUserInfo':
          $userController = new UserController();
          $userController->modifyUserInfo();
          break;
        case 'deleteBook':
          $bookController = new BookController();
          $bookController->deleteBook();
          break;
        case 'modifyBook':
          $bookController = new BookController();
          $bookController->modifyBook();
          break;
        case 'modifyBookForm':
          $bookController = new BookController();
          $bookController->modifyBookForm();
          break;
        case 'messenger':
          $messageController = new MessageController();
          $messageController->showMessenger();
          break;
        case 'sendMessage':
          $messageController = new MessageController();
          $messageController->sendMessage();
          break;
        default:
          throw new Exception("The requested page does not exist.");
    }
} catch (Exception $e) {
    // In case of an error, show error message.
    echo 'Error: ' . $e->getMessage();
}
?>


