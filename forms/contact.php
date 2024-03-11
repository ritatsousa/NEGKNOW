<?php
$to = 'challengnegknow@gmail.com';
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$from = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : false;
$subject = isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : '';
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

if ($from) {
    $headers = [
        'From' => ($name ? "<$name> " : '') . $from,
        'X-Mailer' => 'PHP/' . phpversion(),
        'Content-Type' => 'text/plain; charset=utf-8', // Adjust content type as needed
    ];

    $fullMessage = $message . "\r\n\r\nfrom: " . $_SERVER['REMOTE_ADDR'];

    if (mail($to, $subject, $fullMessage, $headers)) {
        die('OK');
    } else {
        die('Error sending email');
    }
} else {
    die('Invalid address');
}
?>
