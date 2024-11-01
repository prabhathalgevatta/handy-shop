<?php

session_start();

if (isset($_SESSION["a"])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Handy - news</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="Resources/img/icon.png">
    </head>

    <body>
        <?php include "adminNavbar.php"; ?>

        <div class=" container " style="padding-top: 100px;">
            <div class="">
                <h2 class=" text-center">News Add</h2>
            </div>

            <div class=" mt-5 col-8 offset-2">
                <label for="" class=" form-label">Subject</label>
                <input type="text" class=" form-control" id="subject">
            </div>

            <div class=" mt-5 col-8 offset-2">
                <label for="" class=" form-label">Content</label>
                <textarea name="" id="content" class=" form-control"></textarea>
            </div>

            <div class=" col-8 mt-5 offset-2">
                <button class=" btn btn-dark col-12" onclick="sendnews();">Add News</button>
            </div>
        </div>


        <!--Footer-->
        <div class=" fixed-bottom col-12">
            <p class=" text-center">&copy; Handy.lk || All Right Reserved</p>
        </div>
        <!--Footer-->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    </body>

    </html>

<?php
} else {
    echo ("You are not a valid Admin");
}


?>