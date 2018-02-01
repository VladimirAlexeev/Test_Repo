<?php
require_once 'CRUD.php';
class furniture extends CRUD
{
    public $height;
    public $width;
    public $length;

    public function __construct($db)
    {
        parent::__construct($db);
        $this->table_name = "furniture";

        }

    function readOne(){

        $query = "SELECT sku, name, img, description, price, height, width, length
                FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
//data that will be executed in `furniture_id`
        $this->sku = $row['sku'];
        $this->name = $row['name'];
        $this->img = $row['img'];
        $this->description = $row['description'];
        $this->price = $row['price'];
        $this->height = $row['height'];
        $this->width = $row['width'];
        $this->length = $row['length'];
    }

// query to create new furniture
    function create(){
        //query for creating new furniture in table
        $query = "INSERT INTO `furniture` (sku, name, description, price, height, width, length)" .
            "VALUES ('{$this->sku}','{$this->name}','{$this->description}','{$this->price}','{$this->height}','{$this->width}','{$this->length}');";
        $stmt = $this->conn->prepare($query);
        // posted values
        $this->sku=htmlspecialchars(strip_tags($this->sku));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->height=htmlspecialchars(strip_tags($this->height));
        $this->width=htmlspecialchars(strip_tags($this->width));
        $this->length=htmlspecialchars(strip_tags($this->length));

        // bind values
        $stmt->bindParam(":sku", $this->sku);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":height", $this->height);
        $stmt->bindParam(":width", $this->width);
        $stmt->bindParam(":length", $this->length);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
// query for updating furniture and change furniture data in simple form
    function update(){
        $query = "UPDATE
                " . $this->table_name . "
            SET
                sku = :sku,
                name = :name,
                description = :description,
                price = :price,
                height = :height,
                width = :width,
                length = :length
            WHERE
                id = :id";

        $stmt = $this->conn->prepare($query);

        // posted values that user can change
        $this->sku=htmlspecialchars(strip_tags($this->sku));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->height=htmlspecialchars(strip_tags($this->height));
        $this->width=htmlspecialchars(strip_tags($this->width));
        $this->length=htmlspecialchars(strip_tags($this->length));
        $this->id=htmlspecialchars(strip_tags($this->id));

        // bind parameters
        $stmt->bindParam(':sku', $this->sku);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':height', $this->height);
        $stmt->bindParam(':width', $this->width);
        $stmt->bindParam(':length', $this->length);
        $stmt->bindParam(':id', $this->id);

        // execute the query
        if($stmt->execute()){
            return true;
        }
        return false;
    }

}