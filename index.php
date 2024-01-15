<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer();

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sender mail';
    $mail->Password = 'keuu lmya ivya crpl';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('sender mail', 'header');
    $mail->addAddress('buyer', 'header');

    $mail->addAttachment('/var/tmp/file.tar.gz');
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');

    $mail->isHTML(true);
    $mail->Subject = 'header';
    $mail->Body = '<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,400&family=Poppins:ital,wght@0,500;1,200&display=swap");
    
            *{
                font-family: "Poppins", sans-serif;
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }
    
            .container{
                display: grid;
                width: 40%;
                height: 60vh;
                place-items: center;
                text-align: center;
                padding: 0 50px 0 50px;
                background-color: #F5F5F5;
                border-radius: 20px;
                padding-top: 20px;
            }
    
            .head{
                width: 100%;
                height: 9vh;
                background-color: brown;
                
                
            }
        </style>
    
    </head>
    
    <body>
    
        <div class="container">
            <div class="head">
    
                <h1 style="line-height: 9vh; color: #fff;">Merhaba</h1>
            </div>
    
            <p style="font-weight: 100;">Bu işlem, güvenliğinizi artırmak ve hesabınızı korumak amacıyla yapılmaktadır. Tek kullanımlık şifre, her
                seferinde yeni bir güvenlik kodu üretir ve bu sayede hesabınıza yetkisiz erişimi önler.
                <br><br>
                Aşağıda, NuriCanST üyelerine tek kullanımlık şifrenizi Yazarak Hesabınıza Giriş Yapabilirsiniz.
            </p>
    
            <span>Şifreniz: </span>
        </div>
    
    </body>
    
    </html>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';



    $mail->send();




    if ($mail->send() == true) {
        echo 'Message has been sent';
    } else {
        echo "olmado {$mail->ErrorInfo}";
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>

