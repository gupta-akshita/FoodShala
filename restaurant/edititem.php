<?php
    session_start();

    $servername = "localhost";
	$username = "root";
	$password = "";
    $dbname = "food";
    $con = mysqli_connect("localhost", "root", "", "food") or die("Connection was not established");

    $name = $_POST['item_name'];
    $price = $_POST['item_price'];
    $img = $_POST['image'];
    $restaurant_id = $_SESSION['restaurant_id'];

    if(!empty($name) || !empty($price) || !empty($img)){
        $con = mysqli_connect("localhost", "root", "", "food") or die("Connection was not established");
        if (mysqli_connect_error()){
            die('Connect Error (' . mysqli_connect_errno() .') ' .
            mysqli_connect_error());
        }else{
            $reg = "UPDATE items set item_name='$name', item_price=$price WHERE restaurant_id = $restaurant_id";
            

            mysqli_query($con, $reg);
        }

        header('Location: dashboard.php');


    }else{
        echo "username and password not empty";
        die();
}

?>