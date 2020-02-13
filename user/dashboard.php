<?php
    session_start();

        if (isset($_SESSION['user_id']) == true) {

        } else { 
header('Location: login.php');
        }
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
    <style type="text/css">
        .no {margin: 0px;font-weight:bold;font-size: 8em;color: black;

    }
    .text{margin: 0px;padding:10px;color: black;

    }

    .box{
        height: 150px;width: 200px;
    }

    .bg{
        background-image: url('bg1.jpg');height: 465px;background-position: center;background-repeat: no-repeat;background-size: cover;
    }

    </style>
    
</head>

<body >
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side " role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <?php
                            include ("connect.php");
                          $user_id=$_SESSION['user_id'];
                          $disp="SELECT * FROM user_register where user_id=$user_id";
                            $result=mysqli_query($conn,$disp);
                            $row=mysqli_fetch_array($result);
                            $pic=$row['profile_pic'];
                            if ($pic=='') {
                            ?>
                            <img alt="image" class="img-circle" src="img/pc.gif" width="50px;" height="50px;" />
                            <?php } else { ?>
                            <img alt="image" class="img-circle" src="img/<?php echo $row['profile_pic']; ?>" width="50px;" height="50px;" />
                            <?php } ?>
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <?php
                            $pc=$row['member_status'];
                            if ($pc=='') {
                            ?>
                           <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['user'] ?></strong>
                            <?php } else { ?>
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><img src="pre.png" width="20px;" height="20px;"><?php echo $_SESSION['user'] ?></strong>
                            <?php } ?>
                            
                              <b class="caret"></b> </span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.php">Profile</a></li>
                                <li><a href="account_setting.php">Account Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            
                        </div>
                    </li>
                    <li class="active">
                        <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span> </a>
                        
                    </li>
                    <li>
                        <a href="upload.php"><i class="fa fa-cloud-upload"></i> <span class="nav-label">Uploaded Documents</span></a>
                    </li>
                    <li>
                        <a href="share.php"><i class="fa fa-share"></i> <span class="nav-label">Shared Documents</span></a>
                    </li>      
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header ">
              <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <a href="index.html"><h1 style="font-size: 2em;color: black;" class="navbar-minimalize minimalize-styl-2 "><img src="logo.png" width="40px" height="40px"> E-Vault </h1></a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                
                
               <!--  <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary"></span>
                    </a> 
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-info fa-fw"></i> Document verification complete
                                    <span class="pull-right text-muted small">  1 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-share fa-fw"></i> Document shared to user2
                                    <span class="pull-right text-muted small">  2 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-info fa-fw"></i> Please link your email
                                    <span class="pull-right text-muted small">  4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul> 
                 </li> -->


                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
               
            </ul>

        </nav>
        </div>
        <?php
            include ("connect.php");
            $user_id=$_SESSION['user_id'];
            $disp="SELECT member_status FROM user_register where user_id=$user_id && member_status='premium' ";
            $result=mysqli_query($conn,$disp);
            $row_cnt = mysqli_fetch_array($result);

            if(isset($_GET["user_stat"])){
               mysqli_query($conn,"UPDATE user_register SET member_status='premium' WHERE user_id=".$user_id."");
                }
            
            ?>

           


        <?php if (isset($row_cnt) ) { ?>
        <div class="col-lg-12 ">
            <div  class="row wrapper border-bottom">
                <h5>Your Dashboard</h5>  
            </div>
            <br>
            <?php
            $disp="SELECT files_id FROM files_upload where user_id=$user_id ";
            $result=mysqli_query($conn,$disp);
            $row = mysqli_num_rows($result);
            ?>
            <div class="ibox-content bg" style="">
                <div class="box" style="position: relative;left: 450px;top: 150px;">
                    <h1 class="text-center no" style="">
                <?php echo $row ?>
            </h1>
            <h3 class="text-center text">Uploaded documents</h3>
                </div>
            
            </div>
        </div>

        
       <?php } else { ?>
        <div  class="col-lg-7 ">
            <div class="row wrapper border-bottom"><br>
                <h5>Your Dashboard</h5>
            </div>
            <?php
            $disp="SELECT files_id FROM files_upload where user_id=$user_id ";
            $result=mysqli_query($conn,$disp);
            $row = mysqli_num_rows($result);
            ?>
            <div class="ibox-content bg" >
            <div class="box" style="position: relative;left: 240px;top: 150px;">
            <h1 class="text-center no">
                <?php echo $row ?>
            </h1>
            <h3 class="text-center text">Uploaded documents</h3>
            </div>
            </div>
        </div>

        <div class="col-lg-1">
           
        </div>
            <?php } ?>
            
<?php
if (isset($row_cnt )) {


      } else { ?>
       <?php
               
               ?>
        <div  class="col-lg-4 ">
           <div class="row wrapper border-bottom "><br>
                <h5>Latest Notification</h5>
            </div>
           <div class="ibox-content bg" style="color: black;">
                
                    

                        <button type="button" style="position: relative;left: 100px;top: 300px;" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">GO PREMIUM</button>

                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">PREMIUM</h4>
                              </div>
                              <div class="modal-body">
                                <p>Get your documents verified for 1 year for sum of Rs.500</p>
                              </div>
                              <div class="modal-footer">
                                <form method="get">
                                <input  type="submit" name="user_stat" class="btn btn-default" value="Make payment" >
                                </form>
                              </div>
                            </div>

                          </div>
                        </div>
                
                <h2><strong style="font-size: 2em;"> Go Premium.Get Verified.</strong></h2>
                 <h2>Premium sounds amazing</h2>
                <h3 style="position: relative;left: 10px;top: 125px;">- Get your documents verified by going premium for 1 year*</h3>
            </div>
        </div>
<?php } ?>
                <!-- <div class="footer">
                    <div class="pull-right">
                        
                    </div>
                    <div>
                        <strong>Copyright</strong> E-vault &copy; 2017-2018
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Toastr -->
    <script src="js/plugins/toastr/toastr.min.js"></script>


    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Welcome <?php echo $_SESSION['user'] ?>');
            }, 1300);    
        });
    </script>
   
</body>
</html>
