<?php
// Pear Mail Library
require_once "Mail.php";

$from = '<testing@gmail.com>';
$to = '<rajas.joshi@gmail.com>';
$subject = 'This email has been sent from GoDaddy using PHP via an SMTP link to gmail.';
$body = "Hi,\n\nHow are you?";

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'car.jayashree@gmail.com',
        'password' => 'MonSekot123'
    ));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Message successfully sent!</p>');
}
?>