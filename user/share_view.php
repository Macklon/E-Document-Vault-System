<?php
    session_start();
    ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>E-vault | HomePage</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body >
    <div style="height: 100%;" class="gray-bg">

        <div class="gray-bg dashbard-1">
        <div class="col-md-12">
        <div class="row border-bottom">
        <nav class="navbar navbar-fixed-top white-bg" role="navigation" style="margin-bottom: 0">

            <div class="navbar-header">

           <h1 style="font-size: 2em;" class="navbar-minimalize minimalize-styl-2 "><img src="logo.png" width="40px" height="40px"> E-Vault </h1>
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
    </div>
    <br>
     <br>
      <br>
       <br>
        
            <div style="height: 100%;" class="col-md-12 text-center gray-bg">
                <?php
                require ('connect.php');
                $files_name=$_GET['view'];
                $user_id=$_SESSION['user_id'];
                $disp3="SELECT * FROM files_upload where user_id=$user_id and file_name='$files_name' ";
                $result3=mysqli_query($conn,$disp3);
                $row3=mysqli_fetch_array($result3);
                $veri= $row3['file_status'];

                $sent_time = $_GET['time']; // fetching time variable from URL
                $cur_time = time(); //fetching current time to check with GET variable's time
                $timer=$cur_time - $sent_time;
                // echo "<script type='text/javascript'>alert($sent_time);</script>";
                // echo "<script type='text/javascript'>alert($cur_time);</script>";
                // echo "<script type='text/javascript'>alert($timer);</script>";
                // 3600=1hr
                // 10800=3hr
                if ($cur_time - $sent_time < 10800) 
                {
                 // link is not expired
                     // echo "<script type='text/javascript'>alert('not');</script>";
                
              
                if ($veri=='Verified') {
                ?>

                            <div>
                                <h3 style="color: black;background-color: red;">Verified Document by E-vault team</h3>
                                <!-- <a href="http://localhost/e-docs/user/images/<?php echo($files_name)?>" >view</a> -->
                                <iframe src="http://localhost/e-docs/user/images/<?php echo($files_name)?>" style="width:800px; height:500px;" frameborder="0"></iframe>
                            </div>

                <?php } else { ?>
                    <div>
                        <!-- <a href="http://localhost/e-docs/user/images/<?php echo($files_name)?>" >view</a> -->
                        <h3 style="color: black;background-color: red;"></h3>
                        <iframe src="http://localhost/e-docs/user/images/<?php echo($files_name)?>" style="width:800px; height:500px;" frameborder="0"></iframe>
                    </div>
                <?php } 

                }
                else
                {
                 // link has been expired
                     ?>
                     
                          <div class="text-center animated fadeInDown">
                            <img src="ex.png" style="border:0px">
                            <!-- <h2>Link Expired</h2>
                            <h3 class="font-bold">Error</h3>

                            <div class="error-desc">
                                The Link is no longer available. Please request a new link.
                            </div>-->
                        </div> 
                     
                     <?php
                }

                ?>
            
</div>
<!-- <br>
     <br>
     <br> -->
    

                <!-- <div class="white-bg" >
                    <div class="pull-right">
                        
                    </div>
                    <div>
                        <strong>Copyright</strong> E-vault &copy; 2017-2018
                </div>
            </div> -->
        
    </div>
</div>

        
        
       
    

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="js/plugins/toastr/toastr.min.js"></script>


 
</body>
</html>
