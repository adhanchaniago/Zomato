<?php
session_start();
if (empty($_SESSION)){
    header('Location:login.php');
}
?>
<html>
<head>
    <title>Zomato Home</title>
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
    <div class="row mt-80">
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <div class="card ">
                        <img src="https://www.advertgallery.com/wp-content/uploads/2018/11/zomato-chenni-food-festival-ad-times-of-india-chennai-18-11-2018.png" style="width: 100%;height: 180px;">
                    </div>
                </div>
                <div class="col-3">
                    <div class="card ">
                        <img src="https://2.bp.blogspot.com/-9xjHBFKQTT0/XBOpS9msTHI/AAAAAAAAAFk/w57l_1XGddoNl9Wh91hRFtfX5uU4hgunwCPcBGAYYCw/s280/htryh.png" style="width: 100%;height: 180px;">

                    </div>
                </div>
                <div class="col-3">
                    <div class="card ">
                        <img src=" https://miro.medium.com/max/1400/0*m-DS-Myf-QQPxmgR.jpg" style="width: 100%;height: 180px;">
                    </div>
                </div>
                <div class="col-3">
                    <div class="card ">
                        <img src=" http://www.foodchahat.com/wp-content/uploads/2019/04/1545547346420.png" style="width: 100%;height: 180px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row mt-80">
                <div class="col-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <?php
                                        $connection=mysqli_connect("localhost","root","","zomato");
                                        $query="SELECT * FROM `restaurant`";

                                        $result=mysqli_query($connection,$query);

                                        while ($row=mysqli_fetch_array($result)){
                                            echo '<div class="col-3">
                                                            <div class="card" style="margin-top: 10px">
                                                                <img src="img/'.$row['r_bg'].'" class="card-img-top "style="height:170px;width: 100%;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title" style="font-size: medium">'.$row['r_name'].'</h5>
                                                                    <p class="card-text text-grey">'.$row['r_cusine'].'</p>
                                                                       <a href="menu.php?id='.$row['r_id'].'" class="btn btn-block bg-nav4 text-light">View Menu</a>
                                                                </div>
                                                            </div>
                                                          </div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card ">

                        <a href="https://www.netflix.com/in/title/80025172" target="_blank"><img src="https://d3nuqriibqh3vw.cloudfront.net/styles/aotw_card_ir/s3/narcos.jpg?qf_II4fDrxVt7lFnO18Z0heAn1UMrTwn&itok=FLJ8Ll6p" style="width: 100%;height: 350px"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>