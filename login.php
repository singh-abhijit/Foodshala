<?php
session_start();
require_once('dbconfig/config.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>FoodShala</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--  -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <h4>Foodshala</h4>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item ">
                        <a class="nav-link " href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php">Sign in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registration.php">Sign Up</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
                            <img src="./images/avatar2.webp" alt="User" class="user_avatar">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Cart</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Update Details</a>
                            <a class="dropdown-item" href="logout.php">Log Out</a>
                            <!-- <form class="myform" action="homepage.php" method="post">
                                <input name="logout" type="submit" id="logout_btn" value="Log Out" /><br>
                            </form> -->
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="body_and_footer_container" id='login-body'>
        <div class="body_main">
            <div class="card" id="login_card">
                <div class="card-body">
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="inputUsername">Username</label>
                            <input type="text" class="form-control" id="inputUsername" name='username' required>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control" id="inputPassword" name='password' required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                    </form>
                </div>
            </div>

            <?php
            if (isset($_POST['login'])) {
                @$username = $_POST['username'];
                @$password = $_POST['password'];
                $query = "select * from customers where username='$username' and password='$password' ";
                //echo $query;
                $query_run = mysqli_query($con, $query);
                //echo mysql_num_rows($query_run);
                if ($query_run) {
                    if (mysqli_num_rows($query_run) > 0) {
                        $row = mysqli_fetch_array($query_run, MYSQLI_ASSOC);

                        $_SESSION['username'] = $username;
                        $_SESSION['name'] = $row['name'];

                        if ($row) {
                            // echo '<script>console.log("Console form php line 87", $row)</script>';
                            echo "<script>console.log('Debug Objects: " . $_SESSION['password'] . "' );</script>";
                            echo "<script>console.log('Debug Objects: name : " . $row["name"] . " Username : " .  $row["username"] . "Email ID:" . $row["email_id"] . "' );</script>";
                        }

                        header("Location: index.php");
                    } else {
                        echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
                    }
                } else {
                    echo '<script type="text/javascript">alert("Database Error")</script>';
                }
            } else {
            }
            ?>
        </div>
        <div class="site-footer-container">
            <footer class="site-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <h6>For Restaurants</h6>
                            <ul class="footer-links">
                                <li><a href="">Dashboard</a></li>
                                <li><a href="add_food.php">Add Menu</a></li>
                                <li><a href="restaurant_registration.php">Add Restaurant</a></li>
                                <li><a href="#">Inquire</a></li>
                            </ul>
                        </div>

                        <div class="col-xs-6 col-md-4">
                            <h6>For Foodies</h6>
                            <ul class="footer-links">
                                <li><a href="">Become a PR</a></li>
                                <li><a href="">Blogging</a></li>
                                <li><a href="">Community</a></li>
                            </ul>
                        </div>

                        <div class="col-xs-6 col-md-4">
                            <h6>About</h6>
                            <ul class="footer-links">
                                <li><a href="">Developer</a></li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <p class="copyright-text">
                                <!-- Copyright &copy;  -->
                                Developed by Abhijit Singh
                            </p>
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <ul class="social-icons">
                                <li><a class="linkedin" href="https://www.linkedin.com/in/singh-abhijit/"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>