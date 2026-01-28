<?php
/**
 * Demo data for the invoice emailer project.
 * No database, no Composer — pure PHP.
 */

// Demo user
$demo_user = [
    'name'  => 'Jean Dupont',
    'email' => 'jean.dupont@example.com'
];

// Demo car
$demo_car = [
    'plakett' => 'AB-123-CD'
];

// Demo service
$demo_service = [
    'name'  => 'Diagnostic automobile complet',
    'price' => 49.90
];

// Demo invoice metadata
$demo_invoice = [
    'issuer_name'   => 'Breizh Voiture Diag',
    'issuer_address'=> '12 Rue de Bretagne, 35137 Bédée, France',
    'issuer_email'  => 'administrator@breizhvoiturediag.fr',
    'siret'         => '993 482 025 000 18',

    'place'         => 'Bédée',
    'date'          => date('Y-m-d'),

    'payment_id'    => 'INV-DEMO-' . rand(10000, 99999)
];

// A számla HTML sablon számára összeállított változó
$invoice_data = [
    'user'    => $demo_user,
    'car'     => $demo_car,
    'service' => $demo_service,
    'invoice' => $demo_invoice
];