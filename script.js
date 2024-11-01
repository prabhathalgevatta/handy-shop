function changeView() {
    var signInBox = document.getElementById("signIn_Box");
    var singUpBox = document.getElementById("signUp_Box");

    signInBox.classList.toggle("d-none");
    singUpBox.classList.toggle("d-none");
}



function signUp() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    // alert(fname.value);

    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("u", username.value);
    f.append("p", password.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if ((request.readyState == 4) & (request.status == 200)) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("msg1").innerHTML =
                    "Registration Successfully.";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";

                fname.value = "";
                lname.value = "";
                email.value = "";
                mobile.value = "";
                username.value = "";
                password.value = "";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
            }
        }
    };

    request.open("POST", "signUpProcess.php", true);
    request.send(f);
}

function SignIn() {
    var un = document.getElementById("un");
    var pw = document.getElementById("pw");
    var rm = document.getElementById("rm");

    // alert("ok");

    var f = new FormData();
    f.append("u", un.value);
    f.append("p", pw.value);
    f.append("r", rm.checked);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                window.location = "index.php";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    };

    request.open("POST", "signInProcess.php", true);
    request.send(f);
}


var bm;
function forgotPassword() {

    var email = document.getElementById("email");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {

                var m = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();

            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();

}

function resetPassword() {

    var email = document.getElementById("email");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");

    var f = new FormData();
    f.append("e", email.value);
    f.append("np", np.value);
    f.append("rnp", rnp.value);
    f.append("vc", vc.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;

            if (t == "success") {

                bm.hide();
                alert("Your password has been updated.");
                window.location.reload();

            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "resetPasswordProcess.php", true);
    r.send(f);

}

function showPassword() {

    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if (np.type == "password") {
        np.type = "text";
        npb.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
    } else {
        np.type = "password";
        npb.innerHTML = '<i class="bi bi-eye"></i>';
    }

}

function showPassword2() {

    var rnp = document.getElementById("rnp");
    var rnpb = document.getElementById("rnpb");

    if (rnp.type == "password") {
        rnp.type = "text";
        rnpb.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
    } else {
        rnp.type = "password";
        rnpb.innerHTML = '<i class="bi bi-eye"></i>';
    }

}


function adminSignIn() {
    var un = document.getElementById("un");
    var pw = document.getElementById("pw");

    // alert(un.value);

    var f = new FormData();

    f.append("u", un.value);
    f.append("p", pw.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {

            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                window.location = "adminDashboard.php";
            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "msg";

            }

        }
    };


    request.open("POST", "adminSignInProcess.php", true);
    request.send(f);
}

function loadUser() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);

            document.getElementById("tb").innerHTML = response;
        }
    }
    request.open("POST", "loadUserProcess.php", true);
    request.send();
}

function loadOrder() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);

            document.getElementById("tbo").innerHTML = response;
        }
    }
    request.open("POST", "loadOrderProcess.php", true);
    request.send();
}



function updateUserStatus() {
    var userid = document.getElementById("uid");
    //alert(userid.value);

    var f = new FormData();
    f.append("u", userid.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "Deactive") {
                document.getElementById("msg").innerHTML = "User Deactivate Successfully";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";

                userid.value = "";
                loadUser();

            } else if (response == "Active") {
                document.getElementById("msg").innerHTML = "User Activate Successfully";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";

                userid.value = "";
                loadUser();
            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";
            }
        }
    };

    request.open("POST", "updateUserStatusProcess.php", true);
    request.send(f);

}

function Reload() {
    location.reload();
}

function brandReg() {
    var brand = document.getElementById("brand");

    //alert(brand.value);

    var f = new FormData();
    f.append("b", brand.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "Success") {
                document.getElementById("msg1").innerHTML = "Brand Registration Successfully";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";
                brand.value = "";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
            }
        }
    }

    request.open("POST", "brandRegisterProcess.php", true);
    request.send(f);


}

function categoryReg() {
    var category = document.getElementById("category");

    //alert(category.value);

    var f = new FormData();
    f.append("c", category.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "Success") {
                document.getElementById("msg2").innerHTML = "Category Registration Successfully";
                document.getElementById("msg2").className = "alert alert-success";
                document.getElementById("msgDiv2").className = "d-block";
                brand.value = "";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    }

    request.open("POST", "categoryRegisterProcess.php", true);
    request.send(f);
}


function colorReg() {
    var color = document.getElementById("color");

    //alert(color.value);

    var f = new FormData();
    f.append("color", color.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "Success") {
                document.getElementById("msg3").innerHTML = "Color Registration Successfully";
                document.getElementById("msg3").className = "alert alert-success";
                document.getElementById("msgDiv3").className = "d-block";
                brand.value = "";
            } else {
                document.getElementById("msg3").innerHTML = response;
                document.getElementById("msgDiv3").className = "d-block";
            }
        }
    }

    request.open("POST", "colorRegisterProcess.php", true);
    request.send(f);
}

function sizeReg() {
    var size = document.getElementById("size");

    //alert(size.value);

    var f = new FormData();
    f.append("s", size.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "Success") {
                document.getElementById("msg4").innerHTML = "Size Registration Successfully";
                document.getElementById("msg4").className = "alert alert-success";
                document.getElementById("msgDiv4").className = "d-block";
                brand.value = "";
            } else {
                document.getElementById("msg4").innerHTML = response;
                document.getElementById("msgDiv4").className = "d-block";
            }
        }
    }

    request.open("POST", "sizeRegisterProcess.php", true);
    request.send(f);
}

function regProduct() {
    var pname = document.getElementById("pname");
    var brand = document.getElementById("brand");
    var cat = document.getElementById("cat");
    var color = document.getElementById("color");
    var size = document.getElementById("size");
    var desc = document.getElementById("desc");
    var file = document.getElementById("file");

    var form = new FormData();
    form.append("pname", pname.value);
    form.append("brand", brand.value);
    form.append("cat", cat.value);
    form.append("color", color.value);
    form.append("size", size.value);
    form.append("desc", desc.value);
    form.append("image", file.files[0]);

    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var response = req.responseText;

            if (response == "success") {
                document.getElementById("msg1").innerHTML = "Product Registration Successfully";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";
                brand.value = "";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
            }
        }
    };

    req.open("POST", "productRegprocess.php", true);
    req.send(form);
}

function updatestock() {
    var pname = document.getElementById("selectproduct");
    var qty = document.getElementById("qty");
    var price = document.getElementById("uprice");

    //alert(pname.value);

    var f = new FormData();

    f.append("p", pname.value);
    f.append("q", qty.value);
    f.append("up", price.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            if (response) {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msg2").className = "alert alert-success";
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    }
    request.open("POST", "updateStockprocess.php", true);
    request.send(f);


}

function printDiv() {
    var orginalContent = document.body.innerHTML;
    var printArea = document.getElementById("printArea").innerHTML;

    document.body.innerHTML = printArea;

    window.print();

    document.body.innerHTML = orginalContent;
}

function loadProduct(x) {
    var page = x;
    //alert(x);

    var f = new FormData();
    f.append("p", page);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(response);
            document.getElementById("pid").innerHTML = response;
        }
    }

    request.open("POST", "loadProductProcess.php", true);
    request.send(f);
}

function searchProduct(x) {
    var page = x;
    var product = document.getElementById("product");

    //alert(page);
    //alert(product.value);

    var f = new FormData();
    f.append("p", product.value);
    f.append("pg", page);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(response);
            document.getElementById("pid").innerHTML = response;
        }
    }

    request.open("POST", "searchProductPeocess.php", true);
    request.send(f);
}

function viwefilter() {
    document.getElementById("filterid").className = "d-block";
}

function advSearchProduct(x) {
    // alert("ok");

    var page = x;
    var color = document.getElementById("color");
    var cat = document.getElementById("cat");
    var brand = document.getElementById("brand");
    var size = document.getElementById("size");
    var min = document.getElementById("min");
    var max = document.getElementById("max");

    // alert(cat.value);

    var f = new FormData();
    f.append("pg", page);
    f.append("co", color.value);
    f.append("cat", cat.value);
    f.append("b", brand.value);
    f.append("s", size.value);
    f.append("min", min.value);
    f.append("max", max.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            // alert(responce);
            document.getElementById("pid").innerHTML = responce;
        }
    };

    request.open("POST", "advSearchProductProcess.php", true);
    request.send(f);
}

function uploadImg() {
    var img = document.getElementById("imageUploader");

    var f = new FormData();
    f.append("i", img.files[0]);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            // alert(responce);

            if (responce == "empty") {
                alert("Please select your profile image.");
            } else {
                document.getElementById("i").src = responce;
                img.value = "";
            }
        }
    };

    request.open("POST", "profileImgUpload.php", true);
    request.send(f);
}

function updateData() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var password = document.getElementById("password");
    var no = document.getElementById("no");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");

    // alert(fname.value);

    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("pw", password.value);
    f.append("no", no.value);
    f.append("l1", line1.value);
    f.append("l2", line2.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(responce);

            if (response == "Success") {
                document.getElementById("msg").innerHTML = "Update Successfully";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";

            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msg").className = "alert alert-danger";
                document.getElementById("msgDiv").className = "d-block";
            }


        }
    };

    request.open("POST", "updateDataProcess.php", true);
    request.send(f);
}

function signOut() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            swal(responce);
            document.getElementById("out").className = "d-none";
            

        }
    };

    request.open("POST", "signOutProcess.php", true);
    request.send();
}

function addCart(x) {
    var stockId = x;
    var qty = document.getElementById("qty");

    if (qty.value > 0) {
        var f = new FormData();
        f.append("s", stockId);
        f.append("q", qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var responce = request.responseText;
                // alert(responce);
                if (responce == "Cart item added successfully") {
                    swal("Good job!", responce, "success");
                    qty.value = "";
                } else {
                    swal(responce);
                    qty.value = "";
                }

            }
        };

        request.open("POST", "addtoCartProcess.php", true);
        request.send(f);
    } else {
        alert("Please enter valid quantity.");
    }
}

function loadCart() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            // alert(responce);
            document.getElementById("cartBody").innerHTML = responce;
        }
    };

    request.open("POST", "loadCartprocess.php", true);
    request.send();
}

function incrementQty(x) {
    var cartId = x;
    var qty = document.getElementById("qty" + x);
    var newQty = parseInt(qty.value) + 1;
    // alert(newQty);

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            // alert(responce);
            if (responce == "Success") {
                qty.value = parseInt(qty.value) + 1;
                loadCart();
            } else {
                alert(responce);
            }
        }
    };

    request.open("POST", "updateCartQtyProcess.php", true);
    request.send(f);
}

function decrementQty(x) {
    var cartId = x;
    var qty = document.getElementById("qty" + x);
    var newQty = parseInt(qty.value) - 1;
    // alert(newQty);

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    if (newQty > 0) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var responce = request.responseText;
                // alert(responce);
                if (responce == "Success") {
                    qty.value = parseInt(qty.value) - 1;
                    loadCart();
                } else {
                    alert(responce);
                }
            }
        };

        request.open("POST", "updateCartQtyProcess.php", true);
        request.send(f);
    }
}

function removeCart(x) {
    if (confirm("Are you sure deleting this item")) {

        var f = new FormData();
        f.append("c", x);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var responce = request.responseText;
                alert(responce);
                reload();
            }
        }

        request.open("POST", "removeCartProcess.php", true);
        request.send(f);

    }
}

function checkOut() {
    // alert("ok");

    var f = new FormData();
    f.append("cart", true);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            // alert(responce);
            var payment = JSON.parse(responce);
            doCheckout(payment, "checkoutProcess.php");
        }
    }

    request.open("POST", "paymentProcess.php", true);
    request.send(f);
}

function doCheckout(payment, path) {

    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer

        var f = new FormData();
        f.append("payment", JSON.stringify(payment));

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                // alert(response);

                var order = JSON.parse(response);

                if (order.resp == "Success") {
                    // reload();
                    window.location = "invoice.php?orderId=" + order.order_id; //invoice
                } else {
                    alert(response);
                }
            }
        };

        request.open("POST", path, true);
        request.send(f);

    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    // document.getElementById('payhere-payment').onclick = function (e) {
    payhere.startPayment(payment);
    // };
}

function buyNow(stockId) {
    // alert(stockId);
    var qty = document.getElementById("qty");

    if (qty.value > 0) {

        var f = new FormData();
        f.append("cart", false);
        f.append("stockId", stockId);
        f.append("qty", qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var responce = request.responseText;
                // alert(responce);
                var payment = JSON.parse(responce);
                payment.stock_id = stockId;
                payment.qty = qty.value;
                doCheckout(payment, "buynowProcess.php");
            }
        }

        request.open("POST", "paymentProcess.php", true);
        request.send(f);

    } else {
        alert("Please enter valid quantity");
    }
}


function loadChart() {
    //alert("ok");

    var ctx = document.getElementById('myChart');

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(response);

            var data = JSON.parse(response);

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: '# of Votes',
                        data: data.data,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    }

    request.open("POST", "loadChartProcess.php", true);
    request.send();
}

function sub(){
    var submail = document.getElementById("submail");

    var f = new FormData();
    f.append("submail", submail.value);
    

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            // alert(response);
            swal("Good job!", response, "success");
                    
        }
    };

    request.open("POST", "subprocess.php", true);
    request.send(f);
}

function sendnews(){
    var subject = document.getElementById("subject");
    var content = document.getElementById("content");

    var f = new FormData();
    f.append("sub", subject.value);
    f.append("con", content.value);
    

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            // alert(response);
            swal("Good job!", response, "success");
                    
        }
    };

    request.open("POST", "sendnewsprocess.php", true);
    request.send(f);
}
