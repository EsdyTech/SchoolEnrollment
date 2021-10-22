<?php
require_once ('../php-mailer/PHPMailerAutoload.php');

function sendmail($subject, $body, $emailAddress){

      //The Email Configuraton Class
      $mail = new PHPMailer();
      $mail->isSMTP();
      $mail->SMTPAuth = true;
      $mail->SMTPSecure='ssl';
      $mail->Host='smtp.googlemail.com';
      $mail->Port = '465';
      $mail->isHTML();
      $mail->Username ='sawdykdevtest@gmail.com';
      $mail->Password ='sawdykdevtest@2020';
      $mail->SetFrom('no-reply@howcode.org');
      $mail->Subject = $subject;
      $mail->Body = $body;
      $mail->AddAddress($emailAddress); //delivery email Address
      
      //Handles Success or Failure Response
      if(!$mail->Send()) 
      {
          return false;
      // $msg = " An Error Ocuured while trying to send Mail, Kindly Contact Administrator. Thanks!";
      } 
      else 
      {
        return true;
      }

}

?>