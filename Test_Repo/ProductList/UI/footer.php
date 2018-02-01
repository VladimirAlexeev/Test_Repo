<?php
// include database and object files
include_once 'DB/database.php';
include_once 'Objects/category.php';
include_once 'Objects/support.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// pass connection to objects
$category = new Category($db);
//support form values
$support = new support($db);
if($_POST && @$_POST['contact']){
    $support->contact = $_POST['contact'];
    $support->theme = $_POST['theme'];
    $support->email = $_POST['email'];
    // if message sent, tell the user
    if($support->support()){
        echo "<div class='alert alert-success'>Thank you, for question. We will be in touch soon..</div>";
    }
    // message if unable to send a message, tell the user
    else{
        echo "<div class='alert alert-danger'>Sorry, we are having some temporary server issues.</div>";
    }
}
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- bootbox library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

<!-- Footer with google map and bootstrap scripts connections-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <!--Category menu in footer -->
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> <br> Category </h3>
                    <ul>
                        <li class="sub">
                            <!--
This Product list categories, to add new or change them you need do this in database. ProductList `category`-->
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
                <!--End category menu in footer -->
                <!--Info menu -->
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> HELP <br>& INFORMATION </h3>
                    <ul>
                        <li> <a href="#"> Help </a> </li>
                        <li> <a href="#"> Delivery </a>
                        <li> <a href="#"> About us </a> </li>
                        <li> <a href="#"> Careers </a> </li>
                    </ul>
                </div>
                <!--End of info menu -->
                <!--Support section menu with form  -->
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Comments or Questions </h3>
                    <ul>
                        <li>  If you have any comments or questions, </li>
                        <li>  please do not hesitate,  </li>
                        <li>  complete this form  </li>
                        <li>  to contact us. </li>
                    </ul>
                </div>
                <!--Support form that sends user question to Database in table `ContactUS` -->
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> <br> Contact us:  </h3>
                    <ul>
                        <li>
                            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                <div class="input-append newsletter-box text-center">
                                    <input type="text" class="full text-center" placeholder="Name" name="contact"/>
                                    <input type="text" class="full text-center" placeholder="Theme" name="theme"/>
                                    <input type="text" class="full text-center" placeholder="Email" name="email"/>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </li>
                    </ul>

                    <!--Social network buttons under support form -->
                    <ul class="social">
                        <li> <a href="#"> <i class=" fa fa-facebook">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-google-plus">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-pinterest">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-youtube">   </i> </a> </li>
                    </ul>
                    <!--End of social network buttons -->
                </div>

                <!--End of support menu -->
                <!--Office on google map, using Google Maps Api-->
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Our office  </h3>
                    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCjB_aysstb17C1UlC8vgKgQTKCUP_ODNY'></script>
                    <div style='overflow:hidden;height:300px;width:300px;'><div id='gmap_canvas' style='height:300px;width:300px;'></div>
                        <style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div>
                    <a href='https://add-map.com/'>embedding a google map</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=3e87cd561cb3d114f974bf3373771109d1ac5f4a'></script>
                    <script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(56.9496487,24.105186499999945),mapTypeId: google.maps.MapTypeId.ROADMAP};
                            map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                            marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(56.9496487,24.105186499999945)});
                            infowindow = new google.maps.InfoWindow({content:'<strong>Product List</strong><br>Riga<br>LV - 0000 <br>'});
                            google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);
                        }google.maps.event.addDomListener(window, 'load', init_map);</script>
                </div>
                <!--End Google map -->
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!--/.footer-->

    <!--Bottom payments -->
    <div class="footer-bottom">
        <div class="container">
            <?php $dat = date("d.m.Y"); $tm = date("H:i:s");?>
            <p class="pull-left"> Product List © This is Junior Developer Test Project for Scandiweb 2017. All right reserved. Local time is <?php echo $tm?>. Local date is <?php echo $dat?>  </p>
            <div class="pull-right">
                <ul class="nav nav-pills payments">
                    <li><i class="fa fa-cc-visa"></i></li>
                    <li><i class="fa fa-cc-mastercard"></i></li>
                    <li><i class="fa fa-cc-amex"></i></li>
                    <li><i class="fa fa-cc-paypal"></i></li>
                </ul>
            </div>
        </div>
    </div>
    <!--/.footer-bottom-->
</footer>
</body>
</html>