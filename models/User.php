<?php

/**
 * Entity User, a user is defined by the fields
 * id, username, imageUrl, dateSignup.
 */

 class User extends AbstractEntity 
 {
    private string $userneme = '';
    private string $imageUrl = '';
    private ?DateTime $dateSignup = null;

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