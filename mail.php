<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);             
$username = ''; //provide mail id
$password = ''; //password

try {
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP serversxx
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $username;                 // SMTP username
    $mail->Password = $password;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->SMTPDebug = false;
	$mail->do_debug = 0;
    //Recipients
    $mail->setFrom($username);
    $mail->addAddress($email);     
    
    $mail->isHTML(true); 
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = $altbody;
    if($attach)
    	$mail->addAttachment('dashboard/pdf/user.pdf', $uname.'.pdf');    

    $mail->send();
    $attach = true;
} catch (Exception $e) {
	$attach = false;
}