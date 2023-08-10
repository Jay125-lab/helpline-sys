<?php
include "link.php";

if (isset($_POST['email'])&& isset($_POST['psd'])){
  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $email=validate($_POST['email']);
  $psd=validate($_POST['psd']);
  $cryptpsd=hash('sha512',$psd);

  $sql11 = "SELECT * FROM signupcl WHERE email='$email'";
	$result11 = mysqli_query($mysqli, $sql11);
  $sql22 = "SELECT * FROM thinfo WHERE email='$email'";
  $result22 = mysqli_query($mysqli, $sql22);
  $sql33 = "SELECT * FROM administration WHERE email='$email'";
  $result33 = mysqli_query($mysqli, $sql33);
  $r1=mysqli_num_rows($result11);
  $r2=mysqli_num_rows($result22);
  $r3=mysqli_num_rows($result33);
  $tot=$r1+$r2+$r3;
  if ($tot==0) {
    # code...
    header("Location: getstarted.php?message=Email is not found");
  }
  if ($tot>1) {
    # code...
    header("Location: getstarted.php?message=There exists two emails with the same email address.");
  }

	$sql1 = "SELECT * FROM signupcl WHERE email='$email' AND psd='$cryptpsd'";
	$result1 = mysqli_query($mysqli, $sql1);
  $sql2 = "SELECT * FROM thinfo WHERE email='$email' AND pswd='$cryptpsd'";
  $result2 = mysqli_query($mysqli, $sql2);
  $sql3 = "SELECT * FROM administration WHERE email='$email' AND `password`='$cryptpsd'";
  $result3 = mysqli_query($mysqli, $sql3);
	if (mysqli_num_rows($result1) === 1 && mysqli_num_rows($result2) === 0 && mysqli_num_rows($result3) === 0) {
    echo "yes";
		$row = mysqli_fetch_assoc($result1);
    if ($row['email'] === $email && $row['psd'] === $cryptpsd) {
      session_start(); 
      $_SESSION['ID'] = $row['ID'];
      $_SESSION['clientName'] = $row['fname']." ".$row['lname'];
			$_SESSION['email'] = $row['email'];
      $_SESSION['phone']="0".$row['phone'];
      header("Location: clienthome.php");
    }
      else{
			  header("Location: getstarted.php?message=User account is not found! check your credentials again");
		    exit();
			}
  }
    if (mysqli_num_rows($result2) === 1 && mysqli_num_rows($result1) === 0 && mysqli_num_rows($result3) === 0) {
      echo "no";
      $row = mysqli_fetch_assoc($result2);
      if ($row['email'] === $email && $row['pswd'] === $cryptpsd) {
        session_start(); 
        $_SESSION['ID'] = $row['thID'];
        $_SESSION['Name'] = $row['fname']." ".$row['lname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['phone']="0".$row['phone'];
        header("Location: therapisthome.php");
      }
      else{
        header("Location: getstarted.php?message=User account is not found! check your credentials again");
        exit();
      }
      
    }
    if (mysqli_num_rows($result3) === 1 && mysqli_num_rows($result2) === 0 && mysqli_num_rows($result1) === 0) {
      echo "maybe";
      $row = mysqli_fetch_assoc($result3);
      if ($row['email'] === $email && $row['password'] === $cryptpsd) {
        session_start(); 
        $_SESSION['ID'] = $row['adID'];
        $_SESSION['email'] = $row['email'];
        header("Location: adminhome.php");
      }
      else{
        header("Location: getstarted.php?message=User account is not found! check your credentials again");
        exit();
      }
    }
}
else {
      # code...
  header("Location: getstarted.php?message=Kindly fill all entries");
}
?>