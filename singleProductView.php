<?php

include "connection.php";
$stockId = $_GET["s"];
//echo($stockId);

if (isset($stockId)) {

    $q = "SELECT * FROM `stok` INNER JOIN `product` ON `stok`.`product_id`=`product`.`id` INNER JOIN `brand` 
    ON `product`.`brand_brand_id`=`brand`.`brand_id` INNER JOIN`category` 
    ON `product`.`category_category_id`=`category`.`category_id` INNER JOIN `color` 
    ON `product`.`color_color_id`=`color`.`color_id` INNER JOIN`size` 
    ON `product`.`size_size_id`=`size`.`size_id` WHERE `stok`.`stok_id`='".$stockId."'";

    $rs = Database::search($q);
    $d = $rs->fetch_assoc();

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="Resources/img/icon.png">
        <title>Handy</title>
    </head>

    <body>
        <!-- Nav Bar -->
        <?php include "navBar.php"; ?>
        <!-- Nav Bar -->

        <div class="adminBody">
            <div class="col-8 row mt-5 p-5 bg-body-tertiary rounded-2 m-auto">
                <div class=" col-12 col-lg-6 mb-5">
                    <img class="col-lg-10 col-12 " src="<?php echo $d["path"]; ?>" >
                </div>
                <div class=" col-12 col-lg-6">
                    <h3 class=" fw-bold"><?php echo $d["name"]; ?></h3>
                    <h5 class="mt-3">Brand: <?php echo $d["brand_name"]; ?></h5>
                    <h6 class="mt-3">Category: <?php echo $d["category_name"]; ?></h6>
                    <h6 class="mt-3">Color: <?php echo $d["color_name"]; ?></h6>
                    <h6 class="mt-3">Size: <?php echo $d["size_name"]; ?></h6>
                    <p class="mt-3">Description: <?php echo $d["description"]; ?></p>

                    <div class="row mt-5">
                        <div class="col-2">
                            <input type="text" placeholder="Qty" class="form-control" id="qty">
                        </div>
                        <div class="col-6 mt-2">
                            <h6 class=" fw-bold">Available Quantity : <?php echo $d["qty"]; ?></h6>
                        </div>
                    </div>
                    <h5 class="mt-3 text-danger fw-bold mb-5">Price : <?php echo $d["price"]; ?>.00</h5>
                    <div class="d-flex justify-content-center mt-3">
                        <button class="btn btn-dark col-lg-6 col-12" onclick="addCart('<?php echo $d['stok_id']; ?>');">Add to Cart</button>
                        <button class="btn btn-outline-danger col-lg-6 col-12 ms-2" onclick="buyNow('<?php echo $d['stok_id']; ?>');">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
        <div style=" padding-bottom: 200px;"></div>

        <!-- footer -->
        <?php include "footer.php"; ?>
        <!-- footer -->

        
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

    </html>

<?php
} else {
    header("location: index.php");
}

?>