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

               <!--  <li>
                    <button class="btn btn-primary"  name="">Login</button>
                </li>
                <li><button class="btn btn-primary"  name="">Sign-up</button></li> -->
               
            </ul>

        </nav>
        </div>

        

            
            
         <!--    <form class="m-t" role="form" method="post" action="process.php">
                <div class="passwordBox animated fadeInDown">
        <div class="row">

            <div class="col-md-12">
                <div class="ibox-content text-center">

                   <h2>Register to E-Vault</h2>
            <p>Create account to see it in action.</p>

                    <div class="row">

                        <div class="col-lg-12">
                            <form class="m-t" role="form" method="post" action="">
                                <div class="form-group">
                                    <input type="text" name="phnno" class="form-control" placeholder="Your Mobile no" required="">
                                </div>

                                
                <button type="submit" name="btn-save" class="btn btn-primary block full-width m-b">Register</button>
            </form>
</div>
                    </div>
                </div>
            </div>
        </div>
        <hr/> -->
  
        <div class="passwordBox animated fadeInDown">
        <div class="row">

            <div class="col-md-12">
                <div class="ibox-content">
                    <div class="text-center"><h2 class="font-bold">Signup with your Mobile</h2>
                    <p>(It takes just a minute)</p></div>

                    <br>
  
                                      <?php

$con=mysqli_connect("localhost","root");

mysqli_select_db($con,"e-vault");
if (isset($_POST['btn-save']))
{

    $phno = $_POST['phone'];
 
    $query = "SELECT * FROM `user_register` WHERE phno='$phno'";
 
    $result = mysqli_query($con, $query);
    $row=mysqli_fetch_array($result);

    if (mysqli_num_rows($result) == 1)
        {
            echo "<p style='color:red;'>Phone number already in use.</p>";
      
        }else{
       
            $_SESSION['phone']=$_POST['phone'];
         header('Location: process.php');
        }
}
?>
                    <div class="row">

                        <div class="col-lg-12">
                            <form class="m-t" role="form" method="post" >
                                <div class="form-group">
                                   <p class="font-bold">
                        Enter your mobile number
                    </p> <input type="text" name="phone" class="form-control" placeholder="Your Mobile no." pattern="[0-9]{10}" title="Only numbers.Max 10" required="">
                                </div>

                                <button type="submit" name="btn-save" class="btn btn-primary block full-width m-b">Continue</button>

                            </form>
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
    
            </div>
        </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    
</body>



</html>
