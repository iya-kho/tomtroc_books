<?php

/**
 * Entity Book, a book is defined by the fields
 * id, title, author, userId, username, imageUrl, description, availability, dateCreation.
 */

 class Book extends AbstractEntity 
 {
    private string $title = '';
    private string $author = '';
    private int $userId;
    private string $imageUrl = '';
    private string $description = '';
    private bool $availability = false;
    private ?DateTime $dateCreation = null;
    private ?User $owner = null;

    /**
     * Get information about the user who owns the book.
     */
    public function getOwner() : User
    {
        if (!$this->owner) {
            $this->setOwner();
        }

        return $this->owner;
    }

    /**
     * Set the user who owns the book.
     */
    private function setOwner() : void
    {
        $userManager = new UserManager();
        $owner = $userManager->findUser('id', $this->userId);

        $this->owner = $owner;
    }
  
    /**
     * Setter for the title.
     * @param string $title
     */
    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }

    /**
     * Getter for the title.
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * Setter for the author.
     * @param string $author
     */
    public function setAuthor(string $author) : void
    {
        $this->author = $author;
    }

    /**
     * Getter for the author.
     * @return string
     */
    public function getAuthor() : string
    {
        return $this->author;
    }

    /**
     * Setter for the user id.
     * @param int $userId
     */
    public function setUserId(int $userId) : void
    {
        $this->userId = $userId;
    }

    /**
     * Getter for the user id.
     * @return int
     */
    public function getUserId() : int
    {
        return $this->userId;
    }

    /**
     * Setter for the image url.
     * @param string $imageUrl
     */
    public function setImageUrl(string $imageUrl) : void
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * Getter for the image url.
     * @return string
     */
    public function getImageUrl() : string
    {
        return $this->imageUrl;
    }

    /**
     * Setter for the description.
     * @param string $description
     */
    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }

    /**
     * Getter for the description.
     * @param int $length : the length of the description. By default, we return the full description.
     * If the length was passed, we return the description with a maximum length of $length.
     * @return string
     */
    public function getDescription(int $length = -1) : string 
    {
        return Utils::truncate($this->description, $length);
    }

    /**
     * Setter for the availability.
     * @param bool $availability
     */
    public function setAvailability(bool $availability) : void
    {
        $this->availability = $availability;
    }

    /**
     * Getter for the availability.
     * @return bool
     */
    public function getAvailability() : bool
    {
        return $this->availability;
    }

    /**
    * Setter for the date of creation. If the date is a string, we convert it to a DateTime object.
    * @param string|DateTime $dateCreation
    * By default, it's the mysql date format that is used.
    */ 
    public function setDateCreation(string|DateTime $dateCreation) : void 
    {
        $this->dateCreation = Utils::stringToDate($dateCreation);
    }
    
    /**
     * Getter for the date of creation.
     * Thanks to the setter, we are sure to get a DateTime object.
     * @return DateTime
     */
    public function getDateCreation(): DateTime
    {
        return $this->dateCreation;
    }

 }