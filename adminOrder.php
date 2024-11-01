<?php
session_start();

// Check if the user is an admin
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
        /* Custom styles for transparency and rounded corners */
        .rounded-corner {
            border-radius: 15px;
        }
        .transparent {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .table {
            background-color: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }
        .form-control {
            background-color: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
        }
        .adminBody {
            background: url('https://wallpapercave.com/wp/wp2508307.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
        }
    </style>
</head>

<body class="adminBody" onload="loadOrder();">
    <?php include "adminNavbar.php"; ?>

    <div class="container glass-effect mt-auto" style="padding-top: 100px;">

    <div class="row d-flex justify-content-start mt-4" style="padding-top: 20px; padding-bottom: 20px;">
            

            
        

        <h2 class="text-center fw-bold text-light mt-4">Sales</h2>

        <div class="mt-3">
            <table class="table text-light shadow-lg rounded-corner">
                <thead>
                    <tr>
                        <th scope="col" class=" text-bg-dark">ID</th>
                        <th scope="col" class=" text-bg-dark">Order Id</th>
                        <th scope="col" class=" text-bg-dark">Date</th>
                        <th scope="col" class=" text-bg-dark">Amount</th>
                        <th scope="col" class=" text-bg-dark">User Id</th>
                    </tr>
                </thead>
                <tbody id="tbo">
                    <!-- Table rows will be populated here -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <div class="fixed-bottom col-12">
        <p class="text-center">&copy; Handy.lk || All Rights Reserved</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>

<?php
} else {
    // Redirect to login page or show an appropriate message
    header("Location: login.php"); // Example redirect to login page
    exit();
}
?>
