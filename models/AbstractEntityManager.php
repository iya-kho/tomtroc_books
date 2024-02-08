<?php

/**
 * Abstract class that represents a manager. It automatically retrieves the DBManager instance.
 */
abstract class AbstractEntityManager {
    
    protected $db;

    /**
     * Class constructor.
     * It automatically retrieves the DBManager instance.
     */
    public function __construct() 
    {
        $this->db = DBManager::getInstance();
    }
}