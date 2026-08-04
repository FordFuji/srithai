<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require FCPATH.'vendor/autoload.php';

define('HOST', 'smtp.gmail.com');
// define('USERNAME', 'noreply.srithai@gmail.com');
// define('PASSWORD', 'crqnxpwuyxhpxctq');
// define('USERNAME', 'info@srithaionline.com');
// define('PASSWORD', 'Pass@wordS1');
// define('USERNAME', 'srithaisuperware.st@gmail.com');
// define('PASSWORD', 'nzsascvgkauzmwic');
// define('USERNAME', 'e-com@srithaionline.com');
// define('PASSWORD', 'Pass@word1d$');
// define('SMTPSECURE', 'tls');
// define('PORT', 587);
define('USERNAME', 'srithaisuperware.pcl@gmail.com');
define('PASSWORD', 'qpdrtgkwpcdyzicn');
define('SMTPSECURE', 'ssl');
define('PORT', 465);

function send_email($sender = array(), $subject, $message, $from_email, $from_name, $file_attachment = array(), $addbcc = array()) {

	$mail = new PHPMailer; 

	$mail->SMTPOptions = array(
	    'ssl' => array(
	        'verify_peer' => false,
	        'verify_peer_name' => false,
	        'allow_self_signed' => true
	    )
	);

	//Enable SMTP debugging. 
	//$mail->SMTPDebug = 2;                               
	//Set PHPMailer to use SMTP.
	$mail->isSMTP();            
	//Set SMTP host name                          
	$mail->Host = HOST;
	//Set this to true if SMTP host requires authentication to send email
	$mail->SMTPAuth = true;                          
	//Provide username and password     
	$mail->Username = USERNAME;                 
	$mail->Password = PASSWORD;                           
	//If SMTP requires TLS encryption then set it
	$mail->SMTPSecure = SMTPSECURE;                           
	//Set TCP port to connect to 
	$mail->Port = PORT;   
	
	$mail->CharSet = 'utf-8';                                

	$mail->From = $from_email;
	$mail->FromName = $from_name;

	if(!empty($sender)) {
		foreach($sender as $arr) {
			if($arr != '') {
				$mail->addAddress($arr);     // Add a recipient			
			}
		}
	}
	
	if(!empty($addbcc)) {
		foreach($addbcc as $arr) {
			if($arr != '') {
				$mail->AddBCC($arr);     // Add a recipient			
			}
		}
	}

	//$mail->AddBCC('sitiporn@orange-thailand.com', 'Ford');
	
	/*if($_SERVER['SERVER_NAME'] == 'localhost') {
		$mail->AddBCC('sitiporn@orange-thailand.com', 'Ford');     // Add a recipient			
	} else {
		$mail->AddBCC('prow@tresfashion.co', 'K.Prow');     // Add a recipient
		$mail->AddBCC('ploy@tresfashion.co', 'K.Ploy');     // Add a recipient
	}*/
	
	if(!empty($file_attachment)) {
		foreach($file_attachment as $arr) {
			if($arr != '') {
				$mail->AddAttachment($arr);		
			}
		}	
	}

	$mail->isHTML(true);

	$mail->Subject = $subject;
	$mail->Body = $message;
	//$mail->AltBody = "This is the plain text version of the email content";

	
	if(!$mail->send()) {
		echo 'Message could not be sent<br>';
		echo 'Mailer Error: ' . $mail->ErrorInfo.'<br>';
	} else {
		//echo '<span style="color: white;">Message has been sent '.date('Y-m-d H:i:s').'<br></span>';
	}
	
	$mail->ClearAddresses();
}
?>