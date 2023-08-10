<?php
include "link.php";
session_start();
if (isset($_SESSION['ID'])&&isset($_SESSION['email'])) {

    if (isset($_POST['clId'])&& isset($_POST['therapist'])){
        print_r($_POST);
        
        $clientid=$_POST['clId'];
        $therapistid=$_POST['therapist'];
        if ($_POST['submit']=='insert') {
            # code...
            if($_POST['therapist']=='Choose one'){
                header("Location: adminhome.php?message=Kindly select a therapist to assign to the client");
            }
            $assigninsert="INSERT INTO `clienttherapist`( `cl_ID`, `th_ID`, `assignmentStatus`) VALUES ('$clientid','$therapistid','active')";
            $execassign=mysqli_query($mysqli,$assigninsert);
            if ($execassign) {
                # code...
                header("Location: adminhome.php?message=Client has been assigned a therapist successfully");
            }else {
                header("Location: adminhome.php?message=Could not assign a therapist. Please try again");
            }
        }
        if ($_POST['submit']=='update') {
            # code...
            if($_POST['therapist']=='Choose one'){
                header("Location: admindroppedclients.php?message=Kindly select a therapist to assign to the client");
            }
            $assigninsert="UPDATE `clienttherapist` SET `th_ID`='$therapistid',`assignmentStatus`='active' WHERE `cl_ID`='$clientid';";
            $execassign=mysqli_query($mysqli,$assigninsert);
            if ($execassign) {
                # code...
                header("Location: admindroppedclients.php?message=Client has been assigned a therapist successfully");
            }else {
                header("Location: admindroppedclients.php?message=Could not assign a therapist. Please try again");
            }
        }
        
    }else {
        # code...
        header("Location: adminhome.php?message=Something went wrong. Kindly try again");
    }
}else{
  header("Location: getstarted.php?message=Kindly log in or sign up");
}
?>