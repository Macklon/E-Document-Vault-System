<?php
// Turn off all error reporting
error_reporting(0);

require 'PHPMailer/PHPMailerAutoload.php';

$con=mysqli_connect("localhost","root");

mysqli_select_db($con,"e-vault");

// if( isset($_POST["share_file"])){

if(isset($_POST["multi_share"])){//to run PHP script on submit




	// $sent_to=$_POST['sent_email'];
  $sent_to="macklon07.fernandez@gmail.com";
    $Username=$_SESSION['user'];
  // $Username="mack";
    // $sent_from=$_SESSION['email'];//err
  
    // $files_name=$_POST['files_name'];

    $user_id=$_SESSION['user_id'];
    // $files_id=$_POST['files_id'];

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
$mail->msgHTML('test');

// $disp="SELECT file_name FROM files_upload where user_id='23' ";
//     $result=mysqli_query($con,$disp);
//     while ($row=mysqli_fetch_array($result)) {
// for($i=0; $i<count($row['file_name']); $i++){ 
//   echo count($row['file_name']);
//   $folder="images/";
//   $files_name = $row['file_name'];
//   echo $files_name;
//   $mail->AddAttachment("$folder/$files_name",[$i]);
// }
// }

// $disp="SELECT file_name FROM files_upload where user_id='23' ";
//     $result=mysqli_query($con,$disp);

//     while ($row=mysqli_fetch_array($result)) {
if(!empty($_POST['check_list'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){
// echo $selected."</br>";
// }
// }
for($i=0; $i<count($selected); $i++){ 
  $folder="images/";
  $files_name = $selected;
  $mail->AddAttachment("$folder/$files_name",[$i]);
}
}
}
//$mail->Body    = '';

//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';

//send the message, check for errors
if (!$mail->send()) {
  // $mail->ErrorInfo;
    echo "<script type='text/javascript'>alert('Mailer Error:');</script>";
} else {

     // mysqli_query($con,"INSERT into files_share (user_id,files_id,files_name,sent_to) values('".$user_id."','".$files_id."','".$files_name."','".$sent_to."')") or die ("Cannot query with database table");
    
    echo "<script type='text/javascript'>alert('Message sent!');</script>";
}

}
echo "<script>setTimeout(\"location.href = 'form.php';\",200);</script>";
// }
?>