<?php
    session_start();

    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_pass = $_POST['user_pass'];
    if ($_POST['is_nonveg']){
        $is_nonveg = 1;
    }
    else{
        $is_nonveg = 0;
    }

    if(!empty($user_name) || !empty($user_email) || !empty($user_pass)){
        $con = mysqli_connect("localhost", "root", "", "food") or die("Connection was not established");
        if (mysqli_connect_error()){
            die('Connect Error (' . mysqli_connect_errno() .') ' .
            mysqli_connect_error());
        }else{
            $reg = "INSERT into customer(user_name, user_email, user_pass, is_nonveg) 
            values('$user_name', '$user_email', '$user_pass', '$is_nonveg')";
            mysqli_query($con, $reg);
            $query = "SELECT * FROM customer where user_email = '$user_email'";
            $rs = mysqli_query($con, $query);
            $user = mysqli_fetch_array($rs);

            $_SESSION['user_name'] = $user['user_name'];
            $_SESSION['user_id'] = $user['user_id'];

            header('Location:home.php');
        }

    }else{
        echo "username and password not empty";
        die();
}

?>