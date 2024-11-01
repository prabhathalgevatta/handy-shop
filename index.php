<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handy</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="Resources/img/icon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!--navBar-->
    <?php include "navBar.php"; ?>
    <!--navBar-->

    <!--body-->

    <div class=" container-fluid mb-5" style="padding-top: 80px; padding-bottom: 60px;">
        <div class=" row mt-5 pt-5">
            <div class=" col-12 col-lg-6 mb-5">
                <div class=" justify-content-center d-flex align-items-center">
                    <h2 class=" text-center fw-bolder">Handy Fashion Shop</h2><br>
                </div>

                <div class="justify-content-center d-flex align-items-center" style="margin-left: -12px;">
                    <label class=" text-center">Best condition clothes and other things</label>
                </div>

                <div class=" d-grid justify-content-center d-flex align-items-center mt-3" style="margin-left: -50px;">
                    <div class="">
                        <a href="shop.php"><button class=" btn btn-dark fw-bold">SHOP NOW</button></a>
                    </div>

                    <div class=" ms-3">
                        <button class=" btn btn-outline-secondary">Learn more</button>
                    </div>
                </div>
            </div>

            <div class=" col-12 col-lg-6">
                <img src="Resources/img/caro/4.jpg" height="500" class=" shadow-lg rounded" alt="">
            </div>

        </div>
    </div>

    <!--body-->





    <div class=" col-12 mt-5 mb-5 align-items-center offset-1 offset-lg-0">
        <h2 class=" text-center fw-bold">NEW ARRIVALS</h2>

        <div class=" row justify-content-center mt-5 ">
            <div class=" col-12 col-lg-3 mt-5">
                <img src="Resources/img/new/1.jpg" height="600" alt="">
            </div>

            <div class=" col-12 col-lg-3 mt-5">
                <img src="Resources/img/new/2.jpg" height="600" alt="">
            </div>

            <div class=" col-12 col-lg-3 mt-5">
                <img src="Resources/img/new/3.jpg" height="600" alt="">
            </div>

        </div>
    </div>
    

    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" tabindex="0">
    <h2 class=" text-center mt-5 fw-bold" id="scrollspyHeading1">BLOG</h2>
    </div>
    

    <!--pr-->

    <div class=" container-fluid mb-5" style="padding-top: 90px; padding-bottom: 70px;">
        <div class=" row mt-5 pt-5 align-items-center justify-content-center">
            <div class=" col-12 col-lg-4 mb-5 offset-1">
                <p style="font-size: 25px;">Ditch the crowded stores and browse from the comfort of your couch!  This clothing site offers a wide selection, from trendy pieces to timeless staples, all conveniently available online.  Shop by category or browse new arrivals to find that perfect outfit and look effortlessly stylish.</p>
            </div>

            <div class=" col-12 col-lg-6 offset-1">
                <img src="Resources/img/caro/2.jpg" height="500" class=" shadow-lg rounded" alt="">
            </div>

        </div>
    </div>

    <!--pr-->


    <div class=" col-12 mt-5 align-items-center offset-1 offset-lg-0">
        <h2 class=" text-center mt-5 fw-bold">BRAND</h2>

        <div class=" row justify-content-center mt-5 ">
            <div class=" col-12 col-lg-3 mt-5">
                <img src="Resources/img/adidas.png" height="300" alt="">
            </div>

            <div class=" col-12 col-lg-3 mt-5 ms-5">
                <img src="Resources/img/puma.png" height="200" alt="">
            </div>

            <div class=" col-12 col-lg-3 mt-5 ms-5">
                <img src="Resources/img/u.png" height="200" alt="">
            </div>

        </div>
    </div>









    <!--footer-->
    <?php include "footer.php"; ?>
    <!--footer-->




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>

</html>