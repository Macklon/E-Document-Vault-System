<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-vault | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
   
    </style>

</head>

<body class="gray-bg">




    <div id="wrapper">

        <div class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">

            <div class="navbar-header">

            <a class="navbar-maximalize minimalize-styl-2" href="index.html"> <h1 style="font-size: 2em;color: black;" class="navbar-minimalize minimalize-styl-2 "><img src="logo.png" width="40px" height="40px"> E-Vault </h1></a>
            
        </div>

            <!-- <ul class="nav navbar-top-links navbar-right">
      
                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-in"></i> Log in
                    </a>
                </li>

                 <li>
                    <a href="register.html">
                        <i class="fa fa-user-plus"></i> Sign in
                    </a>
                </li>

                <li>
                    <button class="btn btn-primary"  name="">Login</button>
                </li>
                <li><button class="btn btn-primary"  name="">Sign-up</button></li>
               
            </ul> -->

        </nav>
        </div>
            <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <!-- <h1 class="">logo</h1> -->


            </div>

            <h2>Welcome to E-vault </h2>
     
            <p>Admin Login .</p>
            <?php

            $con=mysqli_connect("localhost","root");

            mysqli_select_db($con,"e-vault");
            if (isset($_POST['submit']))
            {

                $username = $_POST['uname'];
                $password = $_POST['pass'];
                $query = "SELECT * FROM `admin_login` WHERE username='$username' and password='$password'";
             
                $result = mysqli_query($con, $query);
                $row=mysqli_fetch_array($result);

                if (mysqli_num_rows($result) == 1)
                    {
                    $_SESSION['admin']=$row['username'];
                    header('Location: dashboard.php');
                    }else{
                    echo "<p style='color:red;'>Invalid Login Credentials.</p>";
                    }
            }
            ?>
            <form class="m-t" role="form" method="post" action="">
                <div class="form-group">
                    <input type="text" class="form-control" name="uname" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pass" placeholder="Password" required="">
                </div>
                <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Login</button>

                
            </form>
            <!-- <a href="forgot_password.php"><p class="m-t"> <small>Forgot password</small> </p></a> -->
        </div>
    </div>

                <div class="footer">
                    <div class="pull-right">
                        
                    </div>
                    <div>
                        <strong>Copyright </strong>E-vault &copy; 2017-2018
                    </div>
                </div>
            </div>
        </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
