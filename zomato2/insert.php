<?php
    $connect=mysqli_connect("localhost","root","","zomato");
    $name=$_POST['itemName'];
    $query="INSERT INTO `orders` (`menu_name`) VALUES ('$name')";
?>