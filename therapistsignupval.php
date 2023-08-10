<?php

    function uploadImage($id){
        
        $img_name=$_FILES['profilepic']['name'];
        $img_size=$_FILES['profilepic']['size'];
        $tmp_name=$_FILES['profilepic']['tmp_name'];
        $error=$_FILES['profilepic']['error'];
        
        if ($error===0) {
            if ($img_size>20000000) {

                return FALSE;	
            }else {
                $img_ex=pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc=strtolower($img_ex);
                $allowed_exs=array("jpg","jpeg","png");   
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
                    echo "<br>";
                    $img_upload_path='therapistprofpic/'.$new_img_name;
                    echo "<br>";
                    $imgcheck=move_uploaded_file($tmp_name, $img_upload_path);
                    
                    include "link.php";
                    //insert into db
                    $insertimg="INSERT INTO `thpictbl`(`thID`, `imgName`) VALUES ('$id','$new_img_name')";
                    $res=mysqli_query($mysqli,$insertimg);
                    if($res && $imgcheck){
                        return TRUE;
                    }else {
                        return FALSE;
                    }
                }else {
                    return FALSE;
                }
            }
        }else {
            return FALSE;
        }
    }

    function uploadDocument($id){
        $docs = $_FILES['document'];
        $file_count = count($docs['name']);
        $doccount=0;
        print_r($_FILES['document']);
    for( $i=0 ; $i < $file_count ; $i++ ) {
        echo"<br>";
        echo $file_count;
        $doc_name=$docs['name'][$i];
        $doc_size=$docs['size'][$i];
        $tmp_name=$docs['tmp_name'][$i];
        $error=$docs['error'][$i];
        if ($error===0) {
            
            if ($doc_size>2000000000000) {
                return FALSE;	
                }else {
                    $doc_ex=pathinfo($doc_name, PATHINFO_EXTENSION);
                    $doc_ex_lc=strtolower($doc_ex);
                    $allowed_exs=array("doc","docx","pdf","epub","odf");   
                    if (in_array($doc_ex_lc, $allowed_exs)) {
                        $new_doc_name=uniqid("DOC-",true).'.'.$doc_ex_lc;
                        $doc_upload_path='therapistdocs/'.$new_doc_name;
                        $doccheck=move_uploaded_file($tmp_name, $doc_upload_path);
                        include "link.php";
                        //insert into db
                        $insertdoc="INSERT INTO `thdoctbl`(`thID`, `docOrigName`, `docNewName`) VALUES ('$id','$doc_name','$new_doc_name')";
                        $res=mysqli_query($mysqli,$insertdoc);
                        print_r($mysqli);
                        if($res&&$doccheck){
                            $doccount++;
                        }else {
                            return FALSE;
                        }
                        if ($doccount==$file_count) {
                            # code...
                            return TRUE;
                        }
                    }else {
                        return FALSE;
                    }
                }  
        }else {
            return FALSE;
        }
    }
        
    }



    include "link.php";
    // include "upload.php";
    if (isset($_POST["email"])) {
        # code...
        
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
        $age=validate($_POST['age']);
        $gender=validate($_POST['gender']);
        $education=validate($_POST['education']);
        $county=validate($_POST['county']);
        $psd=validate($_POST["password"]);
        $psdchk=validate($_POST["passwordchk"]);
        //check if email is taken
        $sql1 = "SELECT * FROM `thinfo` WHERE email='$email'; ";
        $result1 = mysqli_query($mysqli, $sql1);
        if (mysqli_num_rows($result1)>0) {
        header("Location: getstarted.php?message=The email address is alredy taken. Kindly use another email.");
        }
        else {
            # code...
            if ($psd!=$psdchk) {
                header("Location: getstarted.php?message=Password match fail. Kindly fill in the details and ensure the pasword matches with the repeated password.");
            }else{
                //hashing the password
                $cryptpsd=hash('sha512',$psd);
                $insertsql="INSERT INTO `thinfo`(`fname`, `lname`, `education`, `age`, `residence`, `gender`, `phoneNo`, `email`, `pswd`, `status`) VALUES ('$fname','$lname','$education','$age','$county','$gender','$phone','$email','$cryptpsd','unverified')";
                $result2 = mysqli_query($mysqli, $insertsql);
                $result2=TRUE;
                if ($result2 ) {
                    $idquery="SELECT `thID` FROM `thinfo` WHERE `email`='$email';";
                    $idresult=mysqli_query($mysqli,$idquery);


                    if ($idresult) {
                        # code...
                        $therapist=mysqli_fetch_assoc($idresult);
                        $tid=$therapist['thID'];
                        $imageres=uploadImage($tid);
                        $docres=uploadDocument($tid);
                        if($docres && $imageres){
                            header("Location: getstarted.php?message=The account has been created succesfully Log in.");   
                        }
                    }
                    
    
                } else{
                    header("Location: getstarted.php?message=Something went wrong.");
                }
            }
        }
            
    }else {
        echo "nope";
    }

?>