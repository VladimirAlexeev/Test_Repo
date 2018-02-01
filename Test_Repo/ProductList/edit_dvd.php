<?php
// get ID of the product to be read
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

// include database and object files
include_once 'DB/database.php';
include_once 'Objects/dvd.php';
include_once 'Objects/category.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare objects
$dvd = new dvd($db);
$category = new Category($db);

// set ID property of product to be read
$dvd->id = $id;

// read the details of product to be read
$dvd->readOne();
include_once 'UI/header.php';

// if the form was submitted
if($_POST){
    // set product property values
    $dvd->sku = $_POST['sku'];
    $dvd->name = $_POST['name'];
    $dvd->description = $_POST['description'];
    $dvd->price = $_POST['price'];
    $dvd->capacity = $_POST['capacity'];

    // update the product
    if($dvd->update()){
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
    <div class="items">
        <div class="items">
    <div class="container">
        <div class="preview col-md-6">
                <!-- Page header -->
                    <div class="modal-header">
                        <h5>Field this form to, add changes in <?php echo $dvd->name; ?>. <br> And click update button to save changes</h5>
                    </div>
                    <!-- End Page header -->
                <div id="myTabContent" class="tab-content">
                        <!-- Edit dvd form -->
                    <div class="well">
                        <div class="form-group">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$dvd->id}");?>" method="post">
                                <table class='table table-hover table-responsive table-bordered'>
                                    <tr>
                                        <td>SKU</td>
                                        <td><input type='text' name='sku' value='<?php echo $dvd->sku; ?>' class='form-control' /></td>
                                    </tr>

                                    <tr>
                                        <td>Name</td>
                                        <td><input type='text' name='name' value='<?php echo $dvd->name; ?>' class='form-control' /></td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td><input type='text' name='description' value='<?php echo $dvd->description; ?>' class='form-control' /></td>
                                    </tr>

                                    <tr>
                                        <td>Price</td>
                                        <td><input type='text' name='price' value='<?php echo $dvd->price; ?>' class='form-control' /></td>
                                    </tr>

                                    <tr>
                                        <td>Capacity in mb</td>
                                        <td><input type='text' name='capacity' value='<?php echo $dvd->capacity; ?>' class='form-control' /></td>
                                    </tr>

                                    <tr>
                                        <td><!-- Empty left space --></td>
                                            <td>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                <a href='dvd_id.php?id=<?php echo $dvd->id; ?>'  class='btn btn-info left-margin'>
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
    </div>


<?php
include_once 'UI/footer.php';