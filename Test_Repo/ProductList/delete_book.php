<?php
// check if value was posted
if($_POST){
    // include database and object file
    include_once 'DB/database.php';
    include_once 'Objects/books.php';

    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare product object
    $books = new books($db);

    // set product id to be deleted
    $books->id = $_POST['object_id'];

    // delete the product
    if($books->delete()){
        echo "Object was deleted.";
    }

    // if unable to delete the product
    else{
        echo "Unable to delete object.";
    }
}
?>