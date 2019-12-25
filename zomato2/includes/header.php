<nav class="navbar navbar-dark bg-nav4">
    <img src="https://b.zmtcdn.com/images/zomato_white_logo_new.svg" style="width: 150px">

    <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <b><?php
                echo $_SESSION['name'];
                ?></b>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="home.php?id=<?php
            echo $_SESSION['id'];
            ?>">Home</a>
            <a class="dropdown-item" href="profile.php?id=<?php
            echo $_SESSION['id'];
            ?>">Profile</a>

            <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
    </div>

</nav>
