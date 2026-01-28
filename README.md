# PHP Invoice Emailer – No Composer, No Framework

A clean and simple demonstration of how to generate and email an invoice using **pure PHP**, **PHPMailer (manual include)**, and **no Composer**, **no frameworks**, and **no database**.

This project is ideal for:
- learning how to send HTML emails with PHPMailer without Composer  
- understanding how to generate an invoice in pure PHP  
- using a clean HTML template for printing or email  
- demonstrating lightweight PHP architecture on GitHub  

---

## 🚀 Features

- ✔ Pure PHP – no Composer, no frameworks  
- ✔ PHPMailer included manually (`/PHPMailer/src/`)  
- ✔ Demo invoice with sample data  
- ✔ HTML invoice preview (`index.php`)  
- ✔ Email sending logic (`send_invoice.php`)  
- ✔ Safe for GitHub – no passwords, no secrets  
- ✔ Easy to extend into a real invoicing system  

---

---

## 🖥 How to Run

1. Clone or download the repository  
2. Place it in your local PHP environment (XAMPP, WAMP, Laragon, etc.)  
3. Open in browser:


You will see the invoice preview and a button to send it by email.

---

## ✉ Email Sending (Demo Mode)

By default, **no real email is sent**.

To enable real SMTP sending:

1. Open `send_invoice.php`
2. Replace the placeholder SMTP settings:

```php
$mail->Host       = 'smtp.yourprovider.com';
$mail->Username   = 'your-email@example.com';
$mail->Password   = 'your-password';
$mail->setFrom('your-email@example.com', 'Your Name');

$mail->send();
invoice_template.php
sample_data.php




