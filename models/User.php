<?php

/**
 * Entity User, a user is defined by the fields
 * id, username, imageUrl, dateSignup.
 */

 class User extends AbstractEntity 
 {
    private string $userneme = '';
    private string $email = '';
    private string $password = '';
    private string $imageUrl = '';
    private ?DateTime $dateSignup = null;
    private array $books = [];    

    //Get information about the books owned by the user.
    public function getBooks() : array
    {   
        if (empty($this->books)) {
            $this->setBooks();
        }

        return $this->books;
    }

    //Set the books owned by the user.
    private function setBooks() : void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getBooksByUserId($this->id);

        $this->books = $books;
    }

    //Calculate the number of books owned by the user.
    public function getBooksCount() : int
    {
        $count = count($this->getBooks());

        return $count;
    }

    //Calculate the period of time since the user signed up.
    public function getSignupDuration() : string
    {
        $now = new DateTime();
        $interval = $now->diff($this->dateSignup);

        switch ($interval->y) {
            case 0:
                if ($interval->m === 0) {
                    $result = $interval->format('%d jours');
                } else {
                    $result = $interval->format('%m mois');
                }
                break;
            case 1:
                $result = $interval->format('%y an');
                break;
            default:
                $result = $interval->format('%y ans');
        }

        return $result;
    }

    //Setter for the username.
    public function setUsername(string $username) : void
    {
        $this->username = $username;
    }

    //Getter for the username.
    public function getUsername() : string
    {
        return $this->username;
    }

    //Setter for the email.
    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }

    //Getter for the email.
    public function getEmail() : string
    {
        return $this->email;
    }

    //Setter for the password.
    public function setPassword(string $password) : void
    {
        $this->password = $password;
    }

    //Getter for the password.
    public function getPassword() : string
    {
        return $this->password;
    }

    //Setter for the image url.
    public function setImageUrl(string $imageUrl) : void
    {
        $this->imageUrl = $imageUrl;
    }

    //Getter for the image url.
    public function getImageUrl() : string
    {
        return $this->imageUrl;
    }

    //Setter for the date of signup.
    public function setDateSignup(string|DateTime $dateSignup) : void
    {
        $this->dateSignup = Utils::stringToDate($dateSignup);
    }

    //Getter for the date of signup.
    public function getDateSignup() : DateTime
    {
        return $this->dateSignup;
    }

 }