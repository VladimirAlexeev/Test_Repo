<?php
// get ID of the product to be read
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

// include database and object files
include_once 'DB/database.php';
include_once 'Objects/books.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare objects
$books = new books($db);

// set ID property of product to be read
$books->id = $id;

// read the details of product to be read
$books->readOne();

include_once 'UI/header.php';

// if the form was submitted
if($_POST){
    // set product property values
    $books->sku = $_POST['sku'];
    $books->name = $_POST['name'];
    $books->author = $_POST['author'];
    $books->description = $_POST['description'];
    $books->price = $_POST['price'];
    $books->weight = $_POST['weight'];

    // update the product
    if($books->update()){
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
        <h3>Field this form to, add changes in <?php echo $books->name; ?>. <br> And click update button to save changes</h3>
    </div>
        <!-- End Page header -->
    <div id="myTabContent" class="tab-content">
    <!-- Edit book form -->

    <div class="well">
    <div class="form-group">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$books->id}");?>" method="post">
        <table class='table table-hover table-responsive table-bordered'>
            <tr>
                <td>SKU</td>
                <td><input type='text' name='sku' value='<?php echo $books->sku; ?>' class='form-control' /></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type='text' name='name' value='<?php echo $books->name; ?>' class='form-control' /></td>
            </tr>
            <tr>
                <td>Author</td>
                <td><input type='text' name='author' value='<?php echo $books->author; ?>' class='form-control' /></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input type='text' name='description' value='<?php echo $books->description; ?>' class='form-control' /></td>
            </tr>
            <tr>
                <td>Weight</td>
                <td><input type='text' name='weight' value='<?php echo $books->weight; ?>' class='form-control' /></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type='text' name='price' value='<?php echo $books->price; ?>' class='form-control' /></td>
            </tr>
            <tr>
                <td><!-- Empty left space --></td>
                <td>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href='book_id.php?id=<?php echo $books->id; ?>' class='btn btn-info left-margin'>
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