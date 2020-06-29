<?php
session_start();
require_once('dbconfig/config.php');
?>
<!DOCTYPE html>
<html id='html_index' style="min-height: 100%">

<?php include('./components/head.php') ?>

<body id='home-body' style="min-height: 100%">
    <?php require_once('./components/header.php') ?>
    <div class="body_and_footer_container" style="min-height: 64%">
        <div class="body_main menu_body">
            <form action="cart.php" method="post">
                cart items here ....
                <button type="submit" class="btn btn-primary" name="order_food">Order Food </button>
            </form>

        </div>
        <?php
        if (isset($_POST['order_food'])) {
            if ($_SESSION['user_type'] == "customer") {
                // alert : food ordered
                echo '<script type="text/javascript">alert("Food ordered")</script>';
                unset($_SESSION['cart_items']);
            } else {
                // to log in as a cutomer or sign up if new to this website 
                // echo '<script type="text/javascript">alert("Please sign in to the website as a customer, or sign up if new to this website")</script>';
                // header("Location: login.php");
                echo "Please sign in to the website as a customer, or sign up if new to this website";
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