<?php

session_start();

include "connection.php";

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM `user` INNER JOIN `user_type` 
    ON `user`.`user_type_id` = `user_type`.`utype_id` ORDER BY `user`.`id` ASC");
    $num = $rs->num_rows;
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="Resources/img/icon.png">
        <title>Handy - Admin</title>
    </head>

    <body>

        <div class=" container mt-3">
            <a href="adminDashboard.php"><img src="Resources/img/left-arrow.png" alt="" style="width: 40px;"></a>
        </div>

        <div class=" container mt-3" id="printArea">
            <h2 class="text-center fw-bold text-danger">User Reports</h2>
            <table class=" table shadow mt-5">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>User Type</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <?php 
                
                for ($i=0; $i < $num ; $i++) { 
                    $d = $rs->fetch_assoc();

                    ?>
                    
                    <tr>
                        <td><?php echo($d["id"]) ?></td>
                        <td><?php echo($d["fname"]) ?></td>
                        <td><?php echo($d["lname"]) ?></td>
                        <td><?php echo($d["email"]) ?></td>
                        <td><?php echo($d["mobile"]) ?></td>
                        <td><?php echo($d["type"]) ?></td>
                        <td><?php 
                        
                        if($d["status"] == 1){
                            echo("Active");
                        }else{
                            echo("Inactive");
                        }
                        
                        ?></td>

                        
                        
                    </tr>
                    
                    <?php
                }
                
                ?>
                    
                    
                <tbody>

                </tbody>
            </table>
        </div>

        <div class=" d-flex justify-content-end container mt-5 mb-5">
            <button class=" btn btn-outline-dark col-2" onclick="printDiv();">Print</button>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("You are not a valid Admin");
}


?>