<?php
$to = "me@gmail.com";
$subject = "email test verification";
$body = "email!!! verification code sent";
$from = "mishackhananiahs@gmail.com" . "\r\n" . 
"x-mailer: PHP/" . phpversion();
if(mail($to, $subject, $body, $from)){
    echo "email verification sent to $to";
} else {
    echo "failed while sending email verification code";
}
?>
