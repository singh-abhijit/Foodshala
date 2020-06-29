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
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width:50%">Product</th>
                            <th style="width:10%">Price</th>
                            <th style="width:8%">Quantity</th>
                            <th style="width:22%" class="text-center">Subtotal</th>
                            <th style="width:10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = " SELECT * FROM menu ";
                        $query_run = mysqli_query($con, $query);
                        $total = 0;

                        if ($query_run) {
                            $num = mysqli_num_rows($query_run);

                            if ($num > 0) {
                                while ($product = mysqli_fetch_array($query_run)) {
                                    foreach ($_SESSION['cart_items'] as $item) {
                                        if ($product["food_id"] == $item) {
                                            include("./components/cart_item_card.php");
                                            $total = $total + number_format($product["food_price"], 2);
                                        }
                                    }
                                }
                            }
                        } else {
                            echo '<script type="text/javascript">alert("DB connection error.")</script>';
                        }
                        ?>
                    <tfoot>
                        <tr>
                            <td><a href="menu.php" class="btn btn-warning"> < Continue Shopping</a></td>
                            <td colspan="2" class="hidden-xs"></td>
                            <td class="hidden-xs text-center"><strong>Total : &#8377; <?php echo $total ?></strong></td>
                            <td><button type="submit" class="btn btn-success" name="order_food">Checkout >  </button></td>
                        </tr>
                    </tfoot>

                    </tbody>
                </table>
                
            </form>

        </div>
        <?php
        if (isset($_POST['order_food'])) {
            if (isset($_SESSION['user_type'])) {
                // if ($_SESSION['user_type'] == "customer") {
                echo '<script type="text/javascript">alert("Food ordered")</script>';
                unset($_SESSION['cart_items']);
                // } else {
                //     echo '<script type="text/javascript">alert("Please sign in to the website as a customer,")</script>';
                // }
            } else {
                echo '<script type="text/javascript">alert("Please sign in to the website as a customer, or sing up if you are new to this website")</script>';
            }
        } else {
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