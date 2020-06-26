<?php
session_start();
require_once('dbconfig/config.php');
?>
<!DOCTYPE html>
<html id='html_index' style="min-height: 100%">

<head>
    <title>FoodShala</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

</head>

<body id='home-body' style="min-height: 100%">
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
                    <li class="nav-item active">
                        <a class="nav-link " href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php">Order Food</a>
                    </li>
                    <li class="nav-item">
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

    <div class="body_and_footer_container" style="min-height: 100%" id='index-body_main_container'>
        <div class="body_main align-middle" id='index-body_main'>


            <div class="index_title">
                <h1 class="">Food Shala</h1>
                <h2 class="">Feeling Hungry ? Order food from Foodshala.</h2>
                <hr class="line">
                <a href="menu.php" class="btn btn-success btn-lg">Order Now</a>
            </div>


        </div>

        <!-- <div class="site-footer-container"> -->
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
                                <li><a href="#" data-toggle="modal" data-target="#exampleModal">Developer</a></li>
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
        <!-- </div> -->

    </div>
    <!--Extras  -->
    <div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Developer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Name : Abhijit Singh <br>
                        Mobile : +91-8233185160 <br>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>