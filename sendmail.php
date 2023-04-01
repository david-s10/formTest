<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail -> CharSet = 'UTF-8';
$mail -> IsHTML(true);

$mail -> setFrom('dav@dev.com', 'david po jizni')

$mail -> addAddress('dav@dev.com');

$mail -> Subject = 'privet eto ya'

$body = '<h1>hi</h1>'

if(trim(!empty($_POST['name']))){
    $body.='<p><strong>Name:</strong> '.$_POST['name'].'</p>'
}
if(trim(!empty($_POST['email']))){
    $body.='<p><strong>email:</strong> '.$_POST['email'].'</p>'
}
if(trim(!empty($_POST['Phone']))){
    $body.='<p><strong>Phone:</strong> '.$_POST['Phone'].'</p>'
}

$mail ->Body = $body;

if (!$mail->send()) {
    $message = 'eRRoR';
}else {
    $message = 'send';
}

$response = ['message' => $message];

header('Content-type': application/json);
echo json_encode($response);
