<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../../assets/vendor/PHPMailer/src/Exception.php';
require_once '../../assets/vendor/PHPMailer/src/PHPMailer.php';
require_once '../../assets/vendor/PHPMailer/src/SMTP.php';


function sendmail($s, $m, $e)
{
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.outlook.com';                //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'cook-master-gti@hotmail.com';          //SMTP username
        $mail->Password   = 'Esgi2023';                             //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('cook-master-gti@hotmail.com', 'Cook Master');
        $mail->addAddress($e);       //Add a recipient

        //Content
        $mail->isHTML(true);                                    //Set email format to HTML
        $mail->Subject = $s;
        $mail->Body    = $m;

        $mail->send();

        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function sendmailpdf($html, $recipientEmail, $recipientName, $sujet = 'Facture Cook Master')
{

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.outlook.com';                
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'cook-master-gti@hotmail.com';          
        $mail->Password   = 'Esgi2023';                             
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
        $mail->Port       = 587;                                 

        // Destinataire
        $mail->setFrom('cook-master-gti@hotmail.com', 'Cook Master');
        $mail->addAddress($recipientEmail, $recipientName); 

        $mail->isHTML(true);
        $mail->Subject = $sujet;
        $mail->Body = $html;
        $mail->AltBody = 'Veuillez consulter le contenu HTML de votre facture Cook Master.';

        $mail->send();

        // Message de confirmation
        // echo 'Le courrier électronique a été envoyé avec succès.';
    } catch (Exception $e) {
        echo "Une erreur s'est produite lors de l'envoi du courrier électronique : {$mail->ErrorInfo}";
    }
}
