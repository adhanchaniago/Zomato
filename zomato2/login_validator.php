<?php

    session_start();

    //conect to database
    $connection=mysqli_connect("localhost","root","","zomato");
    $email=$_POST['user_email'];
    $password=$_POST['user_password'];
    $flag=1;
    if(empty($email) || empty($password))
    {
        $flag=0;
    }

    $query="SELECT * FROM `users` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";

    $result=mysqli_query($connection,$query);

    $result=mysqli_fetch_assoc($result);

    //print_r($result);
    if ($flag==0) {
        header('Location:login.php?msg=4');
    }else{
        if (count($result) == 5){
            $_SESSION['id']=$result['user_id'];
            $_SESSION['name']=$result['name'];
            header('Location:home.php?uid='.$result['user_id'].'');
        } else {
            header('Location:login.php?msg=1');
        }
    }
?>
