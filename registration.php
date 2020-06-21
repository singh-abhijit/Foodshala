<?php
session_start();
require_once('dbconfig/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Sign in</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="">Sign Up</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
                            User
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Cart</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Update Details</a>
                            <a class="dropdown-item" href="#">More</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <h1> </h1>
    <br><br/><br />
    <h5 style="margin: auto; text-align: center;"><label >Create your account</label></h5>
    <div class="card" style="width : 25%; margin : auto">
        <div class="card-body">
            <form action="registration.php" method="post">
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" id="inputName" aria-describedby="nameHelp" name='name' required>
                    <!-- <small id="nameHelp" class="form-text text-muted">Name should not contain any special characters.</small> -->
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email address</label>
                    <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name='email_id' required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input type="text" class="form-control" id="inputUsername" name='username' required>
                </div>
                <div class="form-row ">
                    <div class="col-auto my-1">
                        <label class="mr-sm-2" for="inputPreference">Preference</label>
                        <select class="custom-select mr-sm-1 " id="inputPreference" required style="width: 70%;" name='preference'>
                            <option selected value='both'>Both</option>
                            <option value="veg">Veg</option>
                            <option value="nonveg">NonVeg</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name='password' required>
                </div>
                <div class="form-group">
                    <label for="inputConfirmPassword">Confirm password</label>
                    <input type="password" class="form-control" id="inputConfirmPassword" name='confirmation_password' required>
                </div>
                <button type="submit" class="btn btn-primary" name="register">Sign Up</button>
            </form>
        </div>
    </div>

    <footer>
    </footer>
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
                $_SESSION['password'] = $password;
                // header("Location: homepage.php");
            }
            // 
        } else {
            echo '<script type="text/javascript">alert("Password and Confirm Password do not match. \nPease Try again")</script>';
        }
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>