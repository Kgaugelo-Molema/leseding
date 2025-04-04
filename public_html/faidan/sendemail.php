<?php

// Define some constants
define( "RECIPIENT_NAME", "Faidan" );
define( "RECIPIENT_EMAIL", "info@faidan.co.za" );

// Reads the form values
$success = false;
$userName = isset( $_POST['fname'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['fname'] ) : "";
$lastName = isset( $_POST['lname'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['lname'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$userPhone = isset( $_POST['phone'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Phone:|Content-Type:)/", "", $_POST['message'] ) : "";

// If all values exist, send the email
if ( $fName && $ltName  $senderEmail && $userPhone && $message) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $userName . "";
  $msgBody = " First Name: ". $fName .  " Email: ". $senderEmail . " Phone: ". $userPhone . " Message: " . $message . "";
  $success = mail( $recipient, $headers, $msgBody );

  //Set Location After Successsfull Submission
  header('Location: contact.php?message=Successfull');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: contact.php?message=Failed');	
}

?>