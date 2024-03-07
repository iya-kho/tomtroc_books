<?php

abstract class AbstractEntity 
{
    //The default value of the id attribute is -1 to indicate that the entity is not yet saved in the database.
    protected int $id = -1;

    /**
     * Constructor of the class.
     * If the constructor receives an array of data, it will call the hydrate method.
     * 
     * @param array $data
     */
    public function __construct(array $data = []) 
    {
        if (!empty($data)) {
            $this->hydrate($data);
        }
    }

    /**
     * Hydratation system for the entity.
     * Allows to transform an associative array into an entity.
     * The names of the table fields must match the names of the entity attributes.
     * Underscores are transformed into camelCase (ex: date_creation becomes setDateCreation).
     * @return void
     */
    protected function hydrate(array $data) : void 
    {
        foreach ($data as $key => $value) {
            $method = 'set' . str_replace('_', '', ucwords($key, '_'));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /** 
     * Setter for id.
     * @param int $id
     * @return void
     */
    public function setId(int $id) : void 
    {
        $this->id = $id;
    }

    
    /**
     * Getter for id.
     * @return int
     */
    public function getId() : int 
    {
        return $this->id;
    }

    /**
     * Set attributes with the text data from a submitted form.
     * The method will not set the id attribute and image URL.
     * @param string $id
     * @return void
     */
    public function setAttributesFromForm($id = 'id') : void
    {
        foreach ($_POST as $key => $value) {
            if (empty($value) || trim($value) === '' || $key === $id) {
                continue;
            } 

            $value = htmlspecialchars($value);

            if ($key === 'password') {
                $value = password_hash($value, PASSWORD_DEFAULT);
            }

            if ($value === 'true' || $value === 'false') {
                $value = filter_var($value, FILTER_VALIDATE_BOOLEAN);
            }

            $method = 'set' . ucwords($key);
            $this->$method($value);
        }   
    }

    /**
     * Set the image URL from a submitted form.
     * The method returns an array of errors if the image is not valid.
     * @param string $imgName
     * @param string $filePath
     * @return array
     */
    public function setImageFromForm($imgName, $filePath): array 
    {
        if (!empty($_FILES[$imgName]['name'])) {
            list($picErrors, $picPath) = Utils::uploadImage($imgName, $filePath);

            if (empty($picErrors)) {
                $this->setImageUrl($picPath);
            }
        } 
        
        return $picErrors ?? [];
    }
}