<?php

class BookController
{   
  private BookManager $bookManager;
  private UserController $userController;

  public function __construct()
  {
      $this->bookManager = new BookManager();
      $this->userController = new UserController();
  }

  /**
   * Show the home page
   * @return void
   */
  public function showHome() : void
  {
      //Show the last books added to the library
      $books = $this->bookManager->getLastBooks();
      
      $view = new View("Home");
      $view->render("home", ['books' => $books]);
  }
    
  /**
   * Show all books or perform a search
   * @return void
   */
  public function showAllBooks() : void
  {
      //If the user has searched for a book in the search bar, we display the results
      //Otherwise, we display all the books
      if (isset($_POST['search']) && strlen($_POST['search']) >= 3) {
          $query = htmlspecialchars($_POST['search']);
          $books = $this->bookManager->searchBooks($query);
      } else {
          $books = $this->bookManager->getAllBooks();
      }

      $view = new View("Books");
      $view->render("books", ['books' => $books]);
  }

  // /**
  //  * Show a book
  //  * @return void
  //  */
  public function showOneBook() : void
  {
      // Get the id of the requested book
      $id = Utils::request("id", -1);

      //Find the requested book
      $book = $this->bookManager->getBookById($id);
      
      if (!$book) {
          throw new Exception("The requested book does not exist.");
      }

      //Render the view
      $view = new View($book->getTitle());
      $view->render("book", ['book' => $book]);
  }

  /**
   * Delete a book
   */
  public function deleteBook()
  {
    $this->userController->checkIfUserIsConnected();

    $id = Utils::request("id", -1);

    // Delete the book.
    $bookManager->deleteBook($id);
    
    // Redirect to the profile page.
    Utils::redirect('profile&id=' . $_SESSION['userId']);
  }

/**
 * Show the form to modify a book
 */
  public function modifyBook()
  {
    $this->userController->checkIfUserIsConnected();

    $id = Utils::request("id", -1);

    // Find the book by its id.
    $book = $this->bookManager->getBookById($id);

    // If the book does not exist, throw an exception.
    if (!$book) {
      throw new Exception("The requested book does not exist.");
    }

    // Render the view.
    $view = new View("Book");
    $view->render("modifyBook", ['book' => $book, 'picErrors' => []]);
  }

  // Process the form to modify a book
  public function modifyBookForm()
  {
    $this->userController->checkIfUserIsConnected();

    // Find the book by its id.
    $id = $_POST['id'];

    $book = $this->bookManager->getBookById($id);

    // If the book does not exist, throw an exception.
    if (!$book) {
      throw new Exception("The requested book does not exist.");
    }

    // // Process the text fields of the form.
    $book->setAttributesFromForm();

    // // Process the book cover.
    $picErrors = $book->setImageFromForm('bookImg', 'img/books/');

    // // Update the book in the database.
    $this->bookManager->updateBook($book);

    //If the form is valid, redirect to the profile page
    if (empty($picErrors)) {
      Utils::redirect('profile&id=' . $_SESSION['userId']);
    }

    // If the form is not valid, show the errors.
    $view = new View("Book");
    $view->render("modifyBook", ['book' => $book, 'picErrors' => $picErrors]);
  }

}