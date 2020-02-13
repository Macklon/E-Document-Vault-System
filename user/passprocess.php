<?php
session_start();
// $url='127.0.0.1:3306';
// $username = "root";
// $password = "";
// $dbname = "admin";
// $conn = mysqli_connect($url, $username, $password, $dbname);
include ('connect.php');
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
// $rno=$_SESSION['otp'];
// $urno=$_POST['otpvalue'];
// if(!strcmp($rno,$urno))
// {

$phone=$_SESSION['phone'];
// Create connection

$sql = "SELECT * FROM `user_register` WHERE phno = '$phone'";
                                $res1 = mysqli_query($conn, $sql);
                                $row=mysqli_fetch_array($res1);

                                    
                                    $Username=$row['username'];
                                    $password=$row['password'];
                                   
                                    

if (mysqli_query($conn, $sql)) {
$authKey = "193573ASke0X6C525a5f4254";
$mobileNumber = $phone;
//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "Evault";
//Your message to send, Add URL encoding here.
$message = urlencode('Hello,
Your Login details
Username: '.$Username.'
Password:  '.$password.'
The E-vault team');
//Define route 
$route = "route=4";
//Prepare you post parameters
$postData = array(
'authkey' => $authKey,
'mobiles' => $mobileNumber,
'message' => $message,
'sender' => $senderId,
'route' => $route
);
//API URL
$url="https://control.msg91.com/api/sendhttp.php";
// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => $url,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_POST => true,
CURLOPT_POSTFIELDS => $postData
//,CURLOPT_FOLLOWLOCATION => true
));
//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//get response
$output = curl_exec($ch);
//Print error if any
if(curl_errno($ch))
{
echo 'error:' . curl_error($ch);
}
curl_close($ch);
header( "Location: login.php" );
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
return true;

?>