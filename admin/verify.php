<?php
    session_start();
    error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>E-vault | verify</title>

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
                            <img alt="image" class="" src="img/profile_small.png" />
                             </span>
                            <a href="#">
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
                    <li >
                        <a href="users.php"><i class="fa fa-user"></i> <span class="nav-label">Manage Users</span></a>
                    </li>
                    <li class="active">
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
                <h5>This is where you can verify certificates.</h5>
            </div>
            <br>
              
                <div class="ibox-content">
                <table class="table table-hover">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Name</th>
        <th></th>
        <th>Size</th>
        <th>Sent when</th>
        <th>Sent by</th> 
      </tr>
    </thead>
    <?php
            include ("connect.php");
           $user_id=$_GET['view'];
           $email=$_GET['email'];
        
      if(isset($_POST["submit"])){

            $disp1="SELECT file_name FROM files_upload where user_id=$user_id and file_status='Pending' ";
            $result1=mysqli_query($conn,$disp1);
            
         
            while ($row=mysqli_fetch_array($result1)) {
                   $file=$row['file_name'];
        $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));

        if ($imageFileType =="jpg") {
                //$file=$row['file_name'];
            //Let's say you sent the filename via the url, i.e. watermark.php?filename=myimage.jpg
            $filename=$row['file_name'];
            //$imgpath is where your images in this gallery reside
            $imgpath="../user/images/";
            //Put them all together to get the full path to the image:
            $imgpath = $imgpath.$filename;
            //Load the stamp and the photo to apply the watermark to
            $im = imagecreatefromjpeg($imgpath);

            // First we create our stamp image manually from GD
            $stamp = imagecreatetruecolor(100, 70);
            imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
            imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);
            imagestring($stamp, 5, 20, 20, 'E-vault', 0x0000FF);
            imagestring($stamp, 3, 20, 40, '(c) 2018', 0x0000FF);

            // Set the margins for the stamp and get the height/width of the stamp image
            $marge_right = 10;
            $marge_bottom = 10;
            $sx = imagesx($stamp);
            $sy = imagesy($stamp);

            // Merge the stamp onto our photo with an opacity of 50%
            imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 50);

            // Save the image to file and free memory
            imagepng($im, $imgpath);
            imagedestroy($im);
 }
      mysqli_query($conn,"UPDATE files_upload SET file_status='Verified' WHERE files_id=".$_POST["file"]."");
   

    if ($imageFileType =="png") {
            
                //$file=$row['file_name'];
            //Let's say you sent the filename via the url, i.e. watermark.php?filename=myimage.jpg
            $filename=$row['file_name'];
            //$imgpath is where your images in this gallery reside
            $imgpath="../user/images/";
            //Put them all together to get the full path to the image:
            $imgpath = $imgpath.$filename;
            //Load the stamp and the photo to apply the watermark to
            $im = imagecreatefrompng($imgpath);

            // First we create our stamp image manually from GD
            $stamp = imagecreatetruecolor(100, 70);
            imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
            imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);
            imagestring($stamp, 5, 20, 20, 'E-vault', 0x0000FF);
            imagestring($stamp, 3, 20, 40, '(c) 2018', 0x0000FF);

            // Set the margins for the stamp and get the height/width of the stamp image
            $marge_right = 10;
            $marge_bottom = 10;
            $sx = imagesx($stamp);
            $sy = imagesy($stamp);

            // Merge the stamp onto our photo with an opacity of 50%
            imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 50);

            // Save the image to file and free memory
            imagepng($im, $imgpath);
            imagedestroy($im);
}
      mysqli_query($conn,"UPDATE files_upload SET file_status='Verified' WHERE files_id=".$_POST["file"]."");

      if ($imageFileType =="pdf") {
        mysqli_query($conn,"UPDATE files_upload SET file_status='Verified' WHERE files_id=".$_POST["file"]."");
      }
      
    }
}


            $disp="SELECT * FROM files_upload where user_id=$user_id and file_status='Pending' ";
            $result=mysqli_query($conn,$disp);
            while ($row=mysqli_fetch_array($result)) :

            $value=$row['submission_date'];
    $time = strtotime($value);
    $date= date("h:i A, d-m-Y ", $time);

    ?>
    <tbody>
      <tr>
         <?php
        $file=$row['file_name'];
        $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));

        if ($imageFileType !="pdf") {
        ?>
        <td> 
           
            <a href="../user/images/<?php echo $row['file_name'] ?>"><img src=../user/images/<?php echo $row['file_name']; ?> width=25 height=25></a>
           
            </td>
        <?php } else { ?>
        <td>
         <a href="../user/images/<?php echo $row['file_name'] ?>"><img src=../user/pic/pdf.svg  width=25 height=25></a>
         
</td>
        <?php } ?>
        <!-- <td><a href="../user/images/<?php echo $row['file_name'] ?>"><img src=../user/images/<?php echo $row['file_name'] ?> width=25 height=25></td> -->
        <td> <?php echo $row['file_name']; ?></a></td>
        <td>
        <form method="post" action="">
        <input type="hidden" name="file" value="<?php echo $row['files_id']; ?>">
        <i class="fa fa-check"><input type="submit" value="verify" name="submit"></i>
        </form>
           <!--  <a href="?file_status=<?php echo $row['files_id']; ?>"><i class="fa fa-check"> verify</i></a> -->

        </td>
        <td><?php echo $row['file_size']; ?>kb</td>
        <td><?php echo $date; ?></td>
        <td><?php echo $email; ?></td>
      </tr>
      
     
    </tbody>
    <?php endwhile ?>
     
  </table>
            </div>
        </div>

                <!-- <div class="footer">
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