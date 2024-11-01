<?php

session_start();
include "connection.php";
$user = $_SESSION["u"];

if (isset($user)) {


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

    <body onload="loadCart();">
        <!-- nav bar -->
        <?php include "navBar.php"; ?>
        <!-- nav bar -->

        <div class=" container mt-5">
            <div class="row mt-5" id="cartBody">

                <!-- card load here -->


            </div>

        </div>

        <!--footer-->
        <?php include "footer.php"; ?>
        <!--footer-->

        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    header("location: signIn.php");
}

?>