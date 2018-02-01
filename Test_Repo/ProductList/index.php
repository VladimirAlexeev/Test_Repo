<?php
include_once 'UI/header.php';
include_once 'Objects/books.php';
include_once 'Objects/dvd.php';
include_once 'Objects/furniture.php';



?>
<!--
This is the main page of Product list web-project with all information from tables (Books, dvd, furniture)
-->
<?php require_once 'UI/sidebar.php';?>

    <div class="items">
        <?php
        // read the dvd from the database
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

        <?php
        // read the furniture from the database
        $furniture = new furniture($db);
        $stmt = $furniture->readAll();
        while ($furniture = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($furniture);
            echo "<div data-price='{$price}' class='item'>";
            echo "<a href='furniture_id.php?id={$id}'><img class='product' src='UI/images/{$img}'></a> ";
            echo "<div class='info'>";
            echo "<h6 align='center'> <a href='furniture_id.php?id={$id}'></a>{$name}</h6> ";
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

