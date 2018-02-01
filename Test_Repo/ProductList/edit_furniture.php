<?php
// get ID of the product to be read
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

// include database and object files
include_once 'DB/database.php';
include_once 'Objects/furniture.php';
include_once 'Objects/category.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare objects
$furniture = new furniture($db);
$category = new Category($db);

// set ID property of product to be read
$furniture->id = $id;

// read the details of product to be read
$furniture->readOne();
include_once 'UI/header.php';

// if the form was submitted
if($_POST){

    // set product property values
    $furniture->sku = $_POST['sku'];
    $furniture->name = $_POST['name'];
    $furniture->description = $_POST['description'];
    $furniture->price = $_POST['price'];
    $furniture->height = $_POST['height'];
    $furniture->length = $_POST['length'];
    $furniture->width = $_POST['width'];

    // update the product
    if($furniture->update()){
        echo "<div class='alert alert-success alert-dismissable'>";
        echo "Product was updated.";
        echo "</div>";
    }

    // if unable to update the product, tell the user
    else{
        echo "<div class='alert alert-danger alert-dismissable'>";
        echo "Unable to update product.";
        echo "</div>";
    }
}

?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Page header -->
                    <div class="modal-header">
                        <h3>Field this form to, add changes in <?php echo $furniture->name; ?>. <br> And click update button to save changes</h3>
                    </div>
                <!-- End Page header -->
                <div id="myTabContent" class="tab-content">
                        <!-- New furniture form -->
                    <div class="well">
                        <div class="form-group">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$furniture->id}");?>" method="post">
                                <table class='table table-hover table-responsive table-bordered'>

                                    <tr>
                                        <td>SKU</td>
                                        <td><input type='text' name='sku' value='<?php echo $furniture->sku; ?>' class='form-control' /></td>
                                    </tr>

                                    <tr>
                                        <td>Name</td>
                                        <td><input type='text' name='name' value='<?php echo $furniture->name; ?>' class='form-control' /></td>
                                    </tr>

                                    <tr>
                                        <td>Description</td>
                                        <td><input type='text' name='description' value='<?php echo $furniture->description; ?>' class='form-control' /></td>
                                    </tr>

                                    <tr>
                                        <td>Price</td>
                                        <td><input type='text' name='price' value='<?php echo $furniture->price; ?>' class='form-control' /></td>
                                    </tr>

                                    <tr>
                                        <td>Height</td>
                                        <td><input type='text' name='height' value='<?php echo $furniture->height; ?>' class='form-control' /></td>
                                    </tr>

                                    <tr>
                                        <td>Length</td>
                                        <td><input type='text' name='length' value='<?php echo $furniture->length; ?>' class='form-control' /></td>
                                    </tr>

                                    <tr>
                                        <td>Width</td>
                                        <td><input type='text' name='width' value='<?php echo $furniture->width; ?>' class='form-control' /></td>
                                    </tr>


                                    <tr>
                                                <td><!-- Empty left space --></td>
                                        <td>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a href='furniture_id.php?id=<?php echo $furniture->id; ?>' class='btn btn-info left-margin'>
                                                        Back </a>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include_once 'UI/footer.php';