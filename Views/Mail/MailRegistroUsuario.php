<?php

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

/*require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';*/

/*use phpmailer\phpmailer\src\PHPMailer;
use phpmailer\phpmailer\src\Exception;*/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader (OJO esto es solo sise usa composer)
//require 'vendor/autoload.php';
 
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;                  // Enable verbose debug output(VA 0 o 2)
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'eventoscasadecristal@gmail.com';        // SMTP username
    $mail->Password   = 'uxwhhzfczxygzvxk';//'Eventos2020';     // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('eventoscasadecristal@gmail.com', 'Eventos casa de cristal');
    $mail->addAddress($_REQUEST['Email']);     // Add a recipient
    /*$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');*/

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('Assets/img/Logo.jpeg', 'ECDC.jpeg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Bienvenido';
    $mail->Body    = '
    <section>
        <div class="section-correo-bienvenida" style="margin: auto;height: auto;width: 60%;margin-top: 30px; font-size: 1rem; font-weight: 400; line-height: 1.5; color: #212529; text-align: left; background-color: #fff;">
            <h1 class="text-center" style="text-align: center!important; font-size: 2.5rem; margin-bottom: .5rem; font-family: inherit; font-weight: 500; line-height: 1.2; color: inherit;">
                #eventoscasadecristal
            </h1>
            <br>
            <p>! Hola '.$_REQUEST['nombre'].' ¡</p>
            <p>Te damos la bienvenida a nuestro equipo. A continuacion encontraras la informacion para ingresar al sistema</p>
            <br>
            <table class="table text-center" style="width: 100%; max-width: 100%; margin-bottom: 1rem; background-color: transparent; border-collapse: collapse; text-align: center!important;border: 2px solid #212529;">
                <thead class="thead-dark">
                    <tr>
                        <th style="color: #fff; background-color: #212529; border-color: #32383e; vertical-align: bottom; border-bottom: 2px solid #dee2e6; padding: .75rem;                     vertical-align: top;
                        border-top: 1px solid #dee2e6;">
                            Usuario
                        </th>
                        <th style="color: #fff; background-color: #212529; border-color: #32383e; vertical-align: bottom; border-bottom: 2px solid #dee2e6; padding: .75rem;                     vertical-align: top;
                        border-top: 1px solid #dee2e6;">
                            Clave
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: .75rem; vertical-align: top; border-top: 1px solid #dee2e6;">
                            '.$dataUser->USUARIO_SISTEMA.'
                        </td>
                        <td style="padding: .75rem; vertical-align: top; border-top: 1px solid #dee2e6;">
                            '.$dataUser->CLAVE.'
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    ';
    /*$mail->AltBody = 'Mensaje alternativo';*/

    $mail->send();
    echo 'El usuario y clave se enviaron al correo';
} catch (Exception $e) {
    echo "Error al enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
}

?>