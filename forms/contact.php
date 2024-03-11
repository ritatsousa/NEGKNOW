<?php
$to = 'challengnegknow@gmail.com';
$name = $_POST['name'];
$from = $_POST['email'];
$subject = $_POST['subject'];
$message =  $_POST['message'];

if (filter_var($from, FILTER_VALIDATE_EMAIL)) {
    $headers = ['From' => ($name?"<$name> ":'').$from,
            'X-Mailer' => 'PHP/' . phpversion()
           ];

    mail($to, $subject, $message."\r\n\r\nfrom: ".$_SERVER['REMOTE_ADDR'], $headers);
    die('OK');
    
} else {
    die('Invalid address');
}
?>
