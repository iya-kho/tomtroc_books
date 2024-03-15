<?php 
//Start the session
session_start(); 

require_once 'config/config.php';
require_once 'config/autoload.php';
require_once 'config/content.php';
require_once 'config/Router.php';

// Paths
define('TEMPLATE_VIEW_PATH', './views/templates/'); // Path to the views templates.
define('MAIN_VIEW_PATH', './views/main.php'); // Path to the main template.

// Get the action to perform
// If no action is specified, we will display the home page
$action = Utils::request('action', 'home');;

// Create a new router
$router = new Router();

// Add routes
$router->addRoute('home', 'BookController', 'showHome');
$router->addRoute('books', 'BookController', 'showAllBooks');
$router->addRoute('book', 'BookController', 'showOneBook');
$router->addRoute('login', 'UserController', 'showLoginSignup');
$router->addRoute('signup', 'UserController', 'showLoginSignup');
$router->addRoute('profile', 'UserController', 'showProfile');
$router->addRoute('modifyUserInfo', 'UserController', 'modifyUserInfo');
$router->addRoute('deleteBook', 'BookController', 'deleteBook');
$router->addRoute('modifyBook', 'BookController', 'modifyBook');
$router->addRoute('modifyBookForm', 'BookController', 'modifyBookForm');
$router->addRoute('messenger', 'MessageController', 'showMessenger');
$router->addRoute('sendMessage', 'MessageController', 'sendMessage');

//Global try/catch block
try {
// Perform the action
  $router->dispatch($action);
} catch (Exception $e) {
  // In case of an error, show error message.
  $errorView = new View('Erreur');
  $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);;
}





