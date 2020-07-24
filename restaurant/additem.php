<?php
    session_start();

    include_once 'connection.php';
    
    $name = $_POST['item_name'];
    $price = $_POST['item_price'];
    $img = $_POST['image'];
    if ($_POST['is_nonveg']){
        $is_nonveg = 1;
    }
    else{
        $is_nonveg = 0;
    }
    $restaurant_id = $_SESSION['restaurant_id'];

    if(!empty($name) || !empty($price) || !empty($img)){
        $con = mysqli_connect("localhost", "root", "", "food") or die("Connection was not established");
        if (mysqli_connect_error()){
            die('Connect Error (' . mysqli_connect_errno() .') ' .
            mysqli_connect_error());
        }else{
            $reg = "INSERT into items (item_name, item_price, is_nonveg, restaurant_id,image) 
            values('$name', '$price',$is_nonveg, '$restaurant_id', '$img')";

            mysqli_query($con, $reg);
        }

        header('Location: dashboard.php');


    }else{
        echo "username and password not empty";
        die();
}

?>