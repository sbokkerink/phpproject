<?php
include_once "connection.php";

$sql = "SELECT * FROM menu";
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll();

//cart maken en kijken of die leeg is//
if (!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}


//add button//
if (isset($_POST['addbtn']) && $_POST['addbtn'] == 'add to cart') {
    $_SESSION['cart'][$_POST['name']] += 1;
}

 
// echo '<pre>'.print_r($_GET,true).'</pre>'; 
// echo '<pre>'.print_r($_POST,true).'</pre>';  
// echo '<pre>'.print_r($_SESSION,true).'</pre>';
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>burgerqueen</title>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Stylesheets -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/flaticon.css" />

        <!-- Animate -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- Bootsnav -->
        <link rel="stylesheet" href="css/bootsnav.css">
        <!-- Color style -->
        <link rel="stylesheet" href="css/color.css">

        <!-- Custom stylesheet -->
        <link rel="stylesheet" href="css/custom.css" />
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body data-spy="scroll" data-target="#navbar-menu" data-offset="100">

        <!-- Preloader --> 
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_four"></div>
                    <div class="object" id="object_five"></div>
                    <div class="object" id="object_six"></div>
                    <div class="object" id="object_seven"></div>
                    <div class="object" id="object_eight"></div>
                    <div class="object" id="object_big"></div>
                </div>
            </div>
        </div>
        <!--End Preloader -->
        <!-- Navbar -->
        <nav class="navbar navbar-default bootsnav no-background navbar-fixed black">
            <div class="container">  

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>
                    </ul>
                </div>        
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->
            </div>   

            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <div class="widget">
                    <h6 class="title">Menu</h6>
                    <ul class="link">
                    <li><a href="index.php">home page</a></li>
                        <h4><li><a href="menukaart.php">menukaart</a></li></h4>
                        <li><a href="contact.php">contact</a></li>
                        <li><a href="cart.php">shoppingcart</a></li>
                    </ul>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavaltmarkup">
                <div class="mr-auto"></div>
                <div class="navbar-nav">
                    <a href="cart.php" class="nav-item nav-link activate">
                        <h3 class="px-7 cart">
                            <i class="fa fa-shopping-cart" style="padding-right: 1700px;"></i>cart
                            <?php 
                                if(isset($_SESSION['cart'])) {
                                    $count = count($_SESSION['cart']);
                                    echo "<span id=\"cart_count\" class=\"texyt-warning bg-light\">$count</span>";
                                    }else{
                                    echo "<span id=\"cart_count\" class=\"texyt-warning bg-light\">0</span>";
                                    }
                                ?>          
                        </h3>
                    </a>
                </div>
            </div>
            <!-- End Side Menu -->
        </nav>

        <!-- Header -->
        <header id="hello">
            <!-- Container -->
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="banner">
                            <h3>-introducing-</h3>
                            <h1>MENU</h1>

                            <div class="inner_banner">
                                <div class="banner_content">
                                    <p>A double layer of sear-sizzled 100% pure beef mingled with special sauce on a sesame seed bun and topped with melty American cheese, crisp lettuce, minced onions and tangy pickles.</p>
                                    <p>*Based on pre-cooked patty weight.</p>							
                                </div>
                                <div class="stamp">
                                    <img src="images/stamp.png" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Container end -->
            <p class="caption">*Limited Time Only</p>
        </header><!-- Header end -->

        <!-- menu -->
        <section id="block">
            <div class="container text-center" style="-webkit-text-stoke: thin; color: darkred; text-transform: uppercase;">
                <div class="row row-cols-1 row-cols-md-3 g-4" style="margin-left: -350px; margin-right: -350px; margin-top: 100px; margin-bottom: 100px;">
                    <div class="col">
                        <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">id</th>
                                <th scope="col">name</th>
                                <th scope="col">price</th>
                                <th scope="col">discription</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($result as $res){ ?>
                                <tr>
                                <td><?= $res['ID'] ?></td>
                                <td><?= $res['name'] ?></td>
                                <td><?= $res['price'] ?></td>
                                <td><?= $res['discription'] ?></td>
                                <td><form method="post">
                                    <input type="submit" name="addbtn" value="add to cart" />
                                    <input type="hidden" name="name" value="<?= $res['name'] ?>" />
                                    <input type="hidden" name="price" value="<?= $res['price'] ?>" />
                                </form></td>
                                </tr>
                                <?php
                            }
                            ?>  </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"><?php
                                $hourdiff = +2; // Replace the 0 with your timezone difference (;
                                $site = date("l, d F Y H:i:s a",time() + ($hourdiff * 3600));
                                echo $site;
                                ?>
                            </small>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- Block Content end-->

        <!-- Lock -->
        <section id="lock">
            <h2>SERVING MORE THAN JUST BURGERS SINCE 1998</h2>
            <p>Check out our opening hours and location address below.</p>
        </section>

        <!-- Map -->
        <div id="ourmaps"></div>

        <!-- Footer -->
        <footer>
            <!-- Container -->
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-sm-4 col-xs-12 col-lg-offset-1 pull-right">
                        <div class="subscribe">
                            <h4>Subscribe now</h4>
                            <p>Subscribe to the newsletter and
                                get some crispy stuff every week.</p>

                            <form role="form">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="em" placeholder="Enter your e-mail here">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn send_btn">
                                                <i class="glyphicon glyphicon-send"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-4 col-xs-12 col-lg-offset-1 pull-right">
                        <div class="contact_us">
                            <h4>Contact Us</h4>
                            <a href="">info@junkyburget.com</a>

                            <address>
                                Jalan Awan Hijau, Taman OUG<br />
                                58200 Kuala Lumpur <br />
                                Malaysia <br />
                            </address>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-4 col-xs-12 pull-right">
                        <div class="basic_info">
                            <a href=""><img class="footer_logo" src="images/footer_logo.png" alt="Burger" /></a>

                            <ul class="list-inline social">
                                <li><a href="" class="fa fa-facebook"></a></li>
                                <li><a href="" class="fa fa-twitter"></a></li>
                                <li><a href="" class="fa fa-instagram"></a></li>
                            </ul>

                            <div class="footer-copyright">
                                <p class="wow fadeInRight" data-wow-duration="1s">
                                    Made with 
                                    <i class="fa fa-heart"></i>
                                    by 
                                    <a target="_blank" href="http://bootstrapthemes.co">Bootstrap Themes</a> <br /> 
                                    2016. All Rights Reserved
                                </p>
                            </div>					
                        </div>
                    </div>

                </div>
            </div><!-- Container end -->
        </footer><!-- Footer end -->


        <!-- scroll up-->
        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div><!-- End off scroll up->

        <!-- JavaScript -->
        <script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>		
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <!-- Bootsnav js -->
        <script src="js/bootsnav.js"></script>

        <!-- JS Implementing Plugins -->
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="js/gmaps.min.js"></script>

        <script type="text/javascript">
            var map;
            $(document).ready(function () {
                map = new GMaps({
                    el: '#ourmaps',
                    lat: 3.139003,
                    lng: 101.686855,
                    scrollwheel: false
                });

                //locations request
                map.getElevations({
                    locations: [[3.139003, 101.686855]],
                    callback: function (result, status) {
                        if (status == google.maps.ElevationStatus.OK) {
                            for (var i in result) {
                                map.addMarker({
                                    lat: result[i].location.lat(),
                                    lng: result[i].location.lng(),
                                    infoWindow: {
                                        content: '<address class="tooltip_address"><b>Junky Burger</b><br />Jalan Awan Hijau, Taman OUG<br />58200 Kuala Lumpur <br />Malaysia <br /></address>'
                                    }
                                });
                            }
                        }
                    }
                });

            });
        </script>


        <!--main js-->
        <script type="text/javascript" src="js/main.js"></script>
    </body>	
</html>