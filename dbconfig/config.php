<?php
    $con = mysqli_connect("localhost", "root", "") or die('Can\'t establish a database connection');
    mysqli_select_db($con, 'foodshaladb');
?>