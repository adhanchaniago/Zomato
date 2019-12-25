<?php
$id=$_GET['id'];
$connection=mysqli_connect("localhost","root","","zomato");
$name=$_POST['r_name'];
$rev=$_POST['rev'];
$street=$_POST['street_name'];
$loca=$_POST['locality'];
$cit=$_POST['city'];
$countr=$_POST['country'];

$query="INSERT INTO `reviews` (`a_id`, `u_id`, `r_name`, `s_name`, `locality`, `city`, `country`, `review`) VALUES (NULL, '$id', '$name', '$street', '$loca', '$cit', '$countr', '$rev')";
if(mysqli_query($connection,$query)){
    //echo " occurred";
    header('Location:profile.php?id='.$id.'');
}else{
    echo "Some Error occurred";
    //header('Location:login.php?msg=2');
}
?>