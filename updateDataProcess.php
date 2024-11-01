<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$pw = $_POST["pw"];
$no = $_POST["no"];
$line1 = $_POST["l1"];
$line2 = $_POST["l2"];

if(empty($no)){
    echo("Please Enter Address No");
}else if(strlen($no)>10){
    echo("Your Address No Must Contain less than 10 Characters");
}else if(empty($line1)){
    echo("Please Enter Address Line 01");
}else if(strlen($line1)>50){
    echo("Your Address Line 01 Must Contain less than 50 Characters");
}else if(empty($line2)){
    echo("Please Enter Address Line 02");
}else if(strlen($line2)>50){
    echo("Your Address Line 02 Must Contain less than 50 Characters");
}else{

    Database::iud("UPDATE `user` SET `no`='".$no."',`line_1`='".$line1."',`line_2`='".$line2."' WHERE `id`='".$user["id"]."'");

    $rs = Database::search("SELECT * FROM `user` WHERE `id`='".$user["id"]."'");
    $d = $rs->fetch_assoc();
    $_SESSION["u"] = $d;

    echo ("Success");

}

?>