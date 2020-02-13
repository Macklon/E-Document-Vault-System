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
  
        <div  class="middle-box  loginscreen ">

        <div>

            <h2 class="text-center font-bold">Profile Setting</h2>
            <p>Fill in your details so we can serve you better..</p>
            
            
            <form class="m-t" role="form" method="post"  action="reg_create.php">
                
                <div class="row" >
                       <div class="form-group col-lg-6" ><label class="font-bold"> Enter First name:</label>
                           <input type="text" class="form-control" name="fname" pattern="[A-Za-z]{2,}" title="Only Alphabets" placeholder="First name" required="">
                        </div>
                    
                        <div class="form-group col-lg-6">
                            <label class="font-bold">Enter Last name: </label><input type="text" class="form-control" pattern="[A-Za-z]{2,}" title="Only Alphabets" name="lname"   placeholder="Last name" required="">
                        </div> 
                </div>

                <div class="form-group">
                    <label class="font-bold">Enter E-mail: </label><input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" name="email"  placeholder="Email" required="">
                </div>

                <div class="form-group">
                    <label class="font-bold">Enter Address: </label><textarea class="form-control" rows="2" value=""  name="add" placeholder="Address" required=""></textarea>
                </div>

                <div class="form-group">
                    <label class="font-bold">Date Of Birth</label><input type="date" name="dob" class="form-control"  placeholder="Date of birth" required="">
                </div>

<div class="form-group">
                <label class="font-bold">Gender: </label>
                <input type="radio" value="Male" name="gender"> Male
             <input type="radio" value="Female" name="gender"> Female
              
 </div>
       <!--  <div class="text-center"> -->

                
                <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Next</button>
            </form>
           
        </div>
   
       

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
