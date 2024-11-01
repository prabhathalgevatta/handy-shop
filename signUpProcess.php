<?php

include "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$username = $_POST["u"];
$password = $_POST["p"];

// echo($fname);

if (empty($fname)) {
    echo("Please Enter Your First Name.");
} elseif (strlen($fname) > 20) {
    echo("Your First Name should be less than 20 Characters.");
} elseif (empty($lname)) {
    echo("Please Enter Your Last Name.");
} elseif (strlen($lname) > 20) {
    echo("Your Last Name should be less than 20 Characters.");
} elseif (empty($email)) {
    echo("Please Enter Your Email Address.");
} elseif (strlen($email) > 100) {
    echo("Your Email Address should be less than 100 Characters.");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("Your Email Address in Invalid.");
} elseif (empty($mobile)) {
    echo("Please Enter Your Mobile Number.");
} elseif (strlen($mobile) != 10) {
    echo("Your Mobile Number must contain 10 Characters.");
} elseif (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo("Your Mobile Number in Invalid.");
} elseif (empty($username)) {
    echo("Please Enter Your Username.");
} elseif (strlen($username) > 20) {
    echo("Your Username should be less than 20 Characters.");
} elseif (empty($password)) {
    echo("Please Enter Your Password.");
} elseif (strlen($password) < 5 || strlen($password) > 45) {
    echo("Your Password must contain 5 - 45 Characters.");
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."' OR `mobile` = '".$mobile."' OR `username` = '".$username."'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo("Your Email OR Username OR Mobile Already Exists");
    } else {
        //Insert Data
        Database::iud("INSERT INTO `user`(`fname`,`lname`,`email`,`mobile`,`username`,`password`,`user_type_id`)
        VALUES ('".$fname."','".$lname."','".$email."','".$mobile."','".$username."','".$password."','2')");

        echo("Success");
    }
    
}
  
?>