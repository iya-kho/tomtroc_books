<?php

class UserController 
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


}