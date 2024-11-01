<?php

session_start();

include "connection.php";

if (isset($_SESSION["a"])) {

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Handy - Admin</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="Resources/img/icon.png">
        <style>
            body {
                background-image: url('https://wallpapercave.com/wp/wp2508307.jpg');
                /* Change to your desired background image */
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center;
                min-height: 100vh;
                backdrop-filter: blur(10px);


            }

            .glass-effect {
                background: rgba(255, 255, 255, 0.1);
                border-radius: 15px;
                padding: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                backdrop-filter: blur(10px);
            }

            .form-control {
                background-color: rgba(255, 255, 255, 0.5);
                border-radius: 10px;
            }
        </style>
    </head>

    <body class="adminBody">

        <?php include "adminNavbar.php"; ?>

        <div class="container-fluid mt-5" style="padding-top:100px;">
            <div class="row mt-5">
                <div class="col-6 offset-3">
                    <div class="glass-effect mb-4">
                        <h2 class="text-center fw-bold text-light">Product Registration</h2>

                        

                        <div class="d-none" id="msgDiv1" onclick="Reload();">
                            <div class="alert alert-danger" id="msg1"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Product Name :</label>
                            <input type="text" class="form-control " id="pname">
                        </div>

                        <div class="row">
                            <div class=" mb-3 col-6">
                                <label for="" class=" form-label fw-bold">Brand :</label>
                                <select class=" form-select " id="brand">
                                    <option value="0">Select</option>

                                    <?php

                                    $rs = Database::search("SELECT * FROM `brand`");
                                    $num = $rs->num_rows;

                                    for ($i = 0; $i < $num; $i++) {
                                        $data = $rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($data["brand_id"]) ?>"><?php echo ($data["brand_name"]) ?></option>
                                    <?php
                                    }
                                    ?>



                                </select>
                            </div>

                            <div class=" mb-3 col-6">
                                <label for="" class=" form-label fw-bold">Category :</label>
                                <select class=" form-select " id="cat">
                                    <option value="0">Select</option>

                                    <?php

                                    $rs = Database::search("SELECT * FROM `category`");
                                    $num = $rs->num_rows;

                                    for ($i = 0; $i < $num; $i++) {
                                        $data = $rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($data["category_id"]) ?>"><?php echo ($data["category_name"]) ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>


                            <div class=" mb-3 col-6">
                                <label for="" class=" form-label fw-bold">Color :</label>
                                <select class=" form-select" id="color">
                                    <option value="0">Select</option>

                                    <?php

                                    $rs = Database::search("SELECT * FROM `color`");
                                    $num = $rs->num_rows;

                                    for ($i = 0; $i < $num; $i++) {
                                        $data = $rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($data["color_id"]) ?>"><?php echo ($data["color_name"]) ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class=" mb-3 col-6">
                                <label for="" class=" form-label fw-bold">Size :</label>
                                <select class=" form-select " id="size">
                                    <option value="0">Select</option>

                                    <?php

                                    $rs = Database::search("SELECT * FROM `size`");
                                    $num = $rs->num_rows;

                                    for ($i = 0; $i < $num; $i++) {
                                        $data = $rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($data["size_id"]) ?>"><?php echo ($data["size_name"]) ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>

                        <div class=" mb-3">
                            <label class=" form-label fw-bold">Description</label>
                            <textarea class=" form-control " id="desc"></textarea>
                        </div>

                        <div class=" mb-3">
                            <label class=" form-label fw-bold">Product Image :</label>
                            <input type="file" class=" form-control " id="file">
                        </div>

                        <div class=" d-grid">
                            <button class=" btn btn-dark" onclick="regProduct();">Register Product</button>
                        </div>

                    </div>

                    <!--stock-->

                    <div class="col-12 mt-5 container-fluid">
                        <div class="glass-effect">
                            <h2 class="text-center fw-bold text-light">Stock Update</h2>

                            

                            <div class="d-none" id="msgDiv2" onclick="Reload();">
                                <div class="alert alert-danger" id="msg2"></div>
                            </div>

                            <div class=" mt-3 col-12 mb-3">
                                <label class=" form-label fw-bold">Product Name</label>
                                <select class=" form-select " id="selectproduct">
                                    <option value="0">Select</option>
                                    <?php

                                    $rs = Database::search("SELECT * FROM `product`");
                                    $num = $rs->num_rows;

                                    for ($i = 0; $i < $num; $i++) {
                                        $d = $rs->fetch_assoc();

                                    ?>
                                        <option value="<?php echo ($d["id"]) ?>"><?php echo ($d["name"]) ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class=" mb-3 col-12">
                                <label class=" form-label fw-bold">Qty</label>
                                <input type="text" class=" form-control " id="qty">
                            </div>

                            <div class=" mb-3 col-12">
                                <label class=" form-label fw-bold">Unit Price</label>
                                <input type="text" class=" form-control " id="uprice">
                            </div>

                            <div class="col-12 ">
                                <button class=" btn btn-dark col-12" onclick="updatestock();">Update Stock</button>
                            </div>
                        </div>
                        <!--stock-->

                    </div>

                </div>





                <script src="script.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>


<?php

} else {
    echo ("Your Not a Valide Admin");
}


?>