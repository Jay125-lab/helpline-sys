<?php
$dbhost = 'localhost';
// $dbuser ='helplineuser';
// $dbpass = 'E0!yym#wXwwwb*K3';
$dbuser='root';
$dbpass='';
$dbname = 'helplinev1';
$mysqli =mysqli_connect($dbhost,$dbuser, $dbpass, $dbname);
if (!$mysqli){
    printf("connection failed");
    // exit();
}else{
//    printf("connection sucessfully");   
//    echo "yes";
}

//printf("connection sucessfully");

//$mysqli->close();
?>