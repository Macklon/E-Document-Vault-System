<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-vault | Forgot password</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="passwordBox animated fadeInDown">
        <div class="row">

            <div class="col-md-12">
                <div class="ibox-content">

                    <h2 class="font-bold">Forgot password</h2>

                    <p>
                        Enter your email address and your password will be reset and emailed to you.
                    </p>

                    <div class="row">

                        <div class="col-lg-12">
                            <form class="m-t" role="form" method="post" action="">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email address" required="">
                                </div>

                                <button type="submit" name="share_pass" class="btn btn-primary block full-width m-b">Send new password</button>

                            </form>

                            <?php
                                require_once('connect.php');

                                if(isset($_POST) & !empty($_POST)){
                                $username = mysqli_real_escape_string($conn, $_POST['email']);
                                $sql = "SELECT * FROM `user_register` WHERE email = '$username'";
                                $res = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($res);
                                if($count == 1){
                                 
                                    
                                    require 'PHPMailer/PHPMailerAutoload.php';

                                
                                $sent_to=$_POST['email'];
                                     $sql1 = "SELECT * FROM `user_register` WHERE email = '$username'";
                                $res1 = mysqli_query($conn, $sql1);
                                $row=mysqli_fetch_array($res1);

                                    
                                    $Username=$row['username'];
                                    $password=$row['password'];
                                    $sent_from=$row['email'];
                                    $user_id=$row['user_id'];
                                    
                                $mail = new PHPMailer;
                                $mail->isSMTP();
                                $mail->SMTPDebug = 0;
                                $mail->SMTPOptions = array(
                                    'ssl' => array(
                                        'verify_peer' => false,
                                        'verify_peer_name' => false,
                                        'allow_self_signed' => true
                                    )
                                );
                                $mail->Host = 'ssl://smtp.gmail.com:465';
                                $mail->SMTPAuth = true;
                                $mail->Username = "projectbca2018@gmail.com";
                                $mail->Password = "project1#";
                                $mail->setFrom('m@gmail.com',$Username );
                                $mail->addReplyTo('noreply@evault.com',$Username);
                                $mail->addAddress($sent_to, '');
                                $mail->Subject = ''.$Username.' Your Recovered Password';
                                $mail->msgHTML('Hello,<br><br>

                                      Please use this password to login<br><br>

                                     Username: '.$Username.'<br>
                                     Password:  '.$password.'<br>
                                 
                                    The E-vault team<br><br>
                                    <a href="http://localhost/e-docs/user/images/login,php"> Click here to Login</a><br><br>');

                                if (!$mail->send()) {
                                  // $mail->ErrorInfo;
                                    echo "<script type='text/javascript'>alert('Failed to Recover your password, try again');</script>";
                                } else {
                                    echo "<script type='text/javascript'>alert('Your Password has been sent to your email id');</script>";  
                                }
                                }else{
                                 
                                    echo "<script type='text/javascript'>alert('Email does not exist in database');</script>";
                                }
                            }
                                
                                
                                ?>

                           

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright E-vault 
            </div>
            <div class="col-md-6 text-right">
               <small>© 2017-2018</small>
            </div>
        </div>
    </div>

</body>



</html>
