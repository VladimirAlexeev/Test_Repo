<?php
// Database connection
// include database and object/category file
include_once 'DB/database.php';
include_once 'Objects/category.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// pass connection to objects
$category = new Category($db);

?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product list</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <!-- Bootstrap Template -->
    <link href="UI/bootstrap3/css/bootstrap.css" rel="stylesheet">
    <link href="UI/bootstrap3/css/footer.css" rel="stylesheet">
    <link href="UI/bootstrap3/css/newstyle.css" rel="stylesheet">
    <!-- End of Bootstrap Template -->
    <!-- JS scripts -->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- end -->
</head>
<body>
<div class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Product List</a>
        </div>
        <div class="collapse navbar-collapse" id="responsive-menu">
            <ul class="nav navbar-nav">
                <!--
                This Product list categories, to add new or change them you need do this in database. ProductList/category
                -->
                <?php
                // read the product categories from the database
                $stmt = $category->read();
                while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row_category);
                    echo "<li> {$path}  {$name} </a></li>";
                }
                ?>
            </ul>
            <!--End-->
        </div>
    </div>
</div>
<div class="wrap">


