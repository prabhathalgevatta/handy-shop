<?php 
include "connection.php";


$productId = $_POST["p"];
$qty = $_POST["q"];
$price = $_POST["up"];

//echo($productId);

if (empty($qty)) {
    echo("Please Enter qty");
} else if(!is_numeric($qty)){
    echo("Only Numbers Entered for qty");
}else if(strlen($qty) > 10){
    echo("Your qty should be less than 10 chatacters");
}else if (empty($price)) {
    echo("Please Enter price");
} else if(!is_numeric($price)){
    echo("Only Numbers Entered for price");
}else if(strlen($price) > 10){
    echo("Your price should be less than 10 chatacters");
}else{
    
    $rs = Database::search("SELECT * FROM `stok` WHERE `stok_id` = '$productId' AND `price` = '$price'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if($num == 1){
        $newQty = $d["qty"] + $qty;
        Database::iud("UPDATE `stok` SET `qty` = '$newQty' WHERE `product_id` = '".$d["id"]."' ");
        echo("stock updated successfill");
    }else{
        Database::iud("INSERT INTO `stok` (`price`,`qty`,`product_id`) VALUES ('".$price."','".$qty."','".$productId."')");
        echo("New stock added successfill");
    }
}


?>