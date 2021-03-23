<html><head><title>Receiving input</title></head>
<body>
    Thank you, got your input: 
    <?php
    //$email = $_POST['email'];
    //$contact = $_POST['contact'];
    $email = $_GET['email'];
    $contact = $_GET['contact'];
    print("<br>Your email address is $email");
    print("<br>Contact preference is $contact");
    ?>
</body></html>