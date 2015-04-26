<?php 

    
    require("common.php"); 
     
    require("PHPMailer/PHPMailerAutoload.php");
    

if (isset($_POST['email'])){
	
	$query="select * from users where email=:email";
	 $query_params = array( 
            ':email' => $_POST['email'] 
        ); 
	try 
        { 
            // Execute the query against the database 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
	$row = $stmt->fetch(); 
	if($row)
	{
		$pass  =  $row['password'];//FETCHING PASS
		
		$to = $row['email'];
		
		$body  =  "<b>password recovery Script<b></br>
		-----------------------------------------------</br>
		<p>Visit the link to recover your password</p>
		<p>Url : https://www.hospital.dev/resetlink.php</br></p>
		<p>Sincerely,Our Hospital</p>";

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
$Mail->Subject     = 'Password Recovery';
$Mail->ContentType = 'text/html; charset=utf-8\r\n';
$Mail->From        = 'lokesha805@gmail.com'; //Your email adress (Gmail overwrites it anyway)
$Mail->FromName    = 'lokesh';
$Mail->WordWrap    = 900; // RFC 2822 Compliant for Max 998 characters per line

$Mail->addAddress($to); // To
$Mail->isHTML( TRUE );
$Mail->Body    =  $body;
$Mail->AltBody = 'This is a recovery mail';
$_SESSION['user1'] = $row;
		if(!$Mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $Mail->ErrorInfo;
    exit;
    }
$Mail->SmtpClose();
echo 'Message has been sent';
	
		
		
} 
	
	
	else {
	 
	echo "<span style='color:#ff0000;'> Not found your email in our database</span>";
		
		}
	//If the message is sent successfully, display sucess message otherwise display an error message.

		

}
?>
