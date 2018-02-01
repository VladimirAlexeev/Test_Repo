<?php
// check if value was posted
if($_POST) {
    // include database and object file
    include_once 'DB/database.php';
    include_once 'Objects/dvd.php';

    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare product object
    $dvd = new dvd($db);

    // set product id to be deleted
    $dvd->id = $_POST['object_id'];

    // delete the product
    if ($dvd->delete()) {
        echo "Object was deleted.";
    } // if unable to delete the product
    else {
        echo "Unable to delete object.";
    }
}