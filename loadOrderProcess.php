<?php

include "connection.php";

$rs = Database::search("SELECT * FROM `order_history`");



$num = $rs->num_rows;

for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc();


?>
    <tr>
        <th scope="row"><?php echo $d["ohid"] ?></th>
        <td><?php echo $d["order_id"] ?></td>
        <td><?php echo $d["order_date"] ?></td>
        <td><?php echo $d["amount"] ?></td>
        <td><?php echo $d["user_id"] ?></td>
        
    </tr>

<?php
}


?>