<?php
include "link.php";
session_start();

if (isset($_SESSION['ID'])&&isset($_SESSION['email'])) {
  # code...
    $therapistquery="SELECT `thID`, `fname`, `lname`, `education`, `age`, `residence`, `gender`, `phoneNo`, `email` FROM `thinfo` WHERE `status`='unverified';";
    $therapistres=mysqli_query($mysqli,$therapistquery);


?>

<!DOCTYPE html>
<head>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible"content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scae=1.0" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <link rel="stylesheet" href="main.css" />
     <link rel = "icon" href ="hlog.png" type = "image/x-icon">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <style>

     </style>
</head>
<body>
<div class="header">
  <h1>Helpline</h1>
</div>
<div class="navi" id="navi">
  <a href="therapisthome.php">Home</a>
  <a href="#about">About</a>
  <a href="#contact">Contact</a>
  <a href="logout.php" class="split" id="split">Log Out</a> 
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>        
    
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
          <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item cl"><a href="adminhome.php">Assign new client therapist</a></li>
                <li class="breadcrumb-item cl"><a href="admindroppedclients.php">Assign dropped clients therapist</a></li>
                <!-- <li class="breadcrumb-item cl"><a href="clierepor.php">Assesment Reports</a></li>
                <li class="breadcrumb-item cl"><a href="payment.php">Payment</a></li> -->
                <li class="breadcrumb-item cl"><a href="adminverifytherapist.php" class="active">Verify Therapists</a></li>
              </ol>
            </nav>
            <div class="main">
              <h2>Welcome Admin</h2>
              <!-- <p>Thank you for providing resources and support for individuals seeking help with addiction issues.</p> -->
          </div>
            <?php if (isset($_GET['message'])) { ?>
                <br>
                <div class="container" style="color:#05386B; text-align:center;"> 
                <p> <?php echo $_GET['message']; ?> </p>
                </div>
            <?php } ?>
            </div>
                <?php
                    if (mysqli_num_rows($therapistres)==0) {
                        # code...
                ?>   
                        <h5 class="display-6">You do not have any therapists to verify</h5>
                <?php
                    }else{
                        $i=1;
                    ?>
                    <table class="table caption-top">
                        <caption>List of pending Clients who do not have an assigned therapist</caption>
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <!-- <th scope="col">Phone Number</th> -->
                            <th scope="col">Email</th>
                            <th scope="col">Age</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Education Level</th>
                            <th scope="col">Area of recidence</th>
                            <th scope="col">Certificates</th>
                            <th scope="col">Verify</th>
                            <th scope="col">Decline</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                            foreach ($therapistres as $therapist) {
                                # code...
                                $therapistid=$therapist['thID'];
                                $name=$therapist['fname']." ".$therapist['lname'];
                                $email=$therapist['email'];
                                $number="0".$therapist['phoneNo'];
                                $age=$therapist['age'];
                                $residence=$therapist['residence'];
                                $education=$therapist['education'];
                                $gender=$therapist['gender'];
                                $documentquery="SELECT `docOrigName`, `docNewName` FROM `thdoctbl` WHERE `thID`='$therapistid';";
                                $therapistdocres=mysqli_query($mysqli,$documentquery);
                            
                            ?>
                            <th scope="row"><?php echo $i;?></th>
                            <td><?php echo $name;?></td>
                            <!-- <td><?php //echo $number;?></td> -->
                            <td><?php echo $email;?></td>
                            <td><?php echo $age;?></td>
                            <td><?php echo $gender;?></td>
                            <td><?php echo $education;?></td>
                            <td><?php echo $residence;?></td>
                            <td><?php 
                            //certificates
                            if (mysqli_num_rows($therapistdocres)==0) {
                              # code...
                              echo "Not Available";
                            }
                            if (mysqli_num_rows($therapistdocres)==1) {
                              # code...
                              $docres=mysqli_fetch_assoc($therapistdocres);
                              $docname=$docres['docOrigName'];
                              $filename=$docres['docNewName'];
                              echo "<a href=\".\\therapistdocs\\".$filename."\" target=\"_blank\">".$docname."</a><br>";
                             // echo"<a href=\"http://therapistdocs/".$filename."\" target=\"_blank\" rel=\"noopener noreferrer\">".$docname."</a>";
                            }
                            if (mysqli_num_rows($therapistdocres)>1) {
                              # code...
                              foreach ($therapistdocres as $docres) {
                                # code...
                                $docname=$docres['docOrigName'];
                                $filename=$docres['docNewName'];
                                echo "<a href=\".\\therapistdocs\\".$filename."\" target=\"_blank\">".$docname."</a><br>";
                              }
                            }
                            ?>
                            </td>
                            <td>
                                <form action="adminverifytherapistval.php" method="post">
                                <input type="hidden" id="thID" name="thid" value="<?php echo $therapistid;?>">
                                <button type="submit" class="btn btn-outline-primary" id="btn" name="submit" value="verify" onmouseover="hoverbtn(this)" onmouseout="normalbtn(this)">Verify</button>
                            </td>
                            <td>
                            <button type="submit" class="btn btn-outline-primary" id="btn" name="submit" value="deny" onmouseover="hoverbtn(this)" onmouseout="normalbtn(this)">Decline</button>
                            </td>
                            </form>
                            </tr>
                            <?php
                            $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                    }
                ?>
          </div>
        </div>
        <section class="">
  <!-- Footer -->
  <footer class="bg-secondary text-white text-center text-md-start">
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase">Footer Content</h5>

          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
            molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae
            aliquam voluptatem veniam, est atque cumque eum delectus sint!
          </p>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Link 1</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-0">Links</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!" class="text-white">Link 1</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</section>
<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  </body>
</html>
<?php
}else{
  header("Location: getstarted.php?message=Kindly log in or sign up");
}
?>