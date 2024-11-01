<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];
$orderHistoryId = $_GET["orderId"];

$rs = Database::search("SELECT * FROM `order_history` WHERE `ohid` = '" . $orderHistoryId . "'");
$num = $rs->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();
    

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="icon" href="Resources/img/icon.png">
        <title>Handy</title>
    </head>

    <body>

        <div class=" container mt-3 mb-5">
            <a href="index.php"><img src="Resources/img/left-arrow.png" alt="" style="width: 35px;"></a>

            <div class=" text-end">
                <button class=" btn btn-outline-secondary" onclick="printDiv();">Print</button>

            </div>
        </div>



        <div class="card" id="printArea">
            <div class="card-body">
                <div class="container mb-5 mt-3">
                    <div class="row d-flex align-items-baseline">
                        <div class="col-xl-9">
                            <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID: #<?php echo $d["order_id"] ?></strong></p>
                        </div>

                        <hr>
                    </div>

                    <div class="container">
                        <div class="col-md-12">
                            <div class="text-center mb-5">
                                <a class="navbar-brand h1 mb-5" href="index.php" style="font-size: 30px;">
                                    <img class=" me-3" src="Resources/img/icon.png" height="50">
                                    Handy
                                </a>

                            </div>

                        </div>


                        <div class="row">
                            <div class="col-xl-8">
                                <ul class="list-unstyled">
                                    <li class="text-muted">To: <span style="color:#5d9fc5 ;"><?php echo $user["fname"] ?> <?php echo $user["lname"] ?></span></li>
                                    <li class="text-muted"><?php echo $user["line_1"] ?></li>
                                    <li class="text-muted"><?php echo $user["line_2"] ?></li>
                                    <li class="text-muted"><i class="fas fa-phone"></i> <?php echo $user["mobile"] ?></li>
                                </ul>
                            </div>
                            <div class="col-xl-4">
                                <p class="text-muted">Invoice</p>
                                <ul class="list-unstyled">
                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="fw-bold">ID:</span>#<?php echo $d["order_id"] ?></li>
                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="fw-bold">Creation Date: </span><?php echo $d["order_date"] ?></li>
                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="me-1 fw-bold">Status:</span><span class="badge bg-success text-black fw-bold">
                                            paid</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row my-2 mx-1 justify-content-center">
                            <table class="table table-striped table-borderless">
                                <thead style="background-color:#84B0CA ;" class="text-white">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Brand Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">color</th>
                                        <th scope="col">size</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                
                                $rs2 = Database::search("SELECT * FROM `order_item` INNER JOIN `stok` ON `order_item`.`stok_stok_id` = `stok`.`stok_id`
                                INNER JOIN `product` ON `stok`.`product_id` = `product`.`id` INNER JOIN `brand`
                                ON `product`.`brand_brand_id` = `brand`.`brand_id` INNER JOIN `color` ON `product`.`color_color_id` = `color`.`color_id`
                                INNER JOIN `category` ON `product`.`category_category_id` = `category`.`category_id` INNER JOIN `size` ON
                                `product`.`size_size_id` = `size`.`size_id` WHERE `order_item`.`order_history_ohid` = '".$orderHistoryId."'");

                                $num2 = $rs2->num_rows;

                                for ($i=0; $i < $num; $i++) { 
                                    $d2 = $rs2->fetch_assoc();
                                    ?>
                                    
                                    <tr>
                                        <th scope="row"><?php echo $d2["name"] ?></th>
                                        <td><?php echo $d2["brand_name"] ?></td>
                                        <td><?php echo $d2["category_name"] ?></td>
                                        <td><?php echo $d2["color_name"] ?></td>
                                        <td><?php echo $d2["size_name"] ?></td>
                                        <td><?php echo $d2["oi_qty"] ?></td>
                                        <td><?php echo($d2["price"] * $d2["oi_qty"]) ?></td>
                                    </tr>
                                    
                                    <?php
                                }
                                
                                ?>
                                    
                                </tbody>

                            </table>
                        </div>
                        <div class="row">
                            <div class="col-xl-8">
                                <p class="ms-3">Add additional notes and payment information</p>

                            </div>
                            <div class="col-xl-3">
                                <ul class="list-unstyled">
                                    <li class="text-muted ms-3"><span class="text-black me-4">Number Of Item</span><?php echo $num2 ?></li>
                                    <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Delivary Free</span>RS: 500</li>
                                </ul>
                                <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span style="font-size: 25px;">RS: <?php echo $d["amount"] ?></span></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-10">
                                <p>Thank you for your purchase</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script src="script.js"></script>


    </body>

    </html>
    


    <?php

    


} else {
    header("location: index.php");
}



?>


