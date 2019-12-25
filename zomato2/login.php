<?php
session_start();
if(!empty($_SESSION)){
    header('Location:home.php');
}

if(!empty($_GET)){
    $error=1;
    //echo $error;
}else{
    $error=0;
}

?>

<html>
<head>
    <title>Zomato Home</title>

    <!---Project CSS-->
    <link type="text/css" rel="stylesheet" href="css/style.css">

    <!--Bootstrap CDNs--->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<script type="text/javascript">



    $(document).ready(function(){

        var errorCode='<?php echo $_GET['msg'] ?>';

        if (errorCode==1){
            $('#errorMsg').html('<p style="color: red">Incorrect email/password</p>');
        } else if(errorCode==4) {
            $('#errorMsg').html('<p style="color: red">Some Fields are Empty</p>');
        }
        if (errorCode==5){
            $('#regError').html('<p style="color: red">Some Fields Are Empty !</p>');
            $('#myModal').modal('show');
        }else if(errorCode==3){
            $('#regError').html('<p style="color: red">This email already exits</p>');
            $('#myModal').modal('show');
        } else if(errorCode==2){
            $('#regError').html('<p style="color: red">Some error occured. Try again.!</p>');
            $('#myModal').modal('show');
        }
        else if(errorCode==6){
            $('#errorMsg').html('<p style="color: red">You Are Registered. Login Now!!</p>');

        }


    })
</script>

<body class="bg-nav4">

<nav class="navbar navbar-dark bg-nav4" >
<a class="navbar-brand" href="#"><img src="https://b.zmtcdn.com/images/zomato_white_logo_new.svg" style="width: 150px"></a>

</nav>
<div class="container padding-10 bg-nav4">
    <div class="row ">
        <div class="col-8 mt-100">
            <h1 class="text-light display-4 text-center">Welcome to Zomato</h1>
            <p class="text-light text-center lead">Order From The Best Restaurants Around Town</p>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title lead text-center"><b>Kindly Login To Proceed</b></h4>

                    <form action="login_validator.php" method="post">

                        <div id="errorMsg"></div>

                        <label class="lead"><b>Email</b></label><br>
                        <input type="email" class="form-control" name="user_email"><br>

                        <label class="lead"><b>Password</b></label><br>
                        <input type="password" class="form-control" name="user_password"><br><br>

                        <input type="submit" value="Login" class="btn btn-block btn-danger btn-lg bg-nav4">
                    </form>
                </div>
                <p class="text-center ">Not a member?<a href="#" data-toggle="modal" style="color: red" data-target="#myModal"> Sign up </a></p>
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

                <form class="form" action="reg_validation.php" method="post">
                    <label>Name</label><br>
                    <input id="name" type="text" class="form-control" name="user_name"><br>

                    <label>Email</label><br>
                    <input id="email" type="email" class="form-control" name="user_email"><br>

                    <label>Password</label><br>
                    <input id="password" type="password" class="form-control" name="user_password"><br><br>

                    <label>Confirm Password</label><br>
                    <input id="cpassword" type="password" class="form-control" name="cpassword"><br>

                    <input type="submit" value="Register" class="btn btn-primary btn-block">
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

