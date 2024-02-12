<?php 

require_once 'config/config.php';
require_once 'config/autoload.php';

// Get the action to perform
// If no action is specified, we will display the home page
$action = Utils::request('action', 'home');

// Global try/catch block
try {
    switch ($action) {
        // Pages accessible to everyone
        case 'home':
          require_once 'views/pages/home.php';
          break;
        case 'books':
          $bookController = new BookController();
          $bookController->showAllBooks();
          break;
        case 'book':
          $bookController = new BookController();
          $bookController->showOneBook();
          break;
        default:
          throw new Exception("The requested page does not exist.");
    }
} catch (Exception $e) {
    // In case of an error, show error message.
    echo 'Error: ' . $e->getMessage();
}
?>


