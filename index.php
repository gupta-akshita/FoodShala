<?php 
    session_start();
    include_once 'connection.php';
    $result = mysqli_query($con, "SELECT * FROM items");

?>


<!DOCTYPE html>

<head>
    <title>
        Foodshala's Login Form
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/homeStyle.css" type="text/css">
</head>

<body id="page-top">
    <!-- Header -->

    <div class="container-fluid mColor">
        <div class="container p-2">
            <div class="px-md-4">
                <nav class="navbar navbar-expand-lg navbar-light p-4">
                    <a class="navbar-brand" href="home.php">
                        <img src="image/logo.png" width="120" height="auto" class="img">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-lg-auto px-2">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                        </ul>

                    </div>
                    <?php

		        	if (isset($_SESSION['user_id'])) {
		        		echo '<a href="logout.php" class="hvr-grow">Logout</a>';
		        	} else {
                        echo '
                        <div class="dropdown">
                            <button class="btn bg-transparent dropdown-toggle font-weight-bold" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Login
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="userlogin.php">Customer</a>
                                <a class="dropdown-item" href="./restaurant/login.php">Restaurant</a>
                            </div>
                        </div>';
		        	}

		        ?>

                </nav>
            </div>

        </div>


    </div>


    </div>
    <section class="banner" style="position: relative;">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Welcome to <span style="color: #fccc00; font-size: larger;">Foodshala</span></h1>
                    <p>It has been years since we have been delivering
                        <span style="color: #ec4c4c; font-size: larger;">Healthy</span>
                        food to our customers. We are happy to share,
                        we deliver food to <span style="color: #ec4c4c; font-size: larger;">1K+</span>
                        Happy Customers.</p>
                </div>
            </div>
        </div>
    </section>
    <br />
    <br />
    <br />

    <!--main-->
    <div class="container">
        <div class="my-md-3 custom-text">
            <h2>Food items from your <span style="color: #fccc00;">City</span></h2>
        </div>
    </div>
    <br />
    <div class="container">
        <div class="card-deck">
                    <?php
                    $i = 1;
                    while($row = mysqli_fetch_array($result)){
                        $i_id = $row['item_id'];
                        $img = $row['image'];
                    ?>
            <div class="col-4 card p-4">
                <img src="image/<?php echo $img; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title inline"><?php 
                        $item_id = $row['item_id'];
                        $item_name = mysqli_query($con,"SELECT item_name, item_price FROM items WHERE item_id = $item_id");
                        $items = mysqli_fetch_array($item_name);
                        echo $items['item_name'];
                        $price = $items['item_price'];
                        echo "<span class='float-right text-primary'>₹ $price</span>";
                    echo "</h5>";
                    $restaurant_id = $row['restaurant_id'];
                        $restaurant_name = mysqli_query($con,"SELECT name FROM restaurant WHERE restaurant_id = $restaurant_id");
                        $restaurant = mysqli_fetch_array($restaurant_name);
                        $r_name =  $restaurant['name'];
                    echo "<h6 class='card-text'>
                       From Restaurant: $r_name
                    </h6>";

                echo "</div>";
                echo "<div class='card-footer bg-transparent text-center' id = '$i_id'>";
                if (!isset($_SESSION['user_id'])) {
                    echo"
                <form action='userlogin.php' method='POST'>
                    <input type='hidden' name='hidden_field' value='$i_id'>
                    <button type='submit' class='rColor bg-transparent text-decoration-none'>ORDER NOW</button>
                </form>";
                }else{
                    echo"
                <form action='redirect.php' method='POST'>
                    <input type='hidden' name='hidden_field' value='$i_id'>
                    <button type='submit' class='rColor bg-transparent text-decoration-none' onclick='success_order()'>ORDER NOW</button>
                </form>";
                }
                
                echo "</div>";
                echo "</div>";
                if ($i%3 == 0){
                echo "</div>";
                echo "<br /> <br />";
                echo "<div class='card-deck'>";
                }
                    $i++;
                            }
                    ?>
        
        </div>
        <a type="button" class="btn btn-outline-warning float-right" href="#page-top">
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
        </a>
        <br>
        <br>
        
        </div>
        
    </div>
    <br />
    <br />
    <div class="container custom-line"></div>
    <br />
    


    <!--footer-->
    
        <section id="footer">
            <div class="container">
                <div class="row text-center text-xs-center text-sm-left text-md-left">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <h5 class="text-center">Quick links</h5>
                        <ul class="list-unstyled quick-links text-center ">
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Home</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>About</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <h5 class="text-center">Quick links</h5>
                        <ul class="list-unstyled quick-links text-center ">
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Home</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>About</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                        </ul>
                    </div>
                </div>	
                	
            </div>
        </section>

        <!-- <div class="modal fade" id="order_modal" tabindex="-1" role="dialog" aria-labelledby="order_modal"
        aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                 <div class="modal-header ">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Happy to have you</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="text-center" id="error">
                        <h3 class="text-primary">Thank you for ordering with us.</h3>
                        <p>Your order has been placed successfully ;)</p>

                </div>
                </div>
                
            </div>
        </div>
    </div> -->
<script>
    function success_order(){
        alert("Your order has been placed successfully!!")
    }
</script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
