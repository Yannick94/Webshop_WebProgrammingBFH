<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mailer = new PHPMailer();
$mailer->isSMTP();
$mailer->Host = 'smtp.gmail.com';
$mailer->Username = 'hwnswshop';
$mailer->Password = 'Blas4Steb1';
$mailer->SMTPAuth = true;
$mailer->SMTPSecure = 'tls';
$mailer->Port = 587;
$mailer->From = 'hwnswshop@gmail.com';
$mailer->FromName = 'HWnSWShop';
$mailer->addAddress('steve.blaser@bluewin.ch', 'Steve B');
$mailer->Subject = 'Test from PHPMailer';
$mailer->Body = 'This is the message yeah';

if(!$mailer->send())
    echo 'Message could not be sent. -> ' . $mailer->ErrorInfo;
else
    echo 'Message has been sent';
?>