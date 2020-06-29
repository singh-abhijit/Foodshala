<div class="col-lg-3 col-md-3 col-sm-12 col-xl-4 mb-5">

    <form action="menu.php" method="post">
        <div class="card">
            <!-- <div class="card" style="width: 18rem;"> -->
            <img class="card-img-top" src="<?php echo $product['imglink'] ? $product['imglink'] : './images/common_food_image.jpg';  ?>" alt="food image">
            <div class="card-body">
                <h5 class="card-title text-center"><?php echo $product['food_name'];  ?> </h5>
                <p class="card-text text-center"><?php echo $product['food_details'];  ?></p>
                <p class="card-text br-1 text-center">Quantity : <?php echo $product['food_quantity'];  ?></p>
            </div>
            <h6 class="text-center"> &#8377; <?php echo $product['food_price'];  ?></h6>

            <div class="btn-group d-flex text-center">
                <!-- <button class="btn flex-fill m-auto" style="background-color: darkgrey;" onclick="myFunction( <?php echo $product['food_price'];  ?>)"> Add to cart </button> -->
                <input class="btn flex-fill m-auto" type="submit" name="<?php echo $product['food_id']; ?>" value="Add to Cart" />
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST[$product['food_id']])) {
        // echo '<script type="text/javascript">alert("Food id is : ' . $product["food_id"] . '" );</script>';
        // echo "<script>console.log('Debug Objects: " . $product. "' );</script>";
        // $food_id_array=array_column($_SESSION['cart_item'], 'food_id');
        
        // print_r($product['food_id']);

        $item_details = array(
            "food_id" => $product["food_id"],
            // "food_name" => $product["food_name"],
            // "food_price" => $product["food_price"],
            // "imglink" => $product["imglink"],
        );
        $temp_array = array();
        array_push($temp_array, $product['food_id']);
        if (in_array($product['food_id'],$_SESSION['cart_items'])) {
            echo "<span>Item already added in cart.</span>";
            echo '<script type="text/javascript">alert("Food id is : " );</script>';
        } else {
            
            array_push($_SESSION['cart_items'], $product['food_id']);
            // print_r($_SESSION['cart_items']);
        }

    }
    ?>
</div>