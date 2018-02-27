<?php
/*
Template Name: test
*/
    // $toEmail = "admin@phppot_samples.com";
    // $mailHeaders = "From: " . $_POST["userName"] . "<". $_POST["userEmail"] .">\r\n";
    // if(mail($toEmail, $_POST["subject"], $_POST["content"], $mailHeaders)) {
    //     print "<p class='success'>Mail Sent.</p>";
    // } else {
    //     print "<p class='Error'>Problem in Sending Mail.</p>";
    // }
//die('9');
//$to = 'ravalms@gmail.com';
$subject = $_POST["subject"];
$userEmail = $_POST['userEmail'];
$message = $_POST['message'];
$cuid = $_POST['cuid'];
$luid = $_POST['luid'];

// echo 'current user: '.$cuid.'<br>';
// echo 'List-user: '.$luid.'<br>';


//require_once('../wp-config.php');
//$path = include_once $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php';
//die(23);
// include_once $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php';
// include_once $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php';
// include_once $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php';
global $wpdb;

// $success = $wpdb->insert( 'wp_customuserlist', array(
$success = $wpdb->insert( 'fgfd', array(
        'current_user_id' => $cuid, 
        'list_user_id' => $luid,
        'subject' => $subject, 
        'message' => $message,
        'upload_path' => 'http://test.com/path',
        'status' => 'new',)
        //array( '%s', '%s', '%s', '%s', '%s', '%s' ) 
    );


echo $success;


// $body = 'The email body content';
// $headers = array('Content-Type: text/html; charset=UTF-8');

//  if (wp_mail( $to, $subject, $body, $headers ))
//     {
//     // we're good to go
//     print "<p class='success'>Contact Mail Sent.</p>";
//     }
//     else { 
//     print "<p class='Error'>Problem in Sending Mail.</p>";
//     } 
?>