<?php

namespace ntfemail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

Class Email {
    
    private $mail = \stdClass::class;
    
    public function __construct($smtpDebug, $host, $username, $password, $smtpSecure, $port, $SetFromEmail, $SetFromName ) {
        
        $this->mail = new PHPMailer(true);
        //$this->mail->SMTPDebug = $smtpDebug;                                        // Enable verbose debug output
        $this->mail->isSMTP();                                            // Set mailer to use SMTP
        $this->mail->Host       = $host ;
        $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $this->mail->Username   =  $username;                      // SMTP username
        $this->mail->Password   = $password;                                // SMTP passwor
        $this->mail->Port       = $port; // 587;                                    // TCP port to connect to
        $this->mail->SMTPSecure = $smtpSecure;  //'tls';
        $this->mail->CharSet = 'utf-8';
        $this->mail->setLanguage('br');
        $this->mail->IsHTML(true);
        $this->mail->SetFrom($SetFromEmail,$SetFromName);
        
     
    }
    
    public function sendMail($subject, $body, $replyEmail, $replyName, $addressEmail, $addressName){
        
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;
        //$this->mail->addReplyTo($replyEmail, $replyName);
        $this->mail->addAddress($addressEmail, $addressName);
        
        try {
            $this->mail->send();
            echo "Enviado"; 
        } catch(Exception $e) {
             echo "Erro ao enviar o e-mail: {$this->mail->ErrorInfo} {$e->getMessage()}";
        }
                
        
   
    }
}

