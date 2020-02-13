 <?php

$conn=mysqli_connect("localhost","root");

mysqli_select_db($conn,"e-vault"); 

    $user_id=$_SESSION['user_id'];   
     
if(isset($_POST["submit"])){
    for($i=0; $i<count($_FILES['uploadedimage']['name']); $i++){ 
    $image_size=round($_FILES["uploadedimage"]["size"][$i] / 1024 );
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["uploadedimage"]["name"][$i]);
    move_uploaded_file($_FILES['uploadedimage']['tmp_name'][$i], $target_file);

    
    $qry = mysqli_query($conn,"INSERT into files_upload values('".$user_id."','','".$_FILES["uploadedimage"]["name"][$i]."','".$image_size."','".date("Y-m-d")."','Not approved','')") or die ("Cannot query with database table");
}
    if($qry){  
   echo "<script type='text/javascript'>alert('File uploaded succsfully');</script>";
            }
    }
   
if(isset($_GET["delete"])){
    $qry = mysqli_query($conn,"delete from files_upload where files_id=".$_GET["delete"]."");
    $deleteFile="images/".$_GET['file'];
    if (is_file($deleteFile)) {
    unlink($deleteFile);
    }
}
    
    $disp="SELECT * FROM files_upload where user_id=$user_id ORDER by files_id DESC";
    $result=mysqli_query($conn,$disp);

    if(isset($_GET["file_status"])){
    $qry = mysqli_query($conn,"UPDATE files_upload SET file_status='Pending' WHERE files_id=".$_GET["file_status"]."");
    }
    
?>


