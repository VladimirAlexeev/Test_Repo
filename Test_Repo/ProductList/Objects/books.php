<?php

    require_once 'CRUD.php';

    class books extends CRUD  {

        public $author;
        public $weight;


        public function __construct($db)
        {
            parent::__construct($db);
            $this->table_name = "Books";

        }

        function readOne(){
            $query = "SELECT sku, name, img, author, price, weight, description FROM " . $this->table_name . "
            WHERE id = ? LIMIT 0,1";

            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $this->id);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            //data that will be executed in `book_id`
            $this->sku = $row['sku'];
            $this->name = $row['name'];
            $this->img = $row['img'];
            $this->author = $row['author'];
            $this->description = $row['description'];
            $this->weight = $row['weight'];
            $this->price = $row['price'];
        }

        function create(){
            //query for creating new book in table
            $query = "INSERT INTO " . $this->table_name . " (sku, name, author, description, price, weight)" .
                "VALUES ('{$this->sku}','{$this->name}','{$this->author}','{$this->description}','{$this->price}','{$this->weight}');";

            $stmt = $this->conn->prepare($query);

            // posted values
            $this->sku=htmlspecialchars(strip_tags($this->sku));
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->author=htmlspecialchars(strip_tags($this->author));
            $this->description=htmlspecialchars(strip_tags($this->description));
            $this->price=htmlspecialchars(strip_tags($this->price));
            $this->weight=htmlspecialchars(strip_tags($this->weight));

            // bind values
            $stmt->bindParam(":sku", $this->sku);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":author", $this->author);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":price", $this->price);
            $stmt->bindParam(":weight", $this->weight);

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
    }
