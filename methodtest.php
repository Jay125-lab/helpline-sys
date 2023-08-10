<?php
include "link.php";
session_start();
function pic(){
  $img_name=$_FILES['my_image']['name'];
	$img_size=$_FILES['my_image']['size'];
	$tmp_name=$_FILES['my_image']['tmp_name'];
	$error=$_FILES['my_image']['error'];
  include "link.php";
	if ($error===0) {
		if ($img_size>20000000) {
		$em="File size is too large!";
		header("Location: myprofile.php?error=$em");	
		}else{
			$img_ex=pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc=strtolower($img_ex);
			$allowed_exs=array("jpg","jpeg","png");

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
				$img_upload_path='uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// $user_id=$_SESSION['UserID'];
        $user_id=1;

					//insert into db
				$sql="INSERT INTO imgtbl (userID, imgName) VALUES ('$user_id','$new_img_name') ";
				$picsuc=mysqli_query($mysqli,$sql); 
        if ($picsuc) {
          # code...
          echo "success!";
        }
				// header("Location:myprofile.php");


			}
      else{
				$em="You cant upload files of this type!";
				// header("Location: myprofile.php?error=$em");
			}
    }
  }
}
?>