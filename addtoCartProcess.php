<?php

include "connection.php";
session_start();

if(!isset($_SESSION["u"])){
    echo("Please Sign In first.");

    exit;
}

$user = $_SESSION["u"];
$stockId = $_POST["s"];
$qty = $_POST["q"];

// echo($stockId);
$rs = Database::search("SELECT * FROM `stok` WHERE `stok_id`='".$stockId."'");
$num = $rs->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();
    $stockQty = $d["qty"];

    $rs2 = Database::search("SELECT * FROM `cart` WHERE `user_id`='".$user["id"]."' AND `stok_stok_id`='".$stockId."'");
    $num2 = $rs2->num_rows;

    if ($num2 > 0) {
        //Update
        $d2 = $rs2->fetch_assoc();
        $newQty = $qty + $d2["cart_qty"];

        if ($stockQty >= $newQty) {
            //Update Query
            Database::iud("UPDATE `cart` SET `cart_qty`='".$newQty."' WHERE `cart_id`='".$d2["cart_id"]."'");
            echo("Cart item updated successfully.");
        } else {
            echo("Stock quantity has been exceeded.");
        }
        
    } else {
        //Insert
        if ($stockQty >= $qty) {
            //Insert Query
            Database::iud("INSERT INTO `cart`(`cart_qty`,`user_id`,`stok_stok_id`) 
            VALUES('".$qty."','".$user["id"]."','".$stockId."')");
            echo("Cart item added successfully.");
            
        } else {
            echo("Stock quantity has been exceeded.");
        }       
    }
    
} else {
    echo("Your stock is not founded!");
}

?>