<?php

session_start();
include "connection.php";
$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {

    $rs = Database::search("SELECT * FROM `user` WHERE `id`='" . $user["id"] . "'");
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

        <div class="adminBody mt-lg-5 mt-5 mb-auto">
            <div class=" container mt-5 offset-4 mt-5">
                <div class="col-6 d-flex justify-content-center flex-column mt-5 mt-lg-0">
                    <div class="d-flex justify-content-center mt-5 mt-lg-0">

                    

                        <img class=" mt-5 mt-lg-0" src="<?php
                                    if (!empty($d["img_path"])) {
                                        echo $d["img_path"];
                                    } else {
                                        echo ("Resources\img\profile.png");
                                    }
                                    ?>" height="150px" id="i">
                    </div>

                    <div class=" d-none" id="msgDiv1" onclick="Reload();">
                        <div class=" alert alert-danger" id="msg1"></div>
                    </div>

                    <div class="mt-3">
                        <label for="form-lable">Profile Image</label>
                        <input type="file" class="form-control mt-2 border-dark" id="imageUploader">
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-dark col-12" onclick="uploadImg();">Upload</button>
                    </div>
                </div>

                <div class="col-6 mt-5">
                    <h2 class="text-center fw-bold">Profile Details</h2>

                    <div class=" d-none" id="msgDiv" onclick="Reload();">
                        <div class=" alert alert-danger" id="msg"></div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-6 col-12">
                            <label for="form-lable">First Name</label>
                            <input type="text" class="form-control border-dark" value="<?php echo $d["fname"]; ?>" id="fname" disabled>
                        </div>
                        <div class=" col-lg-6 col-12">
                            <label for="form-lable">Last Name</label>
                            <input type="text" class="form-control border-dark" value="<?php echo $d["lname"]; ?>" id="lname" disabled>
                        </div>
                    </div>

                    <div class="mt-2">
                        <label for="form-lable">Email</label>
                        <input type="email" class="form-control border-dark" value="<?php echo $d["email"]; ?>" id="email" disabled>
                    </div>

                    <div class="mt-2">
                        <label for="form-lable">Mobile</label>
                        <input type="text" class="form-control border-dark" value="<?php echo $d["mobile"]; ?>" id="mobile" disabled>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-6 col-12">
                            <label for="form-lable">Username</label>
                            <input type="text" class="form-control border-dark" value="<?php echo $d["username"]; ?>" disabled>
                        </div>
                        <div class="col-lg-6 col-12">
                            <label for="form-lable">Password</label>
                            <input type="password" class="form-control border-dark" value="<?php echo $d["password"]; ?>" id="password" disabled>
                        </div>
                    </div>

                    <h5 class="mt-2">Shipping Address</h5>

                    <div class="row mt-2">
                        <div class="col-lg-3 col-12">
                            <label for="form-lable">No.</label>
                            <input type="text" class="form-control border-dark" id="no" value="<?php echo $d["no"]; ?>">
                        </div>
                        <div class="col-lg-9 col-12">
                            <label for="form-lable">Line 01</label>
                            <input type="text" class="form-control border-dark" id="line1" value="<?php echo $d["line_1"]; ?>">
                        </div>
                    </div>

                    <div class="mt-2">
                        <label for="form-lable">Line 02</label>
                        <input type="text" class="form-control border-dark" id="line2" value="<?php echo $d["line_2"]; ?>">
                    </div>

                    <div class="mt-2 mb-5">
                        <button class="btn btn-dark col-12 mb-5" onclick="updateData();">Update</button>
                    </div>

                </div>
            </div>
        </div>

        <!--footer-->
        <?php include "footer.php"; ?>
        <!--footer-->

        <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    header("location: signIn.php");
}

?>