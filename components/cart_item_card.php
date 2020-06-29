<tr>
    <td data-th="Product">
        <div class="row">
            <div class="col-sm-2 hidden-xs"><img src="<?php echo $product['imglink'] ? $product['imglink'] : './images/common_food_image.jpg';  ?>" alt="Food Image" class="img-fluid" /></div>
            <div class="col-sm-10">
                <h4 class="nomargin"><?php echo $product['food_name'];  ?></h4>
                <p><?php echo $product['food_quantity'];  ?></p>
            </div>
        </div>
    </td>
    <td data-th="Price"> &#8377; <?php echo $product['food_price'];  ?></td>
    <td data-th="Quantity">
        <input type="number" class="form-control text-center" value="1">
    </td>
    <td data-th="Subtotal" class="text-center"> &#8377; <?php echo $product['food_price'];  ?></td>
    <td class="actions" data-th="">
        <!-- <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
        <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button> -->
        <button type="submit" class="btn btn-warning">Save for Later</button>
        <button type="submit" class="btn btn-danger mx-2" name="remove">Remove</button>
    </td>
</tr>