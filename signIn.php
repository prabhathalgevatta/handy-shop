<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="Resources/img/icon.png">
    <title>Handy</title>
</head>

<body class=" adminBody">



    <!--body-->

    <div class=" container-fluid mb-5 offset-lg-1" style="padding-top: 100px; padding-bottom: 60px;">
        <div>
            <h2 class="fw-bold text-center" style="font-size: 45px;"><img class=" me-3" src="Resources/img/icon.png" height="60">Handy</h2>
        </div>
        <div class=" row mt-5 pt-5">
            <div class="col-12 col-lg-6 mb-5">
                <!-- Sign Up Box -->
                <div class="signUp_Box" id="signUp_Box">
                    <h2 class="text-center fw-bold">Sign Up</h2>

                    <div class="row">
                        <div class="mt-3 col-lg-6 col-12">
                            <label for="form-label">First Name</label>
                            <input type="text" class="form-control border-dark" id="fname" />
                        </div>

                        <div class="mt-3 col-lg-6 col-12">
                            <label for="form-label">Last Name</label>
                            <input type="text" class="form-control border-dark" id="lname" />
                        </div>
                    </div>

                    <div class="mt-2">
                        <label for="form-label">Email</label>
                        <input type="email" class="form-control border-dark" id="email" />
                    </div>

                    <div class="mt-2">
                        <label for="form-label">Mobile</label>
                        <input type="text" class="form-control border-dark" id="mobile" />
                    </div>

                    <div class="mt-2">
                        <label for="form-label">Username</label>
                        <input type="text" class="form-control border-dark" id="username" />
                    </div>

                    <div class="mt-2 mb-3">
                        <label for="form-label">Password</label>
                        <input type="password" class="form-control border-dark" id="password" />
                    </div>

                    <div class="d-none" id="msgDiv1">
                        <div class="alert alert-danger" id="msg1"></div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-dark col-12" onclick="signUp();">Sign Up</button>
                    </div>

                    <div class="mt-2">
                        <button data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" class="btn btn-outline-secondary col-12" onclick="changeView();">Already Have an Account? Please Sign In</button>
                    </div>


                </div>

                <!-- Sign Up Box -->


                <!-- Sign In Box-->
                <div class="signIn_Box d-none" id="signIn_Box">
                    <h2 class="text-center fw-bold">Sign In</h2>

                    <?php

                    $username = "";
                    $password = "";

                    if (isset($_COOKIE["username"])) {
                        $username = $_COOKIE["username"];
                    }

                    if (isset($_COOKIE["password"])) {
                        $password = $_COOKIE["password"];
                    }

                    ?>

                    <div class="mt-3">
                        <label for="form-label">Username:</label>
                        <input type="text" class="form-control border-dark" id="un" value="<?php echo $username ?>" />
                    </div>

                    <div class="mt-2">
                        <label for="form-label">Password:</label>
                        <input type="password" class="form-control border-dark" id="pw" value="<?php echo $password ?>" />
                    </div>

                    <div class="mt-2 mb-2 col-6">
                        <input type="checkbox" class="form-check-input" id="rm" />
                        <label for="form-label">Remember Me</label>
                    </div>


                    <div class="d-none" id="msgDiv2">
                        <div class="alert alert-danger" id="msg2"></div>
                    </div>

                    <div class="mt-2">
                        <button class="btn btn-dark col-12" onclick="SignIn();">Sign In</button>
                    </div>

                    <div class="mt-2">
                        <a href="forgotPassword.php"><button class="btn btn-outline-danger col-12">Forgot Password?</button></a>
                    </div>

                    <div class="mt-2">
                        <button class="btn btn-outline-secondary col-12" onclick="changeView();">New to Handy? Please Sign Up</button>
                    </div>



                </div>
                <!-- Sign In Box -->

                   



            </div>

            <div class="col-12 col-lg-2 ms-lg-5 justify-content-center ">
                <img src="Resources/img/caro/4.jpg" height="450" class=" shadow-lg rounded" alt="">
            </div>

        </div>



    </div>
    </div>

    <!--body-->

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>