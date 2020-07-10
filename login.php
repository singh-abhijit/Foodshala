<?php
session_start();
require_once('dbconfig/config.php');
?>
<!DOCTYPE html>
<html>

<?php require_once('./components/head.php') ?>

<body>
    <?php require_once('./components/header.php') ?>
    <div class="body_and_footer_container my-auto" id='login-body' style="min-height : 62%">
        <br>
        <br>
        <!-- <div class="body_main"> -->
        <div class="card" style="width : 25%; margin : auto; margin-bottom: 2%; margin-top : 6%; margin-right : 17%; min-width : 240px">
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
            $query_customers = "select * from customers where username='$username' and password='$password' ";
            $query_restaurants = "select * from restaurants where restaurant_username='$username' and restaurant_password='$password' ";

            $query_customers_run = mysqli_query($con, $query_customers);
            $query_restaurants_run = mysqli_query($con, $query_restaurants);

            if ($query_customers_run || $query_restaurants_run) {
                if (mysqli_num_rows($query_customers_run) > 0) {
                    $row = mysqli_fetch_array($query_customers_run, MYSQLI_ASSOC);

                    $_SESSION['username'] = $username;
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['user_type'] = "customer";
                    // echo '<script type="text/javascript">alert("Welcome ' . $_SESSION['name'] . ' ")</script>';
                    header("Location: index.php");

                } elseif (mysqli_num_rows($query_restaurants_run) > 0) {
                    $row = mysqli_fetch_array($query_restaurants_run, MYSQLI_ASSOC);

                    $_SESSION['username'] = $username;
                    $_SESSION['name'] = $row['restaurant_name'];
                    $_SESSION['user_type'] = "restaurant";
                    echo '<script type="text/javascript">alert("Welcome ' . $_SESSION['name'] . ' ")</script>';
                    header("Location: index.php");
                } else {
                    echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials. Please Try again")</script>';
                }
            } else {
                echo '<script type="text/javascript">alert("Database error. Please check the conncetion")</script>';
            }
        } else {
        }
        ?>
        <!-- </div> -->
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