<?php
    session_start();
    include_once "connection.php";

    $item_id = $_POST['hidden_field'];
    $user_id = $_SESSION['user_id'];
    $item = mysqli_query($con, "SELECT restaurant_id FROM items WHERE item_id = $item_id ");

    $item_array = mysqli_fetch_array($item);
    $id = $item_array['restaurant_id'];

    $reg = "INSERT into orders(item_id, user_id, restaurant_id) 
            values('$item_id', '$user_id', '$id')";
    mysqli_query($con, $reg);

    sleep(2);
    header('location:home.php');
    
?>

