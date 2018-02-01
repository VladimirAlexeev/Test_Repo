<?php
include_once "UI/header.php";
include_once 'Objects/furniture.php';
include_once 'DB/database.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// pass connection to objects
$furniture = new furniture($db);
if($_POST && $_POST['sku']){

    // set product property values
    $furniture->sku = $_POST['sku'];
    $furniture->name = $_POST['name'];
    $furniture->description = $_POST['description'];
    $furniture->price = $_POST['price'];
    $furniture->height = $_POST['height'];
    $furniture->width = $_POST['width'];
    $furniture->length = $_POST['length'];

    // create the product
    if($furniture->create()){
        echo "<div class='alert alert-success'>Product was created.</div>";
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
                                        <img src="UI/images/gifs/popupfurni.gif" class="img-responsive">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                            <h4>Field this form for adding new furniture</h4>
                                            <br>
                                            <input type="text" name="sku" value="" class="form-control" placeholder="SCU number" required>
                                            <br>
                                            <br>
                                            <input type="text" name="name" value="" class="form-control" placeholder="Write a furniture name" required>
                                            <br>
                                            <br>
                                            <input type="text" name="description" value="" class="form-control" placeholder="Write a small description about furniture" required>
                                            <br>
                                            <br>
                                            <input type="text" name="price" value="" class="form-control" placeholder="Furniture price in Euro" required>
                                            <br>
                                            <br>
                                            <input type="text" name="height" value="" class="form-control" placeholder="Furniture height in cm" required>
                                            <br>
                                            <br>
                                            <input type="text" name="width" value="" class="form-control" placeholder="Furniture width in cm" required>
                                            <br>
                                            <br>
                                            <input type="text" name="length" value="" class="form-control" placeholder="Furniture length in cm" required>
                                            <br>
                                            <button type="submit" class="btn btn-success">Add furniture</button>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        // read all furniture from table
        $furniture = new furniture($db);
        $stmt = $furniture->readAll();
        while ($furniture = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($furniture);
            echo "<div data-price='{$price}' class='item'>";
            echo "<a href='furniture_id.php?id={$id}'><img class='product' src='UI/images/{$img}'></a> ";
            echo "<div class='info'>";
            echo "<h6 align='center'> <a href='furniture_id.phpp?id={$id}'></a>{$name}</h6> ";
            echo "<p class='descroption'>ID number: {$id} </p>";
            echo "<p class='descroption'>SKU number: {$sku} </p>";
            echo "<p class='descroption'>Price: {$price} <i class='glyphicon-euro'></i></p>";
            echo "<p class='descroption'> {$height} cm / {$width} cm / {$length} cm</p>";
            echo "</div>";
            echo "</div>";
        } ?>
    </div>
</div>
<?php
include_once 'UI/footer.php';
?>
