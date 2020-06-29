<?php
session_start();
require_once('dbconfig/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php include('./components/head.php') ?>

<body>
    <?php include('./components/header.php') ?>

    <div class="body_and_footer_container">
        <div class="body_main">
            <h5 style="margin: auto; text-align: center; margin-top: 2%;"><label>Register your restaurant</label></h5>
            <div class="card" style="width : 25%; margin : auto; margin-bottom: 2%;  min-width : 240px">
                <div class="card-body">
                    <form action="restaurant_registration.php" method="post">
                        <div class="form-group">
                            <label for="inputName">Restaurant Name</label>
                            <input type="text" class="form-control" id="inputName" aria-describedby="nameHelp" name='restaurant_name' required>
                            <!-- <small id="nameHelp" class="form-text text-muted">Name should not contain any special characters.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="inputDetails">Details</label>
                            <input type="text" class="form-control" id="inputDetails" aria-describedby="detailsHelp" name='restaurant_details' required>
                            <small id="detailsHelp" class="form-text text-muted">Please share some details about your restaurant.</small>
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
                        <button type="submit" class="btn btn-primary" name="register_restaurant">Register</button>
                    </form>
                </div>
            </div>
        </div>
        <!--  -->

    </div>


    <?php
    if (isset($_POST['register_restaurant'])) {
        echo '<script type="text/javascript">alert("Inside 1st loop")</script>';
        @$restaurant_name = $_POST['restaurant_name'];
        @$restaurant_details = $_POST['restaurant_details'];
        @$restaurant_username = $_POST['username'];
        @$restaurant_preference = $_POST['preference'];
        @$restaurant_password = $_POST['password'];
        @$restaurant_confirmation_password = $_POST['confirmation_password'];


        if ($restaurant_password == $restaurant_confirmation_password) {
            // 
            $query = "insert into restaurants values('$restaurant_name','$restaurant_details','$restaurant_preference','$restaurant_username','$restaurant_password')";
            $query_run = mysqli_query($con, $query);
            if ($query_run) {
                echo '<script type="text/javascript">alert("Restaurant Registered.. Welcome")</script>';
                $_SESSION['restaurant_username'] = $username;
                $_SESSION['restaurant_name'] = $restaurant_name;
                // $_SESSION['type'] = 'restaurant';


                header("Location: login.php");
            } else {
                echo '<script type="text/javascript">alert("Query could not be run ")</script>';
            }
            // 
        } else {
            echo '<script type="text/javascript">alert("Password and Confirm Password do not match. \nPease Try again")</script>';
        }
    } else {
    }
    ?>
    <?php
    require_once('./components/footer.php');
    require_once('./components/extras.php');
    ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>