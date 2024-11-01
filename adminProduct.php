<?php

session_start();

if (isset($_SESSION["a"])) {

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Resources/img/icon.png">
    <title>Handy - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: url('https://wallpapercave.com/wp/wp2508307.jpg') no-repeat center center fixed;
            background-size: cover;
            backdrop-filter: blur(10px);
        }
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

<body class="adminBody">
    <!--nav bar-->
    <?php include "adminNavbar.php"; ?>
    <!--nav bar-->

    <div class="container mt-5" style="padding-top: 200px;">
        <h2 class="text-center fw-bold text-light">Product Management</h2>

        <div class="row mt-5 justify-content-center">
            <!-- Brand register -->
            <div class="col-md-6 col-lg-4 glass-effect">
                
                
                <input type="text" class="form-control mt-3 mb-3" id="brand">
                <div class="d-none" id="msgDiv1" onclick="Reload();">
                    <div class="alert alert-danger" id="msg1"></div>
                </div>
                <button class="btn btn-dark col-12 mt-1" onclick="brandReg();">Brand Register</button>
            </div>
        </div>

        <div class="row mt-5 justify-content-center">
            <!-- Category register -->
            <div class="col-md-6 col-lg-4 glass-effect">
            
                
                <input type="text" class="form-control mt-3 mb-3" id="category">
                <div class="d-none" id="msgDiv2" onclick="Reload();">
                    <div class="alert alert-danger" id="msg2"></div>
                </div>
                <button class="btn btn-dark col-12 mt-1" onclick="categoryReg();">Category Register</button>
            </div>
        </div>

        <div class="row mt-5 justify-content-center">
            <!-- Color register -->
            <div class="col-md-6 col-lg-4 glass-effect">
            
                
                <input type="text" class="form-control mt-3 mb-3" id="color">
                <div class="d-none" id="msgDiv3" onclick="Reload();">
                    <div class="alert alert-danger" id="msg3"></div>
                </div>
                <button class="btn btn-dark col-12 mt-1" onclick="colorReg();">Color Register</button>
            </div>
        </div>

        <div class="row mt-5 justify-content-center" style="padding-bottom: 100px;">
            <!-- Size register -->
            <div class="col-md-6 col-lg-4 glass-effect" >
            
                
                <input type="text" class="form-control mt-3 mb-3" id="size">
                <div class="d-none" id="msgDiv4" onclick="Reload();">
                    <div class="alert alert-danger" id="msg4"></div>
                </div>
                <button class="btn btn-dark col-12 mt-1" onclick="sizeReg();">Size Register</button>
            </div>
        </div>
    </div>

   

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php

} else {
    echo ("You're not a valid admin");
}

?>
