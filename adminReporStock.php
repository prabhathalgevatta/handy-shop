<?php

session_start();

include "connection.php";

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM `stok` INNER JOIN `product` ON `stok`.`product_id` = `product`.`id`
    ORDER BY `stok`.`stok_id` ASC");
    $num = $rs->num_rows;
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="Resources/img/icon.png">
        <title>Handy - Admin</title>
    </head>

    <body>

        <div class=" container mt-3">
            <a href="adminDashboard.php"><img src="Resources/img/left-arrow.png" alt="" style="width: 40px;"></a>
        </div>

        <div class=" container mt-3" id="printArea">
            <h2 class="text-center fw-bold text-danger">Stock Reports</h2>
            <table class=" table shadow mt-5">
                <thead>
                    <tr>
                        <th>Stock id</th>
                        <th>Product Name</th>
                        <th>qty</th>
                        <th>Unit Price</th>
                    </tr>
                </thead>

                <?php 
                
                for ($i=0; $i < $num ; $i++) { 
                    $d = $rs->fetch_assoc();

                    ?>
                    
                    <tr>
                        <td><?php echo($d["id"]) ?></td>
                        <td><?php echo($d["name"]) ?></td>
                        <td><?php echo($d["qty"]) ?></td>
                        <td><?php echo($d["price"]) ?></td>
                    </tr>
                    
                    <?php
                }
                
                ?>
                    
                    
                <tbody>

                </tbody>
            </table>
        </div>

        <div class=" d-flex justify-content-end container mt-5 mb-5">
            <button class=" btn btn-outline-dark col-2" onclick="printDiv();">Print</button>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("You are not a valid Admin");
}


?>