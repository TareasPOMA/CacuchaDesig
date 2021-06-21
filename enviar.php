<?php 

include("Mailer/src/PHPMailer.php");
include("Mailer/src/SMTP.php");
include("Mailer/src/Exception.php");

try{
//$fromemail = $_POST['correo'];
  $fromemail = "ericmanuel1807@gmail.com";
//$fromname = $_POST['nombre'];
  $fromname = "ERICMINATOR 18";
$host = "smtp.live.com";
$port = "587";
$SMTPAuth = "login";
$SMTPSecure = "tls";
$Password = "ericmanuelmotaramon";
$emailTo = "ericmota268d@gmail.com";
$subject = "Contacto desde nuestra web";

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

$body = "De: $nombre \n";
$body .= "Correo: $correo \n";
$body .= "Telefono: $telefono \n";
$body .= "Mensaje: $mensaje";



    $mail = new PHPMailer\PHPMailer\PHPMailer();
   $mail->isSMTP();


   $mail->SMTPDebug = 0;
   $mail->Host = $host;
   $mail->Port = $port;
   $mail->SMTPAuth = $SMTPAuth;
   $mail->SMTPSecure = $SMTPSecure;
   $mail->Username = $fromemail;
    $mail->Password = $Password;
        

   /*$mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true

        )

        );*/
   $mail->setFrom($fromemail, $fromname);
        $mail->addAddress($emailTo);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
   if(!$mail->send()){
echo "Correo no enviado"; die();
   }
 echo "Correo enviado con exito!"; die();

} catch(Exception $e){

}

?>