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

    <title>Evault | HomePage</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
        .btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

    </style>

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
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
                                <li><a href="">Account Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            <img src="">
                        </div>
                    </li>
                    <li >
                        <a href="dashboard.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span> </a>
                        
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
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <h1 style="font-size: 2em;" class="navbar-minimalize minimalize-styl-2 "><img src="logo.png" width="40px" height="40px"> E-Vault </h1>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                
                <!-- 
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary"></span>
                    </a>
                     <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
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
        <div  class="col-lg-12">
            <div class="row wrapper border-bottom">
                <h5>Account setting</h5>
            </div>
            
            <div class="row wrapper">
                
            </div>
            
              <br>
              <?php
              include ("connect.php");
              $user_id=$_SESSION['user_id'];
              $disp="SELECT * FROM user_register where user_id=$user_id";
    $result=mysqli_query($conn,$disp);
    while ($row=mysqli_fetch_array($result)) :
              ?>
                <div class="ibox-content">
               <table class="table table-striped">
    
    
    <tbody>
       <tr>
        <td>
              User Name: <?php echo $row['username']; ?>
          </td>  
       </tr>
      <?php
     $db = new mysqli('localhost', 'root', '', 'e-vault');
  if(isset($_POST['submit'])):
  extract($_POST);
  
  $user_id = $_SESSION['user_id'];// sesssion id
  $old_pwd=$_POST['oldpass'];
  $pwd=$_POST['newpass'];
  $c_pwd=$_POST['conpass'];
  if($pwd == $c_pwd) :
  if($pwd!=$old_pwd) :
    $sql="SELECT * FROM `user_register` WHERE `user_id`='$user_id' AND `password` ='$old_pwd'";
    $db_check=$db->query($sql);
    $count=mysqli_num_rows($db_check);
  if($count==1) :
    $fetch=$db->query("UPDATE `user_register` SET `password` = '$pwd' WHERE `user_id`='$user_id'");
    $old_password=''; $password =''; $confirm_pwd = '';
    //$msg_sucess = "Your new password update successfully.";
    echo "<script type='text/javascript'>alert('Your new password update successfully.');</script>";
  else:
    //$error = "The password you gave is incorrect.";
    echo "<script type='text/javascript'>alert('The password you gave is incorrect.');</script>";
  endif;
  else :
   // $error = "Old password new password same Please try again.";
    echo "<script type='text/javascript'>alert('Old password new password same Please try again.');</script>";
  endif;
  else:
    //$error = "New password and confirm password do not matched";
    echo "<script type='text/javascript'>alert('New password and confirm password do not matched');</script>";
  endif;
    
  endif;

  // if(isset('up_phone'))
  // {
    
  // }
  
  ?>
          <tr>
              <td>
                <br>
                <form  role="form" method="post" >
                  <div  class="form-group">
                  <label class="font-bold">Current Password: </label></br>
                  <input type="text" class="form-control" style="width: 25%;" placeholder="current password" pattern="[A-Za-z0-9._%+-@#$&*].{8,}" title="Min 8 charset" required name="oldpass">
                </div>
                <div  class="form-group">
                  <label class="font-bold">New Password: </label></br><input class="form-control" style="width: 25%;" type="text" placeholder="new password" pattern="[A-Za-z0-9._%+-@#$&*].{8,}" title="Min 8 charset" required name="newpass">
                </div>
                <div  class="form-group">
                  <label class="font-bold">Confirm Password: </label></br><input type="text" class="form-control" style="width: 25%;" required pattern="[A-Za-z0-9._%+-@#$&*].{8,}" title="Min 8 charset" placeholder="confirm password" name="conpass">
                </div>
                  <input type="submit" class="btn btn-primary btn-sm" value="Change password" name="submit">
                  </form>
                  <br>
              </td>
          </tr>
          <!-- <tr>
              <td>
                Update your mobile number which you have used to sign up for E-vault
                <form method="post">
                  <div  class="form-group">
                   <br> <input type="tel" id="myDIV" style="width: 200px;" class="form-control" pattern="[0-9]{10}" title="Only numbers.Max 10"  name="" placeholder="Enter new mobile no" required=""></br>
                   <input type="text" style="display:none;width: 200px;" id="myDIV1" class="form-control" pattern="[0-9]{10}" title="Only numbers.Max 10"  name="" placeholder="Enter OTP" required="">
                   <br><input type="submit" onclick="myFunction()" class="btn btn-primary btn-sm" value="Update Now" name="up_phno">
                </div>
                </form>
              </td>
          </tr> -->
    
      
    </tbody>
    <?php endwhile ?>
  </table> 

            </div>
        </div>

              <!--   <div class="footer">
                    <div class="pull-right">
                        
                    </div>
                    <div>
                        <strong>Copyright</strong> E-vault  &copy; 2017-2018
                    </div>
                </div> -->
            </div>
        </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script type="text/javascript">
  function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";//to show
    } else {
        x.style.display = "none";//to hide
    }
  
var x = document.getElementById("myDIV1");
    if (x.style.display === "none") {
        x.style.display = "block";//to show
    } else {
        x.style.display = "none";//to hide
    }

}
</script>

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


    
</body>
</html>