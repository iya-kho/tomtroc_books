<?php

/** 
 * Class that manages books.
 */

class BookManager extends AbstractEntityManager
{
  /**
   * Get all books.
   * @return array : an array of Book objects.
   */
  public function getAllBooks() : array
  {
    $sql = "SELECT * FROM books";
    $result = $this->db->query($sql);
    $books = [];

    while ($book = $result->fetch()) {
      $books[] = new Book($book);
    }
    return $books;
  }

  public function searchBooks(string $query) : ?array
  {
    $sql = "SELECT * FROM books WHERE title LIKE ? OR author LIKE ?";
    $result = $this->db->query($sql, ["%$query%", "%$query%"]);
    $books = [];

    while ($book = $result->fetch()) {
      $books[] = new Book($book);
    }
    return $books ? $books : null;
  }

  /**
   * Get a book by its id.
   * @param int $id : the id of the book.
   * @return Book : the book.
   */
  public function getBookById(int $id) : ?Book
  {
    $sql = "SELECT * FROM books WHERE id = ?";
    $result = $this->db->query($sql, [$id]);
    $book = $result->fetch();
    return $book ? new Book($book) : null;
  }

  /**
   * Get books by user id.
   * @param int $userId : the id of the user.
   * @return array : an array of Book objects.
   */
  public function getBooksByUserId(int $userId) : array
  {
    $sql = "SELECT * FROM books WHERE user_id = ?";
    $result = $this->db->query($sql, [$userId]);
    $books = [];

    while ($book = $result->fetch()) {
      $books[] = new Book($book);
    }
    return $books;
  }

  /**
   * Get the last books added to the library.
   * @param int $limit : the number of books to get.
   * @return array : an array of Book objects.r
   */
  public function getLastBooks() : array
  {
    $sql = "SELECT * FROM books ORDER BY date_creation DESC LIMIT 4";
    $result = $this->db->query($sql);
    $books = [];

    while ($book = $result->fetch()) {
      $books[] = new Book($book);
    }
    return $books;
  }

  /**
   * Delete a book by its id.
   * @param int $id : the id of the book.
   */
  public function deleteBook(int $id) : void
  {
    $sql = "DELETE FROM books WHERE id = ?";
    $this->db->query($sql, [$id]);
  }

  /**
   * Update a book in the database.
   * @param Book $book : the book to update.
   * @return void
   */
  public function updateBook(Book $book) : void
  {
    $sql = "UPDATE books SET title = :title, author = :author, description = :description, availability = :availability, image_url = :imageUrl WHERE id = :id";
    $this->db->query($sql, [
      'title' => $book->getTitle(), 
      'author' => $book->getAuthor(), 
      'description' => $book->getDescription(), 
      'availability' => $book->getAvailability(), 
      'imageUrl' => $book->getImageUrl(),
      'id' => $book->getId()]);
  }
}