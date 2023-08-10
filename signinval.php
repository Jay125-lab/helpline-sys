<?php
include "link.php";
if (isset($_POST['fname']) && isset($_POST['lname'])&& isset($_POST['phone'])&& isset($_POST['email'])&& isset($_POST['psd'])&& isset($_POST['psdchk'])){
      function validate($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
      }
      $fname=validate($_POST["fname"]);
      $lname=validate($_POST["lname"]);
      $phone=validate($_POST["phone"]);
      $email=validate($_POST["email"]);
      $psd=validate($_POST["psd"]);
      $psdchk=validate($_POST["psdchk"]);
      //check if email is taken
      $sql1 = "SELECT * FROM signupcl WHERE email='$email'; ";
      $result1 = mysqli_query($mysqli, $sql1);
      if (mysqli_num_rows($result1)>0) {
        header("Location: getstarted.php?message=The email address is alredy taken. Kindly use another email.");
      }else {
        # check if passwords match
        if ($psd!=$psdchk) {
          header("Location: getstarted.php?message=Password match fail. Kindly fill in the details and ensure the pasword matches with the repeated password.");
        }else{
          //inserting the image
          $img_name=$_FILES['profilepic']['name'];
          $img_size=$_FILES['profilepic']['size'];
          $tmp_name=$_FILES['profilepic']['tmp_name'];
          $error=$_FILES['profilepic']['error'];
          
          if ($error===0) {
              if ($img_size>20000000) {
                header("Location: getstarted.php?message=Image size is too big.");
              }else {
                  $img_ex=pathinfo($img_name, PATHINFO_EXTENSION);
                  $img_ex_lc=strtolower($img_ex);
                  $allowed_exs=array("jpg","jpeg","png");   
                  if (in_array($img_ex_lc, $allowed_exs)) {
                      $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
                      $img_upload_path='clientprofpic/'.$new_img_name;
                      $imgcheck=move_uploaded_file($tmp_name, $img_upload_path);
                      if($imgcheck){
                        //hashing the password
                        $cryptpsd=hash('sha512',$psd);
                        //inserting the values in the database
                        $sql2 = "INSERT INTO signupcl(`fname`,`lname`,`phone`,`email`,`pic`,`psd`) VALUES('$fname','$lname' ,'$phone','$email','$new_img_name', '$cryptpsd');";   
                        $result2 = mysqli_query($mysqli, $sql2);
                        if ($result2) {
                          header("Location: getstarted.php?message=The account has been created succesfully Log in."); 
                        } else{
                          header("Location: getstarted.php?message=Something went wrong. Could not register you");
                        }
                      }else {
                        header("Location: getstarted.php?message=Profile picture wasn't inserted. Try again");
                      }
                  }else {
                    header("Location: getstarted.php?message=Image format is not allowd. Kinfly use jpg, jpeg,png file formats");
                  }
              }
          }else {
            header("Location: getstarted.php?message=Something didn't work. Try again");
          }
          
        }
      }  
} else {
  header("Location: getstarted.php?message=Kindly fill in all fields.");
}      
?>