<?php
session_start();
require_once('dbconfig/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php include('./components/head.php'); ?>

<body>
    <script type="text/javascript">
        function PreviewImage() {
            var fileReader = new FileReader();
            fileReader.readAsDataURL(document.getElementById("imglink").files[0]);

            fileReader.onload = function(fileReaderEvent) {
                document.getElementById("uploadPreview").src = fileReaderEvent.target.result;
            };
        };
    </script>
    <?php include('./components/header.php'); ?>

    <div class="body_and_footer_container">
        <div class="body_main">
            <h5 style="margin: auto; text-align: center; margin-top: 2%"><label>Add Food to Menu</label></h5>
            <div class="card" style="width : 25%; margin : auto; margin-bottom: 2%">
                <div class="card-body">
                    <form action="add_food.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <img id="uploadPreview" src="./images/common_food_image.jpg" class="avatar card-img-top" /><br>
                            <input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();" />
                        </div>
                        <div class="form-group">
                            <label for="inputName">Dish Name</label>
                            <input type="text" class="form-control" id="inputName" aria-describedby="nameHelp" name='food_name' required>
                            <!-- <small id="nameHelp" class="form-text text-muted">Name should not contain any special characters.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="inputDetails">Details</label>
                            <input type="text" class="form-control" id="inputDetails" aria-describedby="detailsHelp" name='food_details' required>
                            <small id="detailsHelp" class="form-text text-muted">Please share some details about your restaurant.</small>
                        </div>
                        <div class="form-row ">
                            <div class="col-auto my-1">
                                <label class="mr-sm-2" for="inputPreference">Preference</label>
                                <select class="custom-select mr-sm-1 " id="inputPreference" required style="width: 70%;" name='food_preference'>
                                    <option selected value='both'>Both</option>
                                    <option value="veg">Veg</option>
                                    <option value="nonveg">NonVeg</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPrice">Price</label>
                            <input type="price" class="form-control" id="inputPrice" name='food_price' required>
                        </div>
                        <div class="form-group">
                            <label for="inputConfirmPassword">Quantity(in gms / piece)</label>
                            <input type="quantity" class="form-control" id="inputQuantity" name='food_quantity' required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add_food_to_menu">Add food to menu</button>
                    </form>
                </div>
            </div>
        </div>
        <!--  -->
        <!-- <div class="site-footer-container"> -->
        <!-- </div> -->
    </div>


    <?php
    if (isset($_POST['add_food_to_menu'])) {
        @$food_name = $_POST['food_name'];
        @$food_details = $_POST['food_details'];
        @$food_preference = $_POST['food_preference'];
        @$food_price = $_POST['food_price'];
        @$food_quantity = $_POST['food_quantity'];

        $img_name = $_FILES['imglink']['name'];
        $img_size = $_FILES['imglink']['size'];
        $img_tmp = $_FILES['imglink']['tmp_name'];

        $directory = 'uploads/';
        $imglink = $directory . $img_name;

        if (file_exists($imglink)) {
            // $img_name = rand(1, 10000);
            // $directory = 'uploads/';
            // $imglink = $directory . $img_name;
        } else if ($img_size > 4194304) {
            echo '<script type="text/javascript"> alert("Image file size larger than 4 MB.. Reduce the file size and try again") </script>';
        } else {
            move_uploaded_file($img_tmp, $imglink);

            $query = "insert into menu () values ('','$food_name','$food_details','$food_preference','rest 2', '$food_price', '$food_quantity', '$imglink')";

            $query_run = mysqli_query($con, $query);

            if ($query_run) {
                echo '<script type="text/javascript"> alert("Item added") </script>';
            } else {
                echo '<script type="text/javascript"> alert("Error! Query Not run") </script>';
            }
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