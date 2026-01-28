<?php
require_once 'sample_data.php';
require_once 'invoice_template.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice Demo – No Composer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 40px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .email-btn {
            display: inline-block;
            padding: 12px 20px;
            background: #0078ff;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            margin-top: 25px;
            font-size: 18px;
        }
        .email-btn:hover {
            background: #005fcc;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Invoice Preview</h1>
    <p>This is a demo invoice generated with pure PHP, without Composer or external frameworks.</p>

    <hr><br>

    <!-- A számla HTML kimenete -->
    <?php echo $invoice_html; ?>

    <br><hr><br>

    <!-- E-mail küldés gomb -->
    <form action="send_invoice.php" method="post">
        <input type="hidden" name="userEmail" value="<?php echo $demo_user['email']; ?>">
        <input type="hidden" name="userName" value="<?php echo $demo_user['name']; ?>">
        <button type="submit" class="email-btn">Send Invoice by Email</button>
    </form>
</div>

</body>
</html>