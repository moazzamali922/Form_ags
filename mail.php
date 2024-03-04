<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $youremail = 'info@agsclothing.net';

    $body = "You have got a new message from the contact form on your website:\n";

    foreach ($_POST as $k => $v) {
        $body .= "$k: $v\n";
    }

    if ($_POST['email'] && !preg_match("/[\r\n]/", $_POST['email'])) {
        $headers = "From: $_POST[email]";
    } else {
        $headers = "From: $youremail";
    }

    mail($youremail, 'Message from AGS Clothing', $body, $headers);
    header('location:thankyou.php');
}
