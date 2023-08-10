<?php
    include "link.php";
    session_start();
    $id=$_SESSION['ID'];
    if (isset($_SESSION['ID'])&&isset($_SESSION['Name'])&&isset($_SESSION['email'])&&isset($_SESSION['phone'])) {
        if (isset($_POST['submit']) && $_POST['submit']=='schedule') {
            # code...
            $st=$_POST['st'];
            $et=$_POST['et'];
            $work=$_POST['selector'];
            $statusquery="SELECT `achrsID` FROM `thacthrs` WHERE `thID`='$id' AND `workdays`='$work';";
            $statusres=mysqli_query($mysqli,$statusquery);
            if(mysqli_num_rows($statusres)==0){
                $action="INSERT INTO `thacthrs`( `thID`, `startTime`, `endTime`, `workdays`) VALUES ('$id','$st','$et','$work');";
            }
            if(mysqli_num_rows($statusres)==1){
                $resset=mysqli_fetch_assoc($statusres);
                $acid=$resset['achrsID'];
                $action="UPDATE `thacthrs` SET `startTime`='$st',`endTime`='$et' WHERE `achrsID`='$acid';";
            }
            $actionres=mysqli_query($mysqli,$action);
            if($actionres){
                header("Location: therapisthome.php?message=Scheduled updated successfully");
            }else{
                header("Location: therapisthome.php?message=Couldn't Set up your schedule");
            }
            
        }

    }else{
        header("Location: getstarted.php?message=Kindly log in or sign up");
     }
?>