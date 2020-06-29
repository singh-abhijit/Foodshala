<!DOCTYPE html>
<html id='html_index' style="min-height: 100%">

<?php require_once('./components/head.php') ?>

<body id='home-body' style="min-height: 100%">
    <?php include('./components/header.php') ?>

    <div style="min-height: 100%" id='index-body_main_container' class="img-fluid">
        <div class="index_title">
            <h1 class="" style="color : white">Food Shala</h1>
            <h2 class="" style="color : seashell">Feeling Hungry ?</h2>
            <h2 class="" style="color : seashell">Order food from Foodshala.</h2>
            <a href="menu.php" class=""><button type="button" class="btn btn-light btn_order_now" id="take_to_menu.php">Order Now</button></a>
        </div>
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