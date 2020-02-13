<?php
require 'PHPMailer/PHPMailerAutoload.php';

$con=mysqli_connect("localhost","root");

mysqli_select_db($con,"e-vault");

if( isset($_POST["share_file"])){

	$sent_to=$_POST['sent_email'];
    $Username=$_SESSION['user'];
    // $sent_from=$_SESSION['email'];//err
  
    $files_name=$_POST['files_name'];
    $user_id=$_SESSION['user_id'];
    $files_id=$_POST['files_id'];

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

//Set the hostname of the mail server
//$mail->Host = 'smtp.gmail.com';
$mail->Host = 'ssl://smtp.gmail.com:465';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "projectbca2018@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "project1#";

//Set who the message is to be sent from
$mail->setFrom('m@gmail.com',$Username );

//Set an alternative reply-to address
$mail->addReplyTo('noreply@evault.com',$Username);

//Set who the message is to be sent to
$mail->addAddress($sent_to, '');

//Set the subject line
$mail->Subject = ''.$Username.' shared a E-vault document with you';

$time = time();

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML('<font size="4">Hello,<br><br>

     '.$Username.' has shared the following E-vault document with you.<br>
      <a href="http://localhost/e-docs/user/share_view.php?view='.$files_name.'&time='.$time.'" > Click here to access document</a><br><br>
      
     Have a good day!<br><br>
 
    The E-vault team<br><br>
   
    
    ----------<br><br>

Don’t have a  account? <a href="http://localhost/e-docs/user/register.php">Signup now</a></font>');

//$mail->Body    = '';

//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';

//send the message, check for errors
if (!$mail->send()) {
  // $mail->ErrorInfo;
    echo "<script type='text/javascript'>alert('Mailer Error:');</script>";
} else {

     mysqli_query($con,"INSERT into files_share (user_id,files_id,files_name,sent_to) values('".$user_id."','".$files_id."','".$files_name."','".$sent_to."')") or die ("Cannot query with database table");
    
    echo "<script type='text/javascript'>alert('Message sent!');</script>";
}



}
?>