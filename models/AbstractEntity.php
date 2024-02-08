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
}