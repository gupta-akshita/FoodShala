<?php
    session_start();
    
    $con = mysqli_connect('localhost', 'root','', 'food');

    $user_email = $_POST['user_email'];
    $user_pass = $_POST['user_pass'];
    
    $rs = mysqli_query($con, "SELECT * FROM customer WHERE user_email='$user_email' AND user_pass='$user_pass'");

    
	if(mysqli_num_rows($rs)==1)
	{   
        $user = mysqli_fetch_array($rs);

        $_SESSION['user_name'] = $user['user_name'];
        $_SESSION['user_id'] = $user['user_id'];

        header('location:home.php');    
	}
	else
	{   
        header('location:userregister.php');
    }


?>