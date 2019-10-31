<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\Users\Ravi\xampp\htdocs\Leave-Management\composer\vendor\autoload.php';
function mailer($recipient,$msg){
    $status = false;
    $mail = new PHPMailer;                              // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'leave.notif@gmail.com';                 // SMTP username
    $mail->Password = 'Leave123.';                           // SMTP password
    $mail->Port = 465;                                    // TCP port to connect to
    $mail->SMTPSecure = 'ssl';

    $mail->From = 'leave.notif@gmail.com';
    $mail->FromName = 'Admin';
    $mail->addAddress($recipient);               // Name is optional

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Leave Request Status For Employee Registered with '.$recipient;
    $mail->Body    = $msg;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        $status = false;
    } else {
        $status = true;
    }
    return $status;
}
?>
