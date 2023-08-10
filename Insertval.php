<?php
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$phonenumber = $_POST["phonenumber"];
$emailaddress = $_POST["emailaddress"];


$servername = "localhost";
$username ="root";
$password = "";
$dbname ="helpline";

$conn = new mysqli($servername,$username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
  // $sql="INSERT  INTO register (fname, lname, phonenumber, emailaddress)";
  // $sql="INSERT  INTO register (fname, lname, phonenumber, emailaddress) VALUES ('John', 'doe', '0757244067','johndoe@gmail.com')";
  $sql="INSERT  INTO register (fname, lname, phonenumber, emailaddress) VALUES ('{$fname}','{$lname}' ,'{$phonenumber}','{$emailaddress}')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else{
    echo "Error:" .$sql ."<br>" .$conn->error;
  }
/*
  $stmt = $conn->prepare($SELECT);
  $stmt->bind_param("s",$emailaddress);
  $stmt->execute();
  $stmt->bind_result($emailaddress);
  $stmt->store_result();
  $rnum =$stmt->num_rows;

  if($rnum==0){
    $stmt->close();

    $stmt= $conn->prepare($INSERT);
    $stmt->bind_param("sssi",$fname,$lname, $phonenumber, $emailaddress);
    $stmt->execute();
    echo "New Record Inserted Succesfully";
  }else{
    echo  "Someone already registerd with this emailaddress";
  }
  $stmt->close();
  $stmt->close();


    }else {
        echo "all fields are required";
        die();
    }
    */
    $conn->close();
    ?>