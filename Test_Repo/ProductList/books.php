<?php
include_once "UI/header.php";
include_once 'Objects/books.php';
include_once 'DB/database.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// pass connection to objects
$books = new Books($db);
if($_POST && $_POST['sku']){

    // set product property values
    $books->sku = $_POST['sku'];
    $books->name = $_POST['name'];
    $books->author = $_POST['author'];
    $books->description = $_POST['description'];
    $books->price = $_POST['price'];
    $books->weight = $_POST['weight'];

    // create the product
    if($books->create()){
        echo "<div class='alert alert-success'>CRUD was created.</div>";
    }

    // if unable to create the product, tell the user
    else{
        echo "<div class='alert alert-danger'>Unable to create product.</div>";
    }
}
?>
<?php require_once 'UI/sidebar.php';?>
        <div class="items">

            <!-- First post is adding new product with form -->
            <div class="item">
                <!-- Create new product Popup window anchor -->
                <a href="#product_view" data-toggle="modal"><img src="UI/images/add.jpg" alt="" class="product"></a>
                <div class="caption">
                    <!-- Create new product Popup window anchor -->
                    <h3><a href="#product_view" data-toggle="modal">Just click to add new Product</a></h3>
                    <p class="descroption"> Simple add your <br> favorite product </p>
                </div>
            </div>

        <!-- New product popup form -->
        <div class="modal fade product_view" id="product_view">
            <div class="modal-dialog">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-10">
                            <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <div class="well">
                    <div class="form-group">
                <img src="UI/images/gifs/library.gif" class="img-responsive">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <h4>Field this form for adding new furniture</h4>
                        <br>
                        <input type="text" name="sku" value="" class="form-control" placeholder="SKU number" required>
                        <br>
                        <br>
                        <input type="text" name="name" value="" class="form-control" placeholder="Write a book name" required>
                        <br>
                        <br>
                        <input type="text" name="author" value="" class="form-control" placeholder="Book author" required>
                        <br>
                        <br>
                        <input type="text" name="description" value="" class="form-control" placeholder="Write a small description about book" required>
                        <br>
                        <br>
                        <input type="text" name="price" value="" class="form-control" placeholder="Book price in Euro" required>
                        <br>
                        <br>
                        <input type="text" name="weight" value="" class="form-control" placeholder="Book weight in KG" required>
                        <br>
                        <button type="submit" class="btn btn-success">Add Book</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


        <?php
        // read the books from the database
        $books = new Books($db);
        $stmt = $books->readAll();
        while ($books = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($books);
            echo "<div data-price='{$price}' class='item'>";
            echo "<a href='book_id.php?id={$id}'><img class='product' src='UI/images/{$img}'></a> ";
            echo "<div class='info'>";
            echo "<h6 align='center'> <a href='book_id.php?id={$id}'></a>{$name}</h6> ";
            echo "<p class='descroption'>ID number: {$id} </p>";
            echo "<p class='descroption'>SKU number: {$sku} </p>";
            echo "<p class='descroption'>Price: {$price} <i class='glyphicon-euro'></i></p>";
            echo "<p class='descroption'>Weight: {$weight}  kg</p>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
</div>
<?php
include_once 'UI/footer.php';
?>