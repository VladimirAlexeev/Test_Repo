<?php
require_once 'CRUD.php';
    class dvd extends CRUD {

    public $capacity;

    public function __construct($db)
    {
        parent::__construct($db);
        $this->table_name = "dvd";


    }
    function readOne(){

        $query = "SELECT sku, name, img, price, description, capacity FROM " . $this->table_name . "
            WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
//data that will be executed in `dvd_id`
        $this->sku = $row['sku'];
        $this->name = $row['name'];
        $this->img = $row['img'];
        $this->description = $row['description'];
        $this->price = $row['price'];
        $this->capacity = $row['capacity'];
    }
    // query to create new dvd
    function create(){
        //query for creating new book in table
        $query = "INSERT INTO `dvd` (sku, name, description, price, capacity)" .
            "VALUES ('{$this->sku}','{$this->name}','{$this->description}','{$this->price}','{$this->capacity}');";

        $stmt = $this->conn->prepare($query);

        // posted values
        $this->sku=htmlspecialchars(strip_tags($this->sku));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->capacity=htmlspecialchars(strip_tags($this->capacity));

        // bind values
        $stmt->bindParam(":sku", $this->sku);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":capacity", $this->capacity);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    // query for updating dvd and change dvd data in simple form
    function update(){
        $query = "UPDATE
                " . $this->table_name . "
            SET
                sku = :sku,
                name = :name,
                description = :description,
                price = :price,
                capacity = :capacity
            WHERE
                id = :id";

        $stmt = $this->conn->prepare($query);

        // posted values that user can change
        $this->sku=htmlspecialchars(strip_tags($this->sku));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->capacity=htmlspecialchars(strip_tags($this->capacity));
        $this->id=htmlspecialchars(strip_tags($this->id));

        // bind parameters
        $stmt->bindParam(':sku', $this->sku);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':capacity', $this->capacity);
        $stmt->bindParam(':id', $this->id);

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

}