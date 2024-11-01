<?php

include "connection.php";

$pname = $_POST["pname"];
$brand = $_POST["brand"];
$cat = $_POST["cat"];
$color = $_POST["color"];
$size = $_POST["size"];
$desc = $_POST["desc"];





if (empty($pname)) {
    echo ("Please Enter the Product Name");
} elseif (strlen($pname) > 30) {
    echo ("Your Product Name Should be less than 30 characters");
} elseif ($brand == "0") {
    echo ("Please Select Your Brand");
} elseif ($cat == "0") {
    echo ("Please Select Your Category");
} elseif ($color == "0") {
    echo ("Please Select Your color");
} elseif ($size == "0") {
    echo ("Please Select Your Size");
} elseif (empty($desc)) {
    echo ("Please Enter the Description");
} elseif (strlen($desc) > 100) {
    echo ("Your description Should be less than 100 characters");
} else {
    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];



        $rs = Database::search("SELECT * FROM `product` WHERE `name` = '" . $pname . "'");
        $num = $rs->num_rows;

        if ($num > 0) {
            echo ("Product has been Already Registerd!");
        } else {

            $path = "Resources/productimg/" . uniqid() . ".png";
            move_uploaded_file($image["tmp_name"], $path);

            Database::iud("INSERT INTO `product` (`name`, `description`, `path`, `brand_brand_id`, `color_color_id`, `category_category_id`, `size_size_id`) 
            VALUES ('$pname', '$desc', '$path', '$brand', '$color', '$cat', '$size')");

            echo ("success");
        }
    } else {
        echo ("Please Select a Product image");
    }
}
