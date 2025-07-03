<?php

// Get email address
require_once 'config.php';

// Ensures no one loads page and does simple spam check
if( isset($_POST['name']) && empty($_POST['spam-check']) ) {
	
	// Declare our $errors variable we will be using later to store any errors
	$error = '';
	
	// Setup our basic variables
	$input_name = strip_tags($_POST['name']);
	$input_email = strip_tags($_POST['email']);
	$input_subject = strip_tags($_POST['subject']);
	$input_message = strip_tags($_POST['message']);
	
	// We'll check and see if any of the required fields are empty
	if( strlen($input_name) < 1 ) $error['name'] = 'お名前をご入力下さい。';
	if( strlen($input_message) < 1 ) $error['message'] = 'お問い合わせ内容をご入力下さい。';

	// Make sure the email is valid
	if( !filter_var($input_email, FILTER_VALIDATE_EMAIL) ) $error['email'] = '有効なメールアドレスをご入力下さい。';

	// Set a subject & check if custom subject exist
	$subject = "Webサイトより問合せ： $input_name 様";
	if( $input_subject ) $subject .= ": $input_subject";
	
//	$message = "$input_message\n";
//	$message .= "\n---\nこのメールは制御情報工学科サイトの\nお問い合わせフォームより送信されました。";

	$message = "お名前：$input_name\n";
	$message .= "メールアドレス：$input_email\n";
	$message .= "お問い合わせ内容：\n";
	$message .= "$input_message\n";
	$message .= "---\n\n";
	$message .= "このメールは制御情報工学科サイトの\nお問い合わせフォームより送信されました。";

	// Now check to see if there are any errors 
	if( !$error ) {

		// No errors, send mail using conditional to ensure it was sent
		if( mail($your_email_address, $subject, $message, "From: $input_email") ) {
			echo '<p class="success">メールが送信されました。<br />お問い合わせありがとうございました。<br /></p>';
		} else {
			echo '<p class="error">送信エラーが発生しました。<br />もう一度送信して下さい。</p>';
		}
		
	} else {
		
		// Errors were found, output all errors to the user
		$response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
		$response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
		$response .= (isset($error['message'])) ? $error['message'] . "<br /> \n" : null;

		echo "<p class='error'>$response</p>";
		
	}
	
} else {

	die('このページへの直接のアクセスは許可されていません。');

}