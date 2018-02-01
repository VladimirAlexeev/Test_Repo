<!-- Database and functions connection-->
<?php
// include database and object files
include_once 'DB/database.php';
include_once 'Objects/category.php';
include_once 'Objects/subscribe.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// pass connection to objects
$category = new Category($db);
//subscribe form values
$subscribe = new subscribe($db);
if($_POST && @$_POST['submail']) {
    $subscribe->submail = $_POST['submail'];
    // if message sent, tell the user
    if($subscribe->create()){
        echo "<div class='alert alert-success'>You have successfully subscribed to the newsletter. <br>
        The newsletter about new out products will be sent to your e-mail address.</div>";
    }
    // message if unable to send a message, tell the user
    else{
        echo "<div class='alert alert-danger'>Sorry, we are having some temporary server issues.</div>";
    }
}
?>
<!--Sidebar menu properties -->
<div class="menu">
    <!-- First sidebar menu options -->
    <div class="mini-menu">
        <ul>
            <li class="sub">
                <!--
                This Product list categories, to add new or change them you need do this in database.
                ProductList `category`
                -->
                <?php
                // read the product categories from the database
                $stmt = $category->read();
                // put them in a select drop-down
                while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row_category);
                    echo "<li> {$path}  {$name} </a></li>";
                }
                ?>
            </li>
        </ul>
    </div>
    <!-- End of first sidebar menu options -->
    <!-- Form for getting email from users -->
    <div class="mini-menu">
        <div class="header-item"> Get Updates </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
            <br>
            <input type="text" name="submail" class="form-control" placeholder="Email" required>
            <br>
            <button type="submit" class="btn btn-success" value="email">Add email</button>
        </form>
    </div>
    <!-- End of subscribe form -->
</div>