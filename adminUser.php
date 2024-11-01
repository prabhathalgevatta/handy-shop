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

<body class="adminBody" onload="loadUser();" onload="loadOrder();">
    <?php include "adminNavbar.php"; ?>

    <div class="container glass-effect mt-auto">
        <h2 class="text-center fw-bold text-light mt-4">Users Active/Deactive</h2>

        <div class=" align-items-center justify-content-center d-flex ">
            <img src="Resources/img/us.jpg" class=" w-75 rounded-5" alt="">
        </div>

        <div class="row d-flex justify-content-start mt-4" style="padding-top: 20px; padding-bottom: 20px;">
            <div class="d-none" id="msgDiv" onclick="Reload();">
                <div class="alert alert-danger rounded-corner transparent" id="msg"></div>
            </div>
            <div class="col-2">
                <input type="text" class="form-control border-dark rounded-corner" placeholder="ID" id="uid">
            </div>
            <a class="col-1" onclick="updateUserStatus();">
                <img src="Resources/img/change.png" class="w-25 rounded-corner" alt="Change Status">
            </a>
        </div>

        <div class="mt-3">
            <table class="table text-light shadow-lg rounded-corner">
                <thead>
                    <tr>
                        <th scope="col" class=" text-bg-dark">User ID</th>
                        <th scope="col" class=" text-bg-dark">First Name</th>
                        <th scope="col" class=" text-bg-dark">Last Name</th>
                        <th scope="col" class=" text-bg-dark">Email</th>
                        <th scope="col" class=" text-bg-dark">Mobile</th>
                        <th scope="col" class=" text-bg-dark">Status</th>
                    </tr>
                </thead>
                <tbody id="tb">
                    <!-- Table rows will be populated here -->
                </tbody>
            </table>
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
