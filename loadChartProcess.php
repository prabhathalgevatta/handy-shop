<?php

include "connection.php";

$rs = Database::search(("SELECT `product`.`id`,`product`.`name`, SUM(`order_item`.oi_qty) AS `total_sold` FROM `order_item`
INNER JOIN `stok` ON `order_item`.`stok_stok_id` = `stok`.`stok_id` INNER JOIN `product` ON `stok`.`product_id` = `product`.`id`
GROUP BY `product`.`id`,`product`.`name` ORDER BY `total_sold` DESC LIMIT 5"));

$num = $rs->num_rows;

$labels = array();
$data = array();

for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc();

    $labels[] = $d["name"];
    $data[] = $d["total_sold"];
}

$json = array();
$json["labels"] = $labels;
$json["data"] = $data;

echo json_encode($json);
