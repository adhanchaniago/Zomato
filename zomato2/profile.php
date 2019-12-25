<?php
    session_start();
    if (empty($_SESSION)){
        header('Location:login.php');
    }
    else{
        $id=$_GET['id'];

        include "includes/dbhelper.php";

        $query1="SELECT * FROM `users` WHERE `user_id` LIKE '$id'";

        $result=mysqli_query($connection,$query1);

        $result=mysqli_fetch_assoc($result);
        $name =$result['name'];
    }

?>
<html>
<head>
    <title>Profile Home</title>
    <!--Project CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Bootstrap CDNs -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body style="background-color: lightgrey">
    <?php include "includes/header.php";?>

    <div class="container">
        <div class="row " style="margin-top: 50px">

            <div class="col-12">
                <h2 class="display-4"><?php echo $name?>'s Profile</h2>
            </div>

            <div class="col-7">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $query2="SELECT * FROM `orders` WHERE `name` LIKE '$name'";
                                $result2=mysqli_query($connection, $query2);
                                $counter=1;
                                while ($row=mysqli_fetch_array($result2)){
                                    echo '<div class="card-title"><div class="col-12 text-center text-danger " style="font-size: larger"><b>Order '.$counter++.'</b></div></div>';
                                                       echo '<div class="row">
                                                            <div class="col-12">
                                                            <p class="text-grey"><b>Restaurant Name: '.$row['r_name'].'</b></p>
                                                            <p class="text-grey"><b>Item: '.$row['m_name'].'</b></p>
                                                            <p class="text-grey"><b>Price: Rs '.$row['m_price'].'</b></p>

                                                            </div>
                                                        </div>
       
                                                   ';
                                }
                                ?>
                           </div>
                       </div>
                    </div>



                </div>
            </div>

            <div class="col-5">
                <div class="row">
                    <div class="col-12 ">
                        <div class="card ">
                            <div class="card-body">

                                    <?php
                                        $query2="SELECT * FROM `address` WHERE `user_id` LIKE '$id'";
                                        $result2=mysqli_query($connection, $query2);
                                        $counter=1;
                                        while ($row=mysqli_fetch_array($result2)){
                                            echo '<div class="card-title"><div class="col-12 text-center text-danger " style="font-size: larger"><b>Address '.$counter++.'</b></div></div>
                                                    
                                                        <div class="row ">
                                                            <div class="col-12">
                                                            <p class="text-grey"><b>Street Name: '.$row['s_name'].'</b></p>
                                                            <p class="text-grey"><b>Locality: '.$row['locality'].'</b></p>
                                                            <p class="text-grey"><b>City: '.$row['city'].'</b></p>
                                                             <p class="text-grey"><b>Country: '.$row['country'].'</b></p>
                                                            </div>
                                                        </div>
       
                                                   ';
                                        }
                                    ?>
                                <p class="lead text-center"><a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal"> Add Address</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12" style="margin-top: 20px">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $query2="SELECT * FROM `reviews` WHERE `u_id` LIKE '$id'";
                                $result2=mysqli_query($connection, $query2);
                                $counter=1;
                                while ($row=mysqli_fetch_array($result2)){
                                    echo '<div class="card-title"><div class="col-12 text-center text-danger " style="font-size: larger"><b>Review '.$counter++.'</b></div></div>
                                                    
                                                        <div class="row">
                                                            <div class="col-12">
                                                            <p class="text-grey"><b>Restaurant Name: '.$row['r_name'].'</b></p>
                                                            <p class="text-grey"><b>Street Name: '.$row['s_name'].'</b></p>
                                                            <p class="text-grey"><b>Locality: '.$row['locality'].'</b></p>
                                                            <p class="text-grey"><b>City: '.$row['city'].'</b></p>
                                                             <p class="text-grey"><b>Country: '.$row['country'].'</b></p>
                                                             <p class="text-grey card card-body"><b>Review: '.$row['review'].'</b></p>
                                                            </div>
                                                        </div>
       
                                                   ';
                                }
                                ?>
                                <p class="lead text-center"><a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal1">Write A Review</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Register Here</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">

                    <div id="regError"></div>

                    <form class="form" action="add_validation.php?id=<?php echo $_GET['id']?>" method="post">
                        <label>Street Name</label><br>
                        <input id="name" type="text" class="form-control" name="street_name"><br>

                        <label>Locality</label><br>
                        <input id="email" type="text" class="form-control" name="locality"><br>

                        <label>City</label><br>
                        <input id="password" type="text" class="form-control" name="city"><br><br>

                        <label>Country</label><br>
                        <input id="cpassword" type="text" class="form-control" name="country"><br>

                        <input type="submit" value="Register" class="btn btn-danger btn-block">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Register Here</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">

                    <div id="regError"></div>

                    <form class="form" action="rev_validation.php?id=<?php echo $_GET['id']?>" method="post">
                        <label>Restaurant Name</label><br>
                        <input id="rname" type="list" class="form-control" name="r_name"><br>
                        <label>Street Name</label><br>
                        <input id="name" type="text" class="form-control" name="street_name"><br>

                        <label>Locality</label><br>
                        <input id="email" type="text" class="form-control" name="locality"><br>

                        <label>City</label><br>
                        <input id="password" type="text" class="form-control" name="city"><br><br>

                        <label>Country</label><br>
                        <input id="cpassword" type="text" class="form-control" name="country"><br>

                        <label>Write you review here</label><br>
                        <input id="rev" type="text" class="form-control" name="rev"><br>

                        <input type="submit" value="Submit" class="btn btn-danger btn-block">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>