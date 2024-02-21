<?php

class BookController
{   
    private BookManager $bookManager;

    public function __construct()
    {
        $this->bookManager = new BookManager();
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
}