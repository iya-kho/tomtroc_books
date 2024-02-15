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
}