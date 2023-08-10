<?php
    include "link.php";
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
                    $img_upload_path='therapistprofpic/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    include "link.php";
                    //insert into db
                    $insertimg="INSERT INTO `thpictbl`(`thID`, `imgName`) VALUES ('$id','$new_img_name')";
                    $res=mysqli_query($mysqli,$insertimg);
                    if($res){
                        echo $id;
                        echo "okay1";
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
        $doc_name=$_FILES['document']['name'];
        $doc_size=$_FILES['document']['size'];
        $tmp_name=$_FILES['document']['tmp_name'];
        $error=$_FILES['document']['error'];
        if ($error===0) {

            
            $total_count = count($_FILES['document']['name']);
            // Loop through every file
            for( $i=0 ; $i < $total_count ; $i++ ) {
                if ($doc_size>2000000000000) {
                return FALSE;	
                }else {
                    $doc_ex=pathinfo($doc_name, PATHINFO_EXTENSION);
                    $doc_ex_lc=strtolower($doc_ex);
                    $allowed_exs=array("doc","docx","pdf","epub","odf");   
                    if (in_array($doc_ex_lc, $allowed_exs)) {
                        $new_doc_name=uniqid("DOC-",true).'.'.$doc_ex_lc;
                        $doc_upload_path='therapistdocs/'.$new_doc_name;
                        move_uploaded_file($tmp_name, $doc_upload_path);
                        include "link.php";
                        //insert into db
                        $insertdoc="INSERT INTO `thdoctbl`(`thID`, `docName`) VALUES ('$id','$new_doc_name')";
                        $res=mysqli_query($mysqli,$insertdoc);
                        if($res){
                            echo "okay2";
                            return TRUE;
                        }else {
                            return FALSE;
                        }
                    }else {
                        return FALSE;
                    }
                }  
            }
        }else {
            return FALSE;
        }
    }
?>
