<?php
    include "link.php";
    session_start();
    if (isset($_SESSION['ID'])&&isset($_SESSION['email'])) {
    
        if (isset($_POST['thid'])&& isset($_POST['submit'])){
            if ($_POST['submit']=="verify") {
                # code...
                $therapistid=$_POST['thid'];
                $action=$_POST['submit'];
                $updatequery="UPDATE `thinfo` SET `status`='verified' WHERE `thID`='$therapistid';";
                $updateres=mysqli_query($mysqli,$updatequery);
                if($updateres){
                    header("Location: adminverifytherapist.php?message=The therapist has been verified successfully.");
                }else {
                    # code...
                    header("Location: adminverifytherapist.php?message=The therapist has not yet been verified.");
                }
            }
            if ($_POST['submit']=="deny") {
                # code...
                $therapistid=$_POST['thid'];
                $action=$_POST['submit'];
                $updatequery="UPDATE `thinfo` SET `status`='declined' WHERE `thID`='$therapistid';";
                $updateres=mysqli_query($mysqli,$updatequery);
                if($updateres){
                    header("Location: adminverifytherapist.php?message=The therapist application has been denied.");
                }else {
                    # code...
                    header("Location: adminverifytherapist.php?message=The therapist application has not been declined. Try again");
                }
            }
        }else {
            # code...
            header("Location: adminverifytherapist.php?message=The form is incomlete.Try again");
        }
    }else {
        # code...
        header("Location: getstarted.php?message=Please sign in.");
    }
?>