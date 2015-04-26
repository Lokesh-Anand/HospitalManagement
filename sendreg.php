<?php 

    
    require("common.php"); 
     
    require("PHPMailer/PHPMailerAutoload.php");
    

		
		$name=$_POST['new_name'];
		$age=$_POST['new_age'];
		$qual=$_POST['new_qual'];
		$dept=$_POST['new_role'];
		$add=$_POST['new_address'];
		$mail=$_POST['new_mail'];
		$gender=$_POST['new_gender'];
		$contact=$_POST['new_con'];
		$to = "lokesha805@gmail.com";
		$fileName=$_FILES['new_pic']['name'];
		$tmpName=$_FILES['new_pic']['tmp_name'];
		$fileSize=$_FILES['new_pic']['size'];
		$fileType=$_FILES['new_pic']['type'];
		
		$body="<p>Name:$name</p> <p>Age:$age</p><p>qual:$qual</p><p>department:$dept</p><p>Address:$add</p>
		<p>Email:$mail</p><p>gender:$gender</p><p>contact:$contact</p>";
		$Mail = new PHPMailer();

$Mail->IsSMTP(); // Use SMTP
$Mail->Host        = "smtp.gmail.com"; // Sets SMTP server for gmail
$Mail->SMTPDebug   = 0; // 2 to enable SMTP debug information
$Mail->SMTPAuth    = TRUE; // enable SMTP authentication
$Mail->SMTPSecure  = "tls"; //Secure conection
$Mail->Port        = 587; // set the SMTP port to gmail's port
$Mail->Username    = 'lokesha805'; // gmail account username
$Mail->Password    = '4rfv5tgb6yhn'; // gmail account password
$Mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 =   low)
$Mail->CharSet     = 'UTF-8';
$Mail->Encoding    = '8bit';
$Mail->Subject     = 'Recruitment Application';
$Mail->ContentType = 'text/html; charset=utf-8\r\n';
$Mail->From        = 'lokesha805@gmail.com'; //Your email adress (Gmail overwrites it anyway)
$Mail->FromName    = 'lokesh';
$Mail->WordWrap    = 900; // RFC 2822 Compliant for Max 998 characters per line

$Mail->addAddress($to); // To
$Mail->isHTML( TRUE );
$Mail->Body    =  $body;

$Mail->AltBody = 'This is a recovery mail';
if (isset($_FILES['new_pic']) &&
    $_FILES['new_pic']['error'] == UPLOAD_ERR_OK) 
	{
    $Mail->AddAttachment($tmpName,
                         $fileName);
    }
		if(!$Mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $Mail->ErrorInfo;
    exit;
    }
$Mail->SmtpClose();
echo 'Message has been sent';
 header("Location: index.php"); 	
		
?>
