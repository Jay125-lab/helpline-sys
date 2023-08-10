<?php
session_start();
include "link.php";

if (isset($_SESSION['ID'])&&isset($_SESSION['clientName'])&&isset($_SESSION['email'])&&isset($_SESSION['phone'])) {
  # code..
  if (isset($_POST)) {
    # code...
    print_r($_POST);
    $id=$_SESSION['ID'];
    $tid=$_POST['thid'];

    $insertresponsequery="UPDATE `clienttherapist` SET `assignmentStatus`='dropped' WHERE `th_ID`='$tid' AND `cl_ID`='$id';";
    $insertresponseresult=mysqli_query($mysqli,$insertresponsequery);
    if ($insertresponseresult) {
        # code...
        header("Location: clienthome.php?message=You have dropped your current therapits. Please wait to be assigned a new one.");   
    }else{
        // print_r($insertresponseresult);
        header("Location: clienthome.php?message=Your action wasn't successful. Please try again");   
    }
  }
  
}
?>