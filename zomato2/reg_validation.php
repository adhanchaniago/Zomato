<?php

    //connect to database
    $connect=mysqli_connect("localhost","root","","zomato");

    $name=$_POST['user_name'];
    $email=$_POST['user_email'];
    $password=$_POST['user_password'];
    $phone=$_POST['cpassword'];
    $flag=1;
    if(empty($name) || empty($email)|| empty($password)|| empty($phone))
    {
        $flag=0;
    }

    $query1="SELECT * FROM `users` WHERE `email` LIKE '$email'";

    $result=mysqli_query($connect,$query1);
    $result=mysqli_fetch_assoc($result);
    if ($flag==0) {
      header('Location:login.php?msg=5');
    }else{
        if (count($result)==5){
            header('Location:login.php?msg=3');
        }else{
            $query="INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `phone`) VALUES (NULL, '$name', '$email', '$password', '$phone')";

            if(mysqli_query($connect,$query)){
                header('Location:login.php?msg=6');
            }else{
                //echo "Some Error occurred";
                header('Location:login.php?msg=2');
            }
        }
}




?>
