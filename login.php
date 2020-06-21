<?php
session_start();
require_once('dbconfig/config.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>FoodShala login</title>
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
                        <a class="nav-link " href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link " href="#">Sign in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registration.php">Sign Up</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
                            User
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Cart</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Update Details</a>
                            <a class="dropdown-item" href="#">Log Out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <br /><br /><br />

    <div class="card" style="width : 25%; margin : auto">
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
                $_SESSION['password'] = $password;
                $_SESSION['name'] = $name;

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

</body>

</html>