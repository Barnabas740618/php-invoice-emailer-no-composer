<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// PHPMailer manuális include
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

// Demo adatok és számla HTML
require_once 'sample_data.php';
require_once 'invoice_template.php';

// A demo user adatai POST-ból vagy fallbackből
$userEmail = $_POST['userEmail'] ?? $demo_user['email'];
$userName  = $_POST['userName']  ?? $demo_user['name'];

// PHPMailer példány
$mail = new PHPMailer(true);

try {
    // SMTP kikapcsolva DEMO módban
    // Ha valaki élesben akarja használni, a README-ben leírt módon bekapcsolhatja
    $mail->isSMTP();
    $mail->Host       = 'smtp.example.com';   // DEMO placeholder
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your-email@example.com'; // DEMO placeholder
    $mail->Password   = 'your-password';          // DEMO placeholder
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;
    $mail->CharSet    = 'UTF-8';

    // Feladó
    $mail->setFrom('no-reply@example.com', 'Invoice Demo');

    // Címzett
    $mail->addAddress($userEmail, $userName);

    // Tárgy
    $mail->Subject = 'Your Invoice (Demo)';

    // HTML törzs
    $mail->isHTML(true);
    $mail->Body = '
        <p>Hello '.$userName.',</p>
        <p>This is a demo invoice sent using PHPMailer without Composer.</p>
        '.$invoice_html.'
        <p>Best regards,<br>Invoice Demo System</p>
    ';

    $mail->AltBody = 'Your invoice is attached in HTML format.';

    // DEMO: nem küldünk valódi e-mailt
    // A send() meghívható, ha valaki beállítja az SMTP-t
    // $mail->send();

    echo "DEMO MODE: The invoice email would be sent to: $userEmail";

} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}