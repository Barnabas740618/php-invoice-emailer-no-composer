<?php
/**
 * Invoice HTML template.
 * Uses $invoice_data from sample_data.php
 */

if (!isset($invoice_data)) {
    die('Invoice data not found. Did you include sample_data.php?');
}

$user    = $invoice_data['user'];
$car     = $invoice_data['car'];
$service = $invoice_data['service'];
$inv     = $invoice_data['invoice'];

// Kényelmes rövidítések
$userName       = htmlspecialchars($user['name']);
$userEmail      = htmlspecialchars($user['email']);
$carPlakett     = htmlspecialchars($car['plakett']);
$serviceName    = htmlspecialchars($service['name']);
$servicePrice   = (float)$service['price'];

$issuerName     = htmlspecialchars($inv['issuer_name']);
$issuerAddress  = htmlspecialchars($inv['issuer_address']);
$issuerEmail    = htmlspecialchars($inv['issuer_email']);
$siret          = htmlspecialchars($inv['siret']);
$place          = htmlspecialchars($inv['place']);
$date           = htmlspecialchars($inv['date']);
$paymentId      = htmlspecialchars($inv['payment_id']);

// A számla HTML-je egy változóban, hogy e-mailben is felhasználható legyen
$invoice_html = '
<div style="max-width:1000px; padding:30px; font-size:16px; margin:0 auto; border:1px solid #ccc; font-family: sans-serif; background:white;">
    <table width="100%" style="margin-bottom:40px; font-size:18px; border-collapse: collapse;">
        <tr>
            <td width="50%" style="padding: 0;">
                <strong>Issuer:</strong><br>
                '.$issuerName.'<br>
                '.$issuerAddress.'<br>
                Email: '.$issuerEmail.'<br>
                Siret: '.$siret.'
            </td>
            <td width="50%" style="text-align:right; padding: 0;">
                <strong>Customer:</strong><br>
                '.$userName.'<br>
                Email: '.$userEmail.'<br>
                Rendszam / Car: '.$carPlakett.'<br>
                Facture Id: '.$paymentId.'
            </td>
        </tr>
    </table>

    <div style="text-align:center; margin-bottom:30px;">
        <h1 style="font-size:42px; text-decoration:underline; margin-bottom:15px; color:#333;">Facture</h1>
        <h2 style="font-size:28px; font-weight:bold; text-decoration:underline; color:#555;">'.$serviceName.'</h2>
    </div>

    <div style="border:1px solid #eee; padding:20px; border-radius:8px;">
        <table width="100%" style="border-collapse: collapse;">
            <tr>
                <td style="font-weight:600; padding: 5px 0;">Service:</td>
                <td style="text-align:right; padding: 5px 0;">'.$serviceName.'</td>
            </tr>
            <tr>
                <td style="font-weight:600; padding: 5px 0;">Price (Net):</td>
                <td style="text-align:right; padding: 5px 0;">€'.number_format($servicePrice, 2).'</td>
            </tr>
            <tr>
                <td style="font-weight:600; padding: 5px 0; border-bottom:1px solid #ddd;">VAT (TVA):</td>
                <td style="text-align:right; padding: 5px 0; border-bottom:1px solid #ddd;">€0.00 (TVA exempt)</td>
            </tr>
            <tr>
                <td style="font-weight:bold; font-size:20px; padding-top: 10px;">Total:</td>
                <td style="text-align:right; font-weight:bold; font-size:20px; padding-top: 10px;">€'.number_format($servicePrice, 2).'</td>
            </tr>
        </table>
    </div>

    <table width="100%" style="margin-top:60px; margin-bottom:30px; font-size:18px; border-collapse: collapse;">
        <tr>
            <td width="50%" style="text-align:left; padding: 0;">
                <strong>Issuer Signature:</strong><br><br><br>____________________
            </td>
            <td width="50%" style="text-align:right; padding: 0;">
                <strong>Customer Signature:</strong><br><br><br>____________________
            </td>
        </tr>
    </table>

    <div style="text-align:center; margin-top:15px; font-style:italic; font-size:16px;">
        Place and Date of Issue:<br>
        '.$place.', '.$date.'
    </div>

    <div style="text-align:center; margin-top:20px; font-size:14px; color:#999;">
        Payment ID: '.$paymentId.'
    </div>
</div>';