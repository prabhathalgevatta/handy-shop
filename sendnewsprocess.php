<?php
include "connection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$sub = $_POST["sub"];
$con = $_POST["con"];

//echo($sub)

$rs = Database::search("SELECT * FROM `sub`");
$num = $rs->num_rows;

for ($i=0; $i <$num ; $i++) { 
    $d = $rs->fetch_assoc();
}


    
    $mail = new PHPMailer;
    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'oshanaruna88@gmail.com';
    $mail->Password = 'oblokcqvxgfxkbtb';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('oshanaruna88@gmail.com', 'Handy Store News Alert');
    $mail->addReplyTo('oshanaruna88@gmail.com', 'Handy Store News Alert');
    $mail->addAddress($d["email"]);
    $mail->isHTML(true);
    $mail->Subject = $sub;
    $bodyContent = '<div style="max-width: 600px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif; border: 1px solid #ddd; border-radius: 10px; background-color: #f9f9f9;">
        <h2 style="text-align: center; color: #333;">Handy Store</h2>
        <div style="border-bottom: 1px solid #ddd; padding-bottom: 10px; margin-bottom: 20px;">
            <h3 style="color: #007BFF; margin: 0;">'.$sub.'</h3>
            <p style="color: #555; margin: 5px 0 10px;">Date: June 11, 2024</p>
        </div>
        <p style="color: #555; line-height: 1.6;">
            '.$con.'
        </p>
        
        <a href="https://www.example.com" style="display: inline-block; padding: 10px 20px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px; text-align: center; margin-top: 20px;">Read More</a>
    </div>';
    $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo 'sending failed';
        } else {
            echo ("success");
        }

?>