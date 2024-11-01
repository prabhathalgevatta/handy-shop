<?php

include "connection.php";

$category = $_POST["c"];

//echo($category);

if (empty($category)) {
    echo("Please Enter Your category");
} else if(strlen($category) > 20){
    echo("Your category Should be less than 20 Characters");
}else{
    
    
    $rs = Database::search("SELECT * FROM `category` WHERE `category_name` = '".$category."'");
    $num = $rs->num_rows;
    
    if ($num > 0) {
        echo("Your category Already Exists");
    } else {
        Database::iud("INSERT INTO `category` (`category_name`) VALUES ('".$category."')");
        echo("Success");
    }
    
}



?>