<?php
    $con = mysqli_connect("localhost", "root", "") or die('I cannot connect to the database because: ');
    mysqli_select_db($con, 'foodshaladb');
?>