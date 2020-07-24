<?php
    session_start();
    
    $con = mysqli_connect('localhost', 'root','', 'food');

    $rest_email = $_POST['email'];
    $rest_pass = $_POST['pass'];
    
    $rs = mysqli_query($con, "SELECT * FROM restaurant WHERE email='$rest_email' AND pass='$rest_pass'");

    
	if(mysqli_num_rows($rs)==1)
	{   
        // $restaurant_detail = mysqli_query($con, "SELECT * FROM restaurant WHERE email='$rest_email'");
        $restaurant = mysqli_fetch_array($rs);

        $_SESSION['restaurant_name'] = $restaurant['name'];
        $_SESSION['restaurant_id'] = $restaurant['restaurant_id'];

        // $row = mysqli_fetch_row($user);
        // $restaurant_id = $row[0];
        // echo $restaurant_id ;
        // $_SESSION['restaurant_id'] = $restaurant_id;
        header('location:dashboard.php');    
	}
	else
	{   
        echo "Wrong Credentials";
        sleep(10);
        header('location:login.php');
    }


?>