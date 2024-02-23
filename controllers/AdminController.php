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
    $user = $this->userManager->getUserById($userId) ?? null;

    if (!$user) {
      throw new Exception("The requested user does not exist.");
    }

    //Render the view
    $view = new View("Profile");
    $view->render("profile", ['user' => $user]);
  }

  public function showLogin()
  { 
    //If the user is already connected, log them out and redirect to the home page
    if (isset($_SESSION['user'])) {
      unset($_SESSION['user']);
      Utils::redirect("home");
    }

    //If the user is not connected, show the login page
    $view = new View("Login");
    $view->render("loginSignup");
  }

  public function showSignup()
  {
    //If the user is already connected, log them out and redirect to the home page
    if (isset($_SESSION['user'])) {
      unset($_SESSION['user']);
      Utils::redirect("home");
    }

    //If the user is not connected, show the signup page
    $view = new View("Signup");
    $view->render("loginSignup");
  }
}