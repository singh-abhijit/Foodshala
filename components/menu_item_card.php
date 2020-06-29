<div class="col-lg-3 col-md-3 col-sm-12 col-xl-4 mb-5 ">

    <form action="menu.php" method="post">
        <div class="card h-100 w-100">
            <!-- <div class="card" style="width: 18rem;"> -->
            <img class="card-img-top" src="<?php echo $product['imglink'] ? $product['imglink'] : 'images/common_food_image.jpg';  ?>" alt="food image">
            <div class="card-body">
                <h5 class="card-title text-center"><?php echo $product['food_name'];  ?> </h5>
                <p class="card-text text-center"><?php echo $product['food_details'];  ?></p>
                <p class="card-text br-1 text-center">Quantity : <?php echo $product['food_quantity'];  ?></p>
            </div>
            <h6 class="text-center m-auto"> &#8377; <?php echo $product['food_price'];  ?></h6>

            <div class="btn-group d-flex text-center">
                <!-- <button class="btn flex-fill m-auto" style="background-color: darkgrey;" onclick="myFunction( <?php echo $product['food_price'];  ?>)"> Add to cart </button> -->
                <input class="btn flex-fill m-auto" type="submit" name="<?php echo $product['food_id']; ?>" value="Add to Cart" />
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST[$product['food_id']])) {
        if (in_array($product['food_id'], $_SESSION['cart_items'])) {
            echo "<span>Item already added in cart.</span>";
        } else {
            array_push($_SESSION['cart_items'], $product['food_id']);
        }
    }
    ?>
</div>