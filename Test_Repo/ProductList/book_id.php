<?php
// get ID of the product to be read
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

// include database and object file
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

// set page headers
include_once "UI/header.php";


require_once 'UI/sidebar.php';
//Left side container with image
echo "<div class=\"items\">";
echo "<div class=\"container-fliud\">";
echo "<div class=\"wrapper row\">";
echo "<div class=\"preview col-md-6\">";
echo "<div class='tab-pane active' id='pic-1'><img src='UI/images/{$books->img}' /> </div>";
// Here you can insert some data(buttons/text/link) that will appears under the image
echo "</div>";

//Right side container with product details
echo "<div class='details col-md-6'>";
//getting the single book details from array
echo "<h3 class='product-title'>{$books->name}</h3>";
echo "<p class='product-description'>{$books->author}</p>";
echo "<p class='product-description'>{$books->description}</p>";
echo "<h6 class='price'>Price: {$books->price}<i class='glyphicon-euro'></i></h6>";
echo "<h6 class='sizes'>Weight: {$books->weight} kg </h6>";
//product details end
//Some action buttons
echo "<div class=\"action\">";
echo "<p><button class=\"like btn btn-default\" type=\"button\"><span class=\"fa fa-heart\"></span></button></p>";
echo "<p><button class=\"add-to-cart btn btn-default\" type=\"button\">add to cart</button></p>";
// edit product button by id from product page
echo "<p><a href='edit_book.php?id={$books->id}'  class='btn btn-info left-margin'>";
echo "<span class='glyphicon glyphicon-edit'></span> Edit";
echo "</a></p>";
// delete product button by id, JS script with popup window is in the bottom of this page
echo "<p><a delete-id='{$books->id}' class='btn btn-danger delete-object'>";
echo "<span class='glyphicon glyphicon-remove'></span> Delete";
echo "</a></p>";

echo "</div>";//action
echo "</div>";// col-md-6
echo "</div>";//wrapper-row
echo "</div>";//container-fluid
echo "</div>";//items
echo "</div>";//wrap

// set footer

include_once "UI/footer.php";
?>
<script>
    // JavaScript for deleting product
    $(document).on('click', '.delete-object', function() {

        var id = $(this).attr('delete-id');
        //popup delete window info
        bootbox.confirm({
            message: "<h4>Are you sure?</h4>",
            buttons: {
                confirm: {
                    label: '<span class="glyphicon glyphicon-ok"></span> Yes',
                    className: 'btn-danger'
                },
                cancel: {
                    label: '<span class="glyphicon glyphicon-remove"></span> No',
                    className: 'btn-primary'
                }
            },
            callback: function(result) {
                // function that will redirect user back books page after deleting
                if (result == true) {
                    $.post('delete_book.php', {
                        object_id: id
                    }, function(data) {
                        location.replace('books.php');
                    }).fail(function() {
                        alert('Unable to delete.');
                    });
                }
            }
        });

        return false;
    });
</script>
