<?php
class subscribe
{
    // database connection and table name
    private $conn;
    private $table_name = "Subscribe";

    // object properties
    public $id;
    public $submail;

    public function __construct($db)
    {
        $this->conn = $db;
    }
//query for receiving email from users that want to subscribe, email will saved in table `Subscribe`
    function create(){
        //query
        $query = "INSERT INTO " . $this->table_name . " (submail)" .
            "VALUES ('{$this->submail}');";

        $stmt = $this->conn->prepare($query);

        // posted values
        $this->submail=htmlspecialchars(strip_tags($this->submail));
        // bind values
        $stmt->bindParam(":submail", $this->submail);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }
}