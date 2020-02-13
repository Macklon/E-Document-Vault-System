<?php
          session_start();
            $con=mysqli_connect("localhost","root");

            mysqli_select_db($con,"e-vault");


            if (isset($_POST['submit']))
            {

            
          
            $email=$_POST['email'];
            $user_id=$_SESSION['user_id'];
           $fname=$_POST['fname'];
           $lname=$_POST['lname'];
           
           $dob=$_POST['dob'];
           $add=$_POST['add'];
           $gen=$_POST['gender'];
           

            $sql="UPDATE user_register SET email='$email',first_name='$fname',last_name='$lname',address='$add',date_of_birth='$dob',gender='$gen' where user_id=$user_id";


//
            $result=mysqli_query($con,$sql);

            if($result)
            {
               
                 echo "<script type='text/javascript'>alert('profile updated successfully');</script>";
                  header('Location: profile.php');
            }
            }

            
            ?>