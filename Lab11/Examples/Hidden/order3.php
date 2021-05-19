<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <?php
            $sample_hidden = $_POST['sample_hidden'];
            $quantity = $_POST['$quantity'];
            $product = $_POST['product'];
            $name = $_POST['name'];
            $code = $_POST['code'];
            $email = 'orders@hardwareville.com';
            $body = "New Order: Product=$product Number=$quantity Cust=$name Code=$code";
            print '<font size=4>';
            print "<br>Sending e-mail to order handling department at $email ... </font>";
            print "<br>The e-mail body is <i>: $body. </i>";
            $from = 'harry@hardwareville.com';
            $subject = "New order from $name";
            mail($email, $subject, $body, "From: $from");
            print '<br><font color="blue"> E-mail sent. Thanks for ordering. </font>';
            print "<br>By the way, sample hidden=$sample_hidden";
        ?>
    </body>
</html>