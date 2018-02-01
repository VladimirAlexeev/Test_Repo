<?php
class support {
    // database connection and table name
    private $conn;
    private $table_name = "ContactUs";

    // object properties
    public $id;
    public $contact;
    public $theme;
    public $email;

    public function __construct($db)
    {
        $this->conn = $db;
    }
//query for receiving support message from user, that will be sent from footer form
    function support(){
        //query
        $query = "INSERT INTO " . $this->table_name . "(contact, theme, email)" .
            "VALUES ('{$this->contact}','{$this->theme}','{$this->email}');";

        $stmt = $this->conn->prepare($query);

        // posted values that will be sent into `ContactUs`
        $this->contact=htmlspecialchars(strip_tags($this->contact));
        $this->theme=htmlspecialchars(strip_tags($this->theme));
        $this->email=htmlspecialchars(strip_tags($this->email));
        // bind values
        $stmt->bindParam(":contact", $this->contact);
        $stmt->bindParam(":theme", $this->theme);
        $stmt->bindParam(":email", $this->email);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }
}