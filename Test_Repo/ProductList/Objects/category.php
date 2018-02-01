<?php
/**
 * Functions to get categories from table `category` for header and side bar. */
class Category{

// database connection and table name
    private $conn;
    private $table_name = "category";

// object properties
    public $id;
    public $name;

    public function __construct($db){
        $this->conn = $db;
    }
    //query to execute category name from table
    function readName(){
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->name = $row['name'];
        $this->path = $row['path'];
    }
// used by select category list
    function read(){
//select all data
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
}
?>