<?php
include_once "UI/header.php";
include_once 'Objects/dvd.php';
include_once 'DB/database.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
$dvd = new dvd($db);
if($_POST && $_POST['sku']){

    // set product property values
    $dvd->sku = $_POST['sku'];
    $dvd->name = $_POST['name'];
    $dvd->description = $_POST['description'];
    $dvd->price = $_POST['price'];
    $dvd->capacity = $_POST['capacity'];

    // create the product
    if($dvd->create()){
        echo "<div class='alert alert-success'>Product was created.</div>";
    }

    // if unable to create the product, tell the user
    else{
        echo "<div class='alert alert-danger'>Unable to create product.</div>";
    }
}
?>
    <!--
This is the main page of Product list web-project with all information from tables (Books, dvd-discs, furniture)
-->
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
                                <img src="UI/images/gifs/roll.gif" class="img-responsive">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                    <h4>Field this form for adding new DVD disc</h4>
                                    <br>
                                    <input type="text" name="name" value="" class="form-control" placeholder="Write a DVD disc name" required>
                                    <br>
                                    <br>
                                    <input type="text" name="sku" value="" class="form-control" placeholder="SKU number" required>
                                    <br>
                                    <br>
                                    <input type="text" name="description" value="" class="form-control" placeholder="Write a small description about DVD disc" required>
                                    <br>
                                    <br>
                                    <input type="text" name="price" value="" class="form-control" placeholder="DVD disc price in Euro" required>
                                    <br>
                                    <br>
                                    <input type="text" name="capacity" value="" class="form-control" placeholder="DVD disc capacity in gb" required>
                                    <br>
                                    <button type="submit" class="btn btn-success">Add DVD</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php
         //read all dvd from table
        $dvd = new dvd($db);
        $stmt = $dvd->readAll();
        while ($dvd = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($dvd);
            echo "<div data-price='{$price}' class='item'>";
            echo "<a href='dvd_id.php?id={$id}'><img class='product' src='UI/images/{$img}'></a> ";
            echo "<div class='info'>";
            echo "<h6 align='center'> <a href='dvd_id.php?id={$id}'></a>{$name}</h6> ";
            echo "<p class='descroption'>ID number: {$id} </p>";
            echo "<p class='descroption'>SKU number: {$sku} </p>";
            echo "<p class='descroption'>Price: {$price} <i class='glyphicon-euro'></i></p>";
            echo "<p class='descroption'>Capacity: {$capacity}  MB</p>";
            echo "</div>";
            echo "</div>";
        }

        ?>
    </div>
</div>
<?php
include_once 'UI/footer.php';
?>