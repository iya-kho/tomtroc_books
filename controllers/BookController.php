<?php

class BookController
{
    /**
     * Show all books
     * @return void
     */
    public function showAllBooks() : void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();

        $view = new View("Books");
        $view->render("books", ['books' => $books]);
    }

    // /**
    //  * Show a book
    //  * @return void
    //  */
    public function showBook() : void
    {
        // Get the id of the requested book
        $id = Utils::request("id", -1);

        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);
        
        if (!$book) {
            throw new Exception("The requested book does not exist.");
        }

        $view = new View($book->getTitle());
        $view->render("detailBook", ['book' => $book]);
    }

    // /**
    //  * Show the form to add a book
    //  * @return void
    //  */
    // public function addBook() : void
    // {
    //     $view = new View("Add a book");
    //     $view->render("addBook");
    // }
}