<?php
session_start();
require_once('dbconfig/config.php');
?>
<?php
// cart items array, session
if (isset($_SESSION['cart_items'])) {
} else {
    $_SESSION['cart_items'] = array();
}
?>
<!DOCTYPE html>
<html id='html_index' style="min-height: 100%">

<?php include('./components/head.php') ?>

<body id='home-body' style="min-height: 100%">
    <?php include('./components/header.php') ?>

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
                                <?php include('./components/menu_item_card.php') ?>
                                <br />
                    <?php
                            }
                        }
                    } else {
                        echo '<script type="text/javascript">alert("DB connection error.")</script>';
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