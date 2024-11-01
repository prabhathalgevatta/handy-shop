<?php

include "connection.php";

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handy</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="Resources/img/icon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body onload="loadProduct(0);">
    <!--navBar-->
    <?php include "navBar.php"; ?>
    <!--navBar-->

    <!--basic search-->

    <div class=" container d-flex justify-content-center mt-5">
        <div class=" col-6 mt-5">
            <input class=" form-control border-dark" id="product" type="text" placeholder="Product Name" onkeyup="searchProduct(0);">
        </div>
        <a class=" mt-5 col-1 ms-3" onclick="viwefilter();" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="Resources/img/filter.png" height="39" alt=""></a>
    </div>

    <!--basic search-->

    <!--Advance search-->



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Advance Search</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class=" d-none" id="filterid">
                        <div class=" mt-4 p-5 col-10 offset-1">

                            <div class="col-12">
                                <div class="col-12 ms-auto">
                                    <label class="form-label col-3">Color :</label>
                                    <select id="color" class="form-select col-9 border border-dark">
                                        <option value="0">Select Color</option>
                                        <?php
                                        $rs = Database::search("SELECT * FROM `color`");
                                        $num = $rs->num_rows;

                                        for ($i = 0; $i < $num; $i++) {
                                            $d = $rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $d["color_id"]; ?>"><?php echo $d["color_name"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class=" mt-3 col-12 ms-auto">
                                    <label class="form-label col-3">Category :</label>
                                    <select id="cat" class="form-select col-9 border border-dark">
                                        <option value="0">Select Category</option>
                                        <<?php
                                            $rs2 = Database::search("SELECT * FROM `category`");
                                            $num2 = $rs2->num_rows;

                                            for ($x = 0; $x < $num2; $x++) {
                                                $d2 = $rs2->fetch_assoc();
                                            ?> <option value="<?php echo $d2["category_id"]; ?>"><?php echo $d2["category_name"]; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class=" col-12 mt-3 ">
                                <div class="col-12 ms-auto">
                                    <label class="form-label col-3">Brand :</label>
                                    <select id="brand" class="form-select col-9 border border-dark">
                                        <option value="0">Select Brand</option>
                                        <<?php
                                            $rs3 = Database::search("SELECT * FROM `brand`");
                                            $num3 = $rs3->num_rows;

                                            for ($p = 0; $p < $num; $p++) {
                                                $d3 = $rs3->fetch_assoc();
                                            ?> <option value="<?php echo $d3["brand_id"]; ?>"><?php echo $d3["brand_name"]; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class=" col-12 ms-auto mt-3">
                                    <label class="form-label col-3">Size :</label>
                                    <select id="size" class="form-select col-9 border border-dark">
                                        <option value="0">Select Size</option>
                                        <<?php
                                            $rs4 = Database::search("SELECT * FROM `size`");
                                            $num4 = $rs4->num_rows;

                                            for ($n = 0; $n < $num4; $n++) {
                                                $d4 = $rs4->fetch_assoc();
                                            ?> <option value="<?php echo $d4["size_id"]; ?>"><?php echo $d4["size_name"]; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-4 col-12 m-auto">
                                <div class="col-12">
                                    <input type="text" class="form-control border border-dark" placeholder="Min Price" id="min">
                                </div>
                                <div class=" mt-3 col-12">
                                    <input type="text" class="form-control border border-dark" placeholder="Max Price" id="max">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class=" btn btn-dark col-lg-4 col-12" onclick="advSearchProduct(0);">Search</button>
                </div>
            </div>
        </div>
    </div>


    <!--Advance search-->


    <!--carousel-->
    <div class=" container w-75 h-75 mt-5">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="Resources/img/caro/6.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="Resources/img/caro/7.jpg" class="d-block w-100" alt="...">
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!--carousel-->


    <div class=" offset-5 mt-5 mb-5 bg-dark col-2 justify-content-center align-items-center">
        <h2 class=" fw-bold text-bg-light text-center">MEN CLOTHING</h2>
    </div>




    <!--load product-->
    <div class=" row col-10 offset-1" id="pid"></div>
    <!--load product-->











    <!--footer-->
    <?php include "footer.php"; ?>
    <!--footer-->




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>


</body>

</html>