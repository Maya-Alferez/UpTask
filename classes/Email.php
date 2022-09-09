<?php

namespace Classes;
use PHPMailer\PHPMailer\PHPMailer;

class Email {
    protected $email;
    protected $nombre;
    protected $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'e746540bf3f503';
        $mail->Password = 'd603af7d35831c';

        $mail->setFrom('cuentas@cattrello.com');
        $mail->addAddress('cuentas@cattrello.com', 'cattrello.com');
        $mail->Subject = 'Confirm your account';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hi there ". $this->nombre . "</strong> Have you created your account in CatTrello?, only have to confirm in the following link</p>";
        $contenido .= "<p><a href='http://localhost:3000/confirmar?token=" .$this->token . "'>Confirm your account</a></p>";
        $contenido .= "<p> If you did not create this account, you can ignore this message.</p>";
        $contenido .= '</html>';

        $mail->Body = $contenido;

        //Enviar el email
        $mail->send();
    }
}

