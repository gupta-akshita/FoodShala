<?php
    session_start();
    // header('location:login.php');
    $servername = "localhost";
	$username = "root";
	$password = "";
    $dbname = "food";
    $con = mysqli_connect("localhost", "root", "", "food") or die("Connection was not established");

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if(!empty($name) || !empty($email) || !empty($pass)){
        if (mysqli_connect_error()){
            die('Connect Error (' . mysqli_connect_errno() .') ' .
            mysqli_connect_error());
        }else{
            $reg = "INSERT into restaurant (name, email, pass) 
            values('$name', '$email', '$pass')";

            mysqli_query($con, $reg);
            $rs = mysqli_query($con,"SELECT * FROM restaurant where email = '$email'");
            $restaurant = mysqli_fetch_array($rs);

            $_SESSION['restaurant_name'] = $restaurant['name'];
            $_SESSION['restaurant_id'] = $restaurant['restaurant_id'];

            header("Location: dashboard.php");
        }

    }else{
        echo "username and password not empty";
        die();
}

?>