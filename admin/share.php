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

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="" src="img/profile_small.png" />
                             </span>
                            <a  href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['admin'] ?></strong>
                               </span> </span> </a>
                            
                        </div>
                        <div class="logo-element">
                            <img src="">
                        </div>
                    </li>
                    <li >
                        <a href="dashboard.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span> </a>
                        
                    </li>
                    <li class="active">
                        <a href="users.php"><i class="fa fa-user"></i> <span class="nav-label">Manage Users</span></a>
                    </li>
                    <li >
                        <a href="user_docs_verify.php"><i class="fa fa-file-text"></i> <span class="nav-label">Manage Documents</span></a>
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
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-share fa-fw"></i> Document shared to user2
                                    <span class="pull-right text-muted small">  2 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
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
            <div class="col-lg-12">
             <div class="row wrapper border-bottom">
                <h5>This section shows all documents / certificates user have shared with others via email.</h5>
            </div>
    <br>
                <div class="ibox-content">
                <table class="table table-hover">
    <thead>
      <tr>
        <th>Type</th>
        <th>Name</th>
        <th>Shared with</th>
        <th>Shared when</th>
      </tr>
    </thead>
    <?php 
    

    $con=mysqli_connect("localhost","root");

    mysqli_select_db($con,"e-vault");

    $user_id=$_GET['view'];

    $disp="SELECT * FROM files_share where user_id=$user_id ORDER by share_id DESC";
    $result=mysqli_query($con,$disp);
    while ($row=mysqli_fetch_array($result)) :

    $value=$row['date'];
    $time = strtotime($value);
    $date= date("h:i A, d-m-Y ", $time);
    ?>
    <tbody>
      <tr>
         <?php
        $file=$row['files_name'];
        $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));

        if ($imageFileType != "pdf") {
        ?>
        <td> 
            <img src=../user/pic/image.png width=25 height=25>
            <?php echo $row['files_name']; ?> 
        </td>
            <?php } else { ?>
        <td>
            <img src=../user/pic/pdf.svg  width=25 height=25>
            <?php echo $row['files_name']; ?>
        </td>
        <?php } ?>
        <!-- <td><img src=../user/images/<?php echo $row['files_name'] ?> width=25 height=25></td> -->
         <td><?php echo $row['files_name']; ?></td>
        <td><?php echo $row['sent_to']; ?></td>
        <td><?php echo $date; ?></td>
      </tr>
      <tr>
    </tbody>
    <?php endwhile ?>
  </table>
            </div>
        </div>

               <!--  <div class="footer">
                    <div class="pull-right">
                        
                    </div>
                    <div>
                        <strong>Copyright</strong>E-vault &copy; 2017-2018
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
