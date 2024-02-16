<?php

class BookController
{
    /**
     * Show all books or perform a search
     * @return void
     */
    public function showAllBooks() : void
    {
        $bookManager = new BookManager();

        //If the user has searched for a book in the search bar, we display the results
        //Otherwise, we display all the books
        if (isset($_POST['search']) && strlen($_POST['search']) >= 3) {
            $query = htmlspecialchars($_POST['search']);
            $books = $bookManager->searchBooks($query);
        } else {
            $books = $bookManager->getAllBooks();
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
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);
        
        if (!$book) {
            throw new Exception("The requested book does not exist.");
        }

        //Render the view
        $view = new View($book->getTitle());
        $view->render("book", ['book' => $book]);
    }
}