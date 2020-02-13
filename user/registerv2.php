<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-vault | Register</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    

        <div id="wrapper">

        <div class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">

            <div class="navbar-header">

            <a href="index.html"><h1 style="font-size: 2em;color: black;" class="navbar-minimalize minimalize-styl-2 "><img src="logo.png" width="40px" height="40px"> E-Vault </h1></a>
        </div>

            <ul class="nav navbar-top-links navbar-right">
      
                <li>
                    <a href="login.php">
                        <i class="fa fa-sign-in"></i> Log in
                    </a>
                </li>

                 <li>
                    <a href="register.php">
                        <i class="fa fa-user-plus"></i> Sign up
                    </a>
                </li>

            </ul>

        </nav>
        </div>

        <div class="passwordBox animated fadeInDown" style="padding-top: 75px;">
        <div class="row">

            <div class="col-md-12" style="background-color:white;">
                <!-- <div class="ibox-content" style="width: 500px;"> -->
                    <div class="text-center"><h2 class="font-bold">Just one more step to complete the sign up...</h2>
                    <p>Create Unique Username and Password for your E-vault account</p>
                    </div>
                    <br>
                    <!-- <div class="row"> -->

                        <!-- <div class="col-lg-12"> -->
                            <form  role="form" method="post" action="">
                                <?php

$con=mysqli_connect("localhost","root");

mysqli_select_db($con,"e-vault");
if (isset($_POST['submit']))
{

    $uname = $_POST['uname'];
 
    $query = "SELECT * FROM `user_register` WHERE username='$uname'";
 
    $result = mysqli_query($con, $query);
    $row=mysqli_fetch_array($result);

    if (mysqli_num_rows($result) == 1)
        {
            echo "<p style='color:red;'>Username already in use.</p>";
      
        }else{
       
               $pass=$_POST['pass'];
                                $phno=$_SESSION['phone'];

                                // $qry=mysqli_query($conn,"INSERT into user_register (username,password) values ('$uname','$pass') WHERE phno=$user_id ") or die ("Cannot query with database table");


                                $qry = mysqli_query($con,"UPDATE user_register SET username='".$uname."', password='".$pass."' WHERE phno='".$phno."' ") or die ("Cannot query with database table ");
                                
                                   
                                if($qry){  
                                    
                               // header('Location:login.php');
                               echo "<script type='text/javascript'>alert('Your E-vault account was created succsfully');</script>";
                               echo "<script>setTimeout(\"location.href = 'login.php';\",200);</script>";
                                // header('Location: login.php');
                              
                                        }
                                        session_destroy();
                                        
        }
}
?>
                                <div class="form-group">   
                   <label class="font-bold"> Set your Username</label><input type="text" name="uname" class="form-control" placeholder="Username" pattern="[A-Za-z0-9._%+-@#$&*]{8,}" title="Min 8 charset" required="">
                                </div>

                                <div class="form-group">
                                <label class="font-bold">
                        Set your Password
                    </label> <input type="Password" name="pass" class="form-control" placeholder="Password" pattern="[A-Za-z0-9._%+-@#$&*]{8,}" title="Min 8 charset" required="">
                                </div>
                           


                                <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Signup</button>

                            </form>
                            <!-- <?php
                            include ('connect.php');
                            if(isset($_POST["submit"])){
                                $uname=$_POST['uname'];
                                $pass=$_POST['pass'];
                                $phno=$_SESSION['phone'];

                                // $qry=mysqli_query($conn,"INSERT into user_register (username,password) values ('$uname','$pass') WHERE phno=$user_id ") or die ("Cannot query with database table");


                                $qry = mysqli_query($conn,"UPDATE user_register SET username='".$uname."', password='".$pass."' WHERE phno='".$phno."' ") or die ("Cannot query with database table ");
                                
                                   
                                if($qry){  
                                    
                               // header('Location:login.php');
                               echo "<script type='text/javascript'>alert('Your E-vault account was created succsfully');</script>";
                               echo "<script>setTimeout(\"location.href = 'login.php';\",200);</script>";
                                // header('Location: login.php');
                              
                                        }
                                        session_destroy();
                                        }
                                         
                            ?> -->
                            <!-- </div> -->
                    <!-- </div> -->
                <!-- </div> -->
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
    
            </div>
        </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
   
</body>



</html>
