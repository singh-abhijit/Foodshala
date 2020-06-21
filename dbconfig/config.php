<!-- Local -->
<!-- <?php
$con = mysqli_connect("localhost", "root", "") or die('Can\'t establish a database connection');
mysqli_select_db($con, 'foodshaladb');
?> -->
<!--  -->
<!-- Heroku -->
<?php
$con = mysqli_connect("d9c88q3e09w6fdb2.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "l3lsv4q4cfs3liqr", "q991t4jsxiw0zzqf") or die('Can\'t establish a database connection');
mysqli_select_db($con, 'yj3q0vxvbwkmsws2');
?>