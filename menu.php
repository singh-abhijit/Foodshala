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
                    <li class="nav-item ">
                        <a class="nav-link " href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
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

    <div class="body_and_footer_container" style="min-height: 64%">
        <div class="body_main menu_body">
            <br /><br />
            <div class="container">
                <div class="row">
                    <!-- ///////////////////////////////////// -->
                    <?php
                    $query = " SELECT * FROM menu ";
                    $query_run = mysqli_query($con, $query);

                    if ($query_run) {
                        $num = mysqli_num_rows($query_run);

                        if ($num > 0) {
                            while ($product = mysqli_fetch_array($query_run)) {
                    ?>

                                <div class="col-lg-3 col-md-3 col-sm-12 col-xl-4 mb-5">

                                    <form>
                                        <div class="card">
                                            <!-- <div class="card" style="width: 18rem;"> -->
                                            <img class="card-img-top" src="<?php echo $product['imglink'] ? $product['imglink'] : './images/common_food_image.jpg';  ?>" alt="food image">
                                            <div class="card-body">
                                                <h5 class="card-title text-center"><?php echo $product['food_name'];  ?> </h5>
                                                <p class="card-text text-center"><?php echo $product['food_details'];  ?></p>
                                                <p class="card-text br-1 text-center">Qantity : <?php echo $product['food_quantity'];  ?></p>
                                            </div>


                                            <h6 class="text-center"> &#8377; <?php echo $product['food_price'];  ?></h6>

                                            <!-- <h6 class="badge badge-success"> 4.4 <i class="fa fa-star"> </i> </h6>
                                            <input type="text" name="" class="form-control" placeholder="Quantity"> -->

                                            <div class="btn-group d-flex text-center">
                                                <button class="btn flex-fill m-auto" style="background-color: darkgrey;" onclick=""> Add to cart </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <br />

                    <?php
                            }
                        }
                    } else {
                        echo '<script type="text/javascript">alert("Getting nothing from DB")</script>';
                    }
                    ?>
                    <!-- ///////////////////////////////////// -->
                </div>
            </div>

        </div>
        <?php
        if (isset($_POST['register'])) {
            @$name = $_POST['name'];
            @$email_id = $_POST['email_id'];
            @$username = $_POST['username'];
            @$preference = $_POST['preference'];
            @$password = $_POST['password'];
            @$confirmation_password = $_POST['confirmation_password'];


            if ($password == $confirmation_password) {
                // echo "<script type='text/javascript'>alert('Sabaash !')</script>";
                // 
                $query = "insert into customers values('$email_id','$name','$preference','$username','$password')";
                $query_run = mysqli_query($con, $query);
                if ($query_run) {
                    echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
                    $_SESSION['username'] = $username;
                    $_SESSION['name'] = $name;

                    header("Location: login.php");
                }
                // 
            } else {
                echo '<script type="text/javascript">alert("Password and Confirm Password do not match. \nPease Try again")</script>';
            }
        }
        ?>



    </div>
    <?php
    require_once('./components/footer.php');
    require_once('./components/extras.php');
    ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>