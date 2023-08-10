<?php
session_start();
include "link.php";

if (isset($_SESSION['ID'])&&isset($_SESSION['clientName'])&&isset($_SESSION['email'])&&isset($_SESSION['phone'])) {
  # code..
  if (isset($_POST)) {
    # code...
    print_r($_POST);
    $id=$_SESSION['ID'];
    $therapistidquery="SELECT `th_ID` FROM `clienttherapist` WHERE `cl_ID`='$id'";
    $therapistidres=mysqli_query($mysqli,$therapistidquery);
    $thrpedfetch=mysqli_fetch_assoc($therapistidres);
    $tid=$thrpedfetch['th_ID'];
    $q1=$_POST['q1'];
    $q2=$_POST['q2'];
    $q3=$_POST['q3'];
    $q4=$_POST['q4'];
    $q5=$_POST['q5'];
    $q6=$_POST['q6'];
    $q7=$_POST['q7'];
    $q8=$_POST['q8'];
    $q9=$_POST['q9'];
    $q10=$_POST['q10'];
    $q11=$_POST['ptext'];
    $totalscore=$q1+$q2+$q3+$q4+$q5+$q6+$q7+$q8+$q9+$q10;
    $date=date("Y-m-d");
    $time=date("H:i:s");
    $insertresponsequery="INSERT INTO `clientselfassessment`( `clID`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `total`, `subDate`, `subTime`,`q11`) VALUES ('$id','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$totalscore','$date','$time','$q11');";
    $insertresponseresult=mysqli_query($mysqli,$insertresponsequery);
    if ($insertresponseresult) {
        # code...
        header("Location: clientselfassessment.php?message=Your feedback has been recorded successfully.");   
    }else{
        // print_r($insertresponseresult);
        header("Location: clientselfassessment.php?message=Your feedback has not been recorded. Please try again");   
    }
  }
  
}
?>