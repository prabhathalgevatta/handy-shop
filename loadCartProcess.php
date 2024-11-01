<?php

include "connection.php";
session_start();

$user = $_SESSION["u"];
$netTotal = 0;

$rs = Database::search("SELECT * FROM `cart` INNER JOIN `stok` ON `cart`.`stok_stok_id`=`stok`.`stok_id` INNER JOIN `product` ON
`stok`.`product_id`=`product`.`id` INNER JOIN `color` ON `product`.`color_color_id`=`color`.`color_id` INNER JOIN
`size` ON `product`.`size_size_id`=`size`.`size_id` WHERE `cart`.`user_id`='" . $user["id"] . "'");

$num = $rs->num_rows;

if ($num > 0) {
    //Load Cart

?>

    <div class="mb-4 mt-5">
        <h3 class=" fw-bold" style="font-size: 40px;">CART</h3>
    </div>

    <?php

    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();
        $total = $d["price"] * $d["cart_qty"];
        $netTotal += $total;

    ?>
        <!-- Card Items -->
        <div class="col-12 mt-4">
            <hr>
        </div>
        <div class="col-12 p-3 mb-2 d-flex justify-content-between">

            <div class="d-flex align-items-center col-5">
                <img src="<?php echo $d["path"]; ?>" class="r" width="100px">
                <div class="ms-5">
                    <h4 class=" fw-bold"><?php echo $d["name"]; ?></h4>
                    <p class="text-muted mb-0 mt-3">Color: <?php echo $d["color_name"]; ?></p>
                    <p class="text-muted">Size: <?php echo $d["size_name"]; ?></p>
                    <h5 class=" fw-bold">Rs. <?php echo $d["price"]; ?></h5>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-light btn-sm" onclick="decrementQty(<?php echo $d['cart_id']; ?>);">-</button>
                <input type="number" id="qty<?php echo $d['cart_id']; ?>" class="form-control form-control-sm text-center" style="max-width: 100px;" disabled value="<?php echo $d["cart_qty"]; ?>">
                <button class="btn btn-light btn-sm" onclick="incrementQty(<?php echo $d['cart_id']; ?>);">+</button>
            </div>
            <div class="d-flex align-items-center">
                <h4 class=" fw-bold"> Total : <h4 class=" fw-bold">Rs. <?php echo $total; ?></h4>
                </h4>
            </div>
            <div class="d-flex align-items-center">
                <button class="btn btn-dark" onclick="removeCart(<?php echo $d['cart_id']; ?>);">Remove</button>
            </div>
        </div>
        <!-- Card Items -->
    <?php
    }

    ?>

    <div class="col-12 mt-4">
        <hr>
    </div>

    <!-- Checkouts -->
    <div class="d-flex flex-column align-items-start">
        <h6>Number of Items: <h4 class=" fw-bold"><?php echo $num; ?></h4></h6><div class="col-12 mt-4"><div class="col-12 mt-4"><hr></div>
        <h5>Delivary Fee: <h4 class="text-muted fw-bold">Rs.500</h4></h5><div class="col-12 mt-4"><div class="col-12 mt-4"><hr></div>
        <h4>Net Total: <h3 class=" fw-bold">Rs.<?php echo ($netTotal + 500); ?></h3></h4><div class="col-12 mt-4"><div class="col-12 mt-4"><hr></div>
        <button class="btn btn-dark col-3 mt-3 mb-4" onclick="checkOut();">PROCEED TO CHECKOUT</button>
    </div>
    <!-- Checkouts -->
<?php

} else {

?>
    <div class="col-12 text-center mt-5">
        <h2>Your Cart is Empty!</h2>
        <a href="index.php" class="btn btn-primary">Start Shopping</a>
    </div>
    </div>
<?php

}
