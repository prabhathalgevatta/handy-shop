<?php

include "connection.php";

$pageno = 0;
$page = $_POST["p"];

//echo($page);

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stok` INNER JOIN `product` ON `stok`.`product_id` = `product`.`id` ORDER BY `stok`.`stok_id` ASC";
$rs = Database::search($q);
$num = $rs->num_rows;
//echo($num);

$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);

$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
    echo ("No Product Here...");
} else {

    for ($y = 0; $y < $num2; $y++) {
        $d = $rs2->fetch_assoc();

?>

        <div class=" col-12 col-lg-3 mt-5 justify-content-center d-flex">
            <div class="card" style="width: 300px;">
                <a href="singleProductView.php?s=<?php echo $d["stok_id"]; ?>">
                    <img src="<?php echo $d["path"]; ?>" class="card-img-top" />
                </a>
                <div class="card-body">
                    <h5 class="card-title fw-bold"><?php echo $d["name"] ?></h5>
                    
                    <p class="card-text text-danger fw-bold fs-5">RS: <?php echo $d["price"] ?></p>
                    <div class=" d-flex justify-content-center mt-4">
                        <button class=" btn btn-dark">ADD TO CART</button>
                        <a href="singleProductView.php?s=<?php echo $d["stok_id"]; ?>">
                            <button class=" btn btn-outline-danger ms-2">BUY NOW</button>
                        </a>

                    </div>
                </div>
            </div>
        </div>

    <?php
    }

    ?>





    <!-- pagination  -->
    <div class="d-flex justify-content-center mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class=" page-link" <?php

                                                            if ($pageno <= 1) {
                                                                echo ("#");
                                                            } else {
                                                            ?>onclick="loadProduct(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                                }
                                                                                                                    ?>>Previous</a></li>

                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {
                    if ($y == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="loadProduct(<?php echo ($y) ?>);"><?php echo ($y) ?></a>
                        </li>
                    <?php

                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="loadProduct(<?php echo ($y) ?>);"><?php echo ($y) ?></a>
                        </li>
                <?php
                    }
                }

                ?>

                <li class="page-item"><a class="page-link" <?php

                                                            if ($pageno >= $num_of_pages) {
                                                                echo ("#");
                                                            } else {
                                                            ?>onclick="loadProduct(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                                }
                                                                                                                    ?>>Next</a></li>
            </ul>
        </nav>
    </div>

    <!--pagination-->

<?php
}

?>