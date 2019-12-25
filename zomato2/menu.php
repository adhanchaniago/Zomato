<?php
session_start();
if(empty($_SESSION)){
    header('Location:login.php');
}
else{
    $id=$_GET['id'];
    include "includes/dbhelper.php";

    $query1="SELECT * FROM `restaurant` WHERE `r_id` LIKE '$id'";

    $result=mysqli_query($connection,$query1);

    $result=mysqli_fetch_assoc($result);
}
?>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--Bootstrap CDNs-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<script type="text/javascript">

    $(document).ready(function () {
        var uid="<?php echo $id?>";
        var na="<?php echo $_SESSION['name']?>";
        var a=0;
        var amt=0;

        $('#cart1').append("<button id=\"btn\" class=\" btn btn-success btn-sm rounded\" style=\"font-size: small\"> Proceed For Checkout</button>\n" +
            "<button id=\"btn1\"  class=\" btn btn-success btn-danger btn-sm rounded\"style=\"font-size: small\">Clear Cart</button>");

        $('.mybtn').click(function () {
            //$('#cart').empty();
            this.disabled = true;
            var id=($(this).data('id'));
            var itemName=$('#item'+id).text();
            var itemPrice=$('#price'+id).text();
            a++;
            amt=amt+Number(itemPrice);

            $('#cart').append("<div class='col-12'><div class=row><div class='col-7' id="+a+"><h6>"+itemName+"</h6><p>₹ "+itemPrice+"</p></div></div></div>");

            $('#btn1').click(function(){
                $('#cart').empty();
                location.reload(true);

            });
            $('#btn').click(function(){
                $('#cart1').empty();

                $.ajax({
                    type: "POST",
                    url: "order_validator.php",
                    data: {Nb_var99:id,
                        Nb_var97:uid,
                        Nb_var95:na},
                    success: function(response) {
                        //$('#cart1').html(response);
                    }
                });

                $('#cart1').append("<div><b>"+"Congrats !! Your Order Is On Its Way"+"</b>"+"<p>"+"Please Pay <b>₹ "+amt+"</b> At Delivery"+"</p></div>");
            });
        });
    });
</script>
<body style="background-color: lightgrey">
<?php include "includes/header.php"; ?>

<div class="container mt-20">
    <div class="row">
        <div class="col-12">
            <img src="img/<?php echo $result['r_bg']; ?>" style="width: 100%;height: 500px">

        </div>
        <h1 class="text-dark display-4 "><?php echo $result['r_name']; ?></h1>
        <div class="col-12">
            <div class="row mt-20">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <?php
                                $query2="SELECT * FROM `menu` WHERE `r_id` LIKE '$id'";
                                $result2=mysqli_query($connection, $query2);
                                $counter=0;
                                while ($row=mysqli_fetch_array($result2)){
                                    $counter++;
                                    echo '<div class="col-12">
                                            <div class="row mt-20">
                                            <div  class="col-2 text-center">';
                                    if($row['menu_type']=="Veg" || $row['menu_type']=="Drinks"){
                                        echo '<i class="fa fa-minus-circle fa-2x text-success"></i>';
                                    }else{
                                        echo '<i class="fa fa-minus-circle fa-2x text-danger"></i>';
                                    }

                                    echo '</div>
                                            <div class="col-7">
                                                <h4 ><b id="item'.$row['menu_id'].'">'.$row['menu_name'].'</b></h4>
                                                <b class="text-primary">'."₹ ".'</b><b id ="price'.$row['menu_id'].'" class="text-secondary">'.$row['menu_price'].'</b>
                                            </div>
                                            <div class="col-3">
                                                <button  data-id="'.$row['menu_id'].'" class="mybtn btn btn-success btn-sm rounded">Add Item</button>
                                                <br>';
                                    echo '</div>
                                        </div><hr>
                                    </div>';
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" >
                        <div class="card-body" id="cart1">
                            <div class="card-title" style="text-align: center;margin-top: 10px;font-size: larger"><p><b>Your Cart</b></p>
                            </div>
                            <div class="row" id="cart">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>