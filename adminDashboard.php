<?php

session_start();

if (isset($_SESSION["a"])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Handy - Admin Dashboard</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="Resources/img/icon.png">
        <style>
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }
        .main-body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .form-control {
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 10px;
        }
        .btn-dark {
            border-radius: 10px;
        }
        
    </style>
    </head>

    <body class=" adminBody" onload="loadChart();">
        <?php include "adminNavbar.php"; ?>

        <!--chart-->
        <div style="width: 700px;">
            <h2 class=" text-center fw-bold text-light">Most Sold Product</h2>
            <canvas id="myChart"></canvas>
        </div>

        <!--chart-->


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