<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'lib/Exception.php';
require 'lib/PHPMailer.php';
require 'lib/SMTP.php';
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_usuario = $_POST['email'];

    $mail = new PHPMailer(true);

    try {
        
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'yngridlaurindo343@gmail.com'; 
        $mail->Password   = 'vukmfcvcotqqlilg'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

        // Destinatário
        $mail->setFrom('seu-email@gmail.com', 'Sistema de Eventos Tech');
        $mail->addAddress($email_usuario);

        // Conteúdo do E-mail 
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Recuperação de Acesso - TechEvent';
        $mail->Body    = "
            <div style='background:#0f172a; color:white; padding:20px; border-radius:10px; font-family:sans-serif;'>
                <h2 style='color:#38bdf8;'>Olá!</h2>
                <p>Recebemos uma solicitação para recuperar sua senha em nossa plataforma tecnológica.</p>
                <p>Sua senha temporária é: <b>Tech@2026</b></p>
                <br>
                <small>Recomendamos alterar sua senha após o primeiro acesso.</small>
            </div>
        ";

        $mail->send();
        echo "<script>alert('E-mail enviado com sucesso! Verifique sua caixa de entrada.'); window.location.href='index.php';</script>";
        
    } catch (Exception $e) {
        echo "O e-mail não pôde ser enviado. Erro: {$mail->ErrorInfo}";
    }
}
