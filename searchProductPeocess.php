<?php

include "connection.php";


$pageno = 0;
$page = $_POST["pg"];
$product = $_POST["p"];

//echo($product);

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stok` INNER JOIN `product` ON `stok`.`product_id` = `product`.`id` WHERE `product`.`name` LIKE '%$product%'";

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

    ?>
    
    <div class=" d-flex flex-column align-items-center mt-5" style="padding-bottom: 300px;">
        <h3>Search No Result</h3>
        <p>We're Sorry, We cannot find any matches for your search term...</p>
    </div>
    
    
    <?php

}else{

    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();

?>

        <div class=" col-3 mt-5 justify-content-center d-flex">
            <div class="card shadow border border-dark" style="width: 300px;">
                <img src="<?php echo $d["path"] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $d["name"] ?></h5>
                    <p class="card-text"><?php echo $d["description"] ?></p>
                    <p class="card-text">RS: <?php echo $d["price"] ?></p>
                    <div class=" d-flex justify-content-center">
                    <button class=" btn btn-dark">ADD TO CART</button>
                        <a href="singleProductView.php?s=<?php echo $d["stok_id"]; ?>">
                            <button class=" btn btn-outline-dark ms-2">BUY NOW</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }

    ?>





    <!--pagination-->
    <div class=" d-flex justify-content-center mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous" <?php

                                                                        if ($pageno <= 1) {
                                                                            echo ("#");
                                                                        } else {
                                                                        ?>onclick="searchProduct<php echo($pageno - 1)  ?>)" <?php } ?>><span aria-hidden="true">&laquo;</span></a></li>
            


            

            <?php 
            
            for ($i=0; $i <= $num_of_pages ; $i++) { 
                if ($i == $pageno) {
                    ?> <li class="page-item active"><a class="page-link" onclick="searchProduct(<?php echo $i ?>);"><?php echo $i ?></a></li> <?php
                }else{

                }
            }
            
            ?>
            
            
            <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous" <?php

                                                                        if ($pageno >= $num_of_pages) {
                                                                            echo ("#");
                                                                        } else {
                                                                        ?>onclick="searchProduct<php echo($pageno + 1)  ?>)" <?php } ?> ><span aria-hidden="true">&raquo;</span></a></li>
            
                                                                        


            
            </ul>
        </nav>
    </div>
    <!--pagination-->

<?php
}

?>

    
