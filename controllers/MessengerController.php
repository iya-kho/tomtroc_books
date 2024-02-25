<?php

class MessengerController 
{
  public function showMessenger() : void
  {
    $view = new View("Messenger");
    $view->render("messenger");
  }
}