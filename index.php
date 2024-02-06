<?php 

// require_once 'config/config.php';
// require_once 'config/autoload.php';
require_once 'utils/Utils.php';

// Get the action to perform
// If no action is specified, we will display the home page
$action = Utils::request('action', 'home');

// Try catch global pour gérer les erreurs
try {
    // Pour chaque action, on appelle le bon contrôleur et la bonne méthode.
    switch ($action) {
        // Pages accessibles à tous.
        case 'home':
          require_once 'views/pages/home.php';
          break;
        case 'books':
          require_once 'views/pages/books.php';
          break;
        default:
          throw new Exception("The requested page does not exist.");
    }
} catch (Exception $e) {
    // In case of an error, show error message.
    echo 'Error: ' . $e->getMessage();
}
?>


