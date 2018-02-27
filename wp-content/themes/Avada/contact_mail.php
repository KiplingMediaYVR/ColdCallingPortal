<?php
    // $toEmail = "admin@phppot_samples.com";
    // $mailHeaders = "From: " . $_POST["userName"] . "<". $_POST["userEmail"] .">\r\n";
    // if(mail($toEmail, $_POST["subject"], $_POST["content"], $mailHeaders)) {
    //     print "<p class='success'>Mail Sent.</p>";
    // } else {
    //     print "<p class='Error'>Problem in Sending Mail.</p>";
    // }
//die('9');
$to = 'ravalms@gmail.com';
$subject = $_POST["subject"];
$body = 'The email body content';
$headers = array('Content-Type: text/html; charset=UTF-8');

 if (wp_mail( $to, $subject, $body, $headers ))
    {
    // we're good to go
    print "<p class='success'>Contact Mail Sent.</p>";
    }
    else { 
    print "<p class='Error'>Problem in Sending Mail.</p>";
    } 
?>