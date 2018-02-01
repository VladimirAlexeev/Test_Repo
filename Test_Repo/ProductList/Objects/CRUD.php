<?php
require_once 'Objects.php';
require_once 'Interface/ProductInterface.php';
    class CRUD extends Objects implements productInterface {
    protected $conn;

    public function __construct($db){
        $this->conn = $db;

        }

    public function readAll(){
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if($result = $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}