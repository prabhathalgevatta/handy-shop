<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Handy</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="Resources/img/icon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class=" main-body">

    <div class="container-fluid d-flex vh-100 justify-content-center mt-5">
        <div class="row align-content-center">
            <div class=" col-6 bg-transparent shadow-lg offset-3">

                <!--header-->

                <div class=" col-12">
                    <div class=" row">
                        <div class=" col-12 logo"></div>
                        <div class="col-12">
                            <p class="text-center title01" style="font-family:honey;font-size: 35px;letter-spacing:
                         3px;">Handy</p>
                        </div>

                    </div>

                </div>

                <!--header-->


                <!--forogot-->
                <div class="col-12">
                    <div class="row g-2">

                        <div class="col-12">
                            <p class="title02">Forgot Password?</p>
                        </div>

                        <div class="" id="msgDiv">
                            <div class="msg" id="msg"></div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Your Email</label>
                            <input class="form-control bg-transparent border-dark" type="email" id="email" />
                        </div>

                        <div class="col-12 mt-4 d-grid">
                            <button class="btn btn-success" onclick="forgotPassword();">Verification Code Send</button>
                            <br>
                        </div>

                    </div>
                </div>

                <!--forgot-->


                <!-- modal -->

                <div class="modal" tabindex="-1" id="forgotPasswordModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Forgot Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="row g-3">

                                    <div class="col-6">
                                        <label class="form-label">New Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" id="np" />
                                            <button class="btn btn-outline-secondary" type="button" id="npb" onclick="showPassword();">Show</button>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Re-type Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" id="rnp" />
                                            <button class="btn btn-outline-secondary" type="button" id="rnpb" onclick="showPassword2();">Show</button>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Verification Code</label>
                                        <input type="text" class="form-control" id="vc" />
                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal -->

            </div>

        </div>

    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>


</html>




</body>


</html>