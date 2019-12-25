<?php
$id=$_GET['id'];
$connection=mysqli_connect("localhost","root","","zomato");
$street=$_POST['street_name'];
$loca=$_POST['locality'];
$cit=$_POST['city'];
$countr=$_POST['country'];
$query="INSERT INTO `address` (`user_id`, `s_name`, `locality`, `city`, `country`) VALUES ('$id', '$street', '$loca', '$cit', '$countr')";
if(mysqli_query($connection,$query)){
    //echo " occurred";
    header('Location:profile.php?id='.$id.'');
}else{
    echo "Some Error occurred";
    //header('Location:login.php?msg=2');
}
?>