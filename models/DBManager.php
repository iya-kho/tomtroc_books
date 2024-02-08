<?php

/**
 * Classe that manages the connection to the database.
 * This class is a singleton.
 */
class DBManager 
{
    // Create an instance of the class
    private static $instance;

    private $db;

    /**
     * Constructor that initiliazes the connection to the database.
     * The constructor is private. To get an instance of the class, use the method DBManager::getInstance()
     * @see DBManager::getInstance()
     */
    private function __construct() 
    {
        // Connect to the database
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    /**
     * Method allowing to get an instance of the class.
     * @return DBManager
     */
    public static function getInstance() : DBManager
    {
        if (!self::$instance) {
            self::$instance = new DBManager();
        }
        return self::$instance;
    }

    /**
     * Method allowing to get the PDO object representing the connection to the database.
     * @return PDO
     */
    public function getPDO() : PDO
    {
        return $this->db;
    }

    /**
     * Method allowing to execute a SQL query.
     * If the query contains parameters, a prepared statement will be executed.
     * @param string $sql : SQL query to execute.
     * @param array|null $params : parameters of the SQL query.
     * @return PDOStatement : The result of the SQL query.
     */
    public function query(string $sql, ?array $params = null) : PDOStatement
    {
        if ($params == null) {
            $query = $this->db->query($sql);
        } else {
            $query = $this->db->prepare($sql);
            $query->execute($params);
        }
        return $query;
    }
    
}