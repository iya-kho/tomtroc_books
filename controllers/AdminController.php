<?php

class AdminController 
{
  private UserManager $userManager;

  public function __construct()
  {
    $this->userManager = new UserManager();
  }

  public function showProfile()
  {
    //Get the user id from the URL
    $userId = Utils::request('id');

    //Find the user by id
    $user = $this->userManager->findUser('id', $userId) ?? null;

    if (!$user) {
      throw new Exception("The requested user does not exist.");
    }

    //Render the view
    $view = new View("Profile");
    $view->render("profile", ['user' => $user]);
  }

  public function showLoginSignup()
  {
    //If the user is already connected, log them out and redirect to the home page
    if (isset($_SESSION['user'])) {
      unset($_SESSION['user']);
      Utils::redirect("home");
    }

    $action = Utils::request('action', 'login');
    $messageColor = 'danger';
    $messages = [];

    //If the form has been submitted and the action is signup, process the signup.
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'signup') {
      list($isValid, $errors) = $this->processSignup();
      
      //If the form is valid, redirect to the login page
      if ($isValid) {
        $action = 'login';
        $messageColor = 'success';
        $messages[] = "Votre compte a bien été créé.\n Vous pouvez vous connecter.";
      }

      //If the form is not valid, show the signup page with the errors
      if (!$isValid) {
        $action = 'signup';
        $messages = $errors;
      }

    }

    $view = new View("Login");
    $view->render("loginSignup", ['action' => $action, 'messageColor' => $messageColor, 'messages' => $messages]);
  }

  private function processSignup() 
  {
    $isValid = true;
    $errors = [];

    //Check if all fields are filled
    if (Utils::isEmpty($_POST)) {
      $isValid = false;
      $errors[] = "All fields are required.";
    }

    $email = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    //Check if a user with this email already exists
    $user = $this->userManager->findUser('email', $email);
    if ($user) {
      $isValid = false;
      $errors[] = "A user with this email already exists.";
    }

    //Check if the email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $isValid = false;
      $errors[] = "Please enter a valid email.";
    }

    //Check if a user with this username already exists
    $user = $this->userManager->findUser('username', $username);
    if ($user) {
      $isValid = false;
      $errors[] = "A user with this username already exists.";
    }

    //Check if the password is at least 8 characters long
    if (strlen($password < 8)) {
      $isValid = false;
      $errors[] = "The password must be at least 8 characters long.";
    }

    //If the form is not valid, return the errors
    if (!$isValid) {
      return [$isValid, $errors];
    }

    //If the form is valid, add the user to the database
    $user = new User();
    $user->setUsername($username);
    $user->setEmail($email);
    $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
    $user->setDateSignup(new DateTime());

    $this->userManager->addUser($user);

    return [$isValid, $errors];
  }
}