<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Handy</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resourses/icon.png">
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


                <!--sign in-->
                <div class="col-12">
                    <div class="row g-2">

                        <div class="col-12">
                            <p class="title02">Admin Sign in.</p>
                        </div>

                        <div class="" id="msgDiv">
                <div class="msg" id="msg"></div>
            </div>

                        <div class="col-12">
                            <label class="form-label">User Name</label>
                            <input class="form-control bg-transparent border-dark" type="email" id="un" />
                        </div>

                        <div class="col-12">
                            <label class="form-label">Password</label>
                            <input class="form-control bg-transparent border-dark" type="password" id="pw"/>
                        </div>

                        
                        

                        <div class="col-12 mt-4 d-grid">
                            <button class="btn btn-success" onclick="adminSignIn();"> Sign In</button>
                            <br>
                        </div>
                        
                    </div>
                </div>

                <!--sign in-->

            </div>

        </div>

    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>

</body>


</html>




</body>


</html>