<?php
session_start();
include "link.php";

if (isset($_SESSION['ID'])&&isset($_SESSION['clientName'])&&isset($_SESSION['email'])&&isset($_SESSION['phone'])) {
  # code...
  $id=$_SESSION['ID'];
  $therapistidquery="SELECT `th_ID` FROM `clienttherapist` WHERE `cl_ID`='$id' AND `assignmentStatus`='active'";
  $therapistidres=mysqli_query($mysqli,$therapistidquery);

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
        <title>Helpline Home</title>
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
  <a href="clienthome.php">Home</a>
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
                <li class="breadcrumb-item cl"><a href="clienthome.php" class="active">Home</a></li>
                <li class="breadcrumb-item cl"><a href="clientreport.php">Assesment Reports</a></li>
                <li class="breadcrumb-item cl"><a href="clientselfassessment.php">Self Assessment</a></li>
                <li class="breadcrumb-item cl"><a href="#">Progress</a></li>
                <li class="breadcrumb-item cl"><a href="#">My Schedule</a></li>
                <li class="breadcrumb-item cl"><a href="clienttherapistfeedback.php">Therapist Feedback</a></li>
              </ol>
            </nav>
            <div class="main">
              <h2>Welcome <?php echo $_SESSION['clientName']; ?> to our drug addiction support website</h2>
              <p>This website provides resources and support for individuals seeking help with addiction issues.</p>
            </div>
          </div>

        </div>
        <?php if (isset($_GET['message'])) { ?>
                <br>
                <div class="container" style="color:#05386B; text-align:center;"> 
                <p> <?php echo $_GET['message']; ?> </p>
                </div>
                <?php } ?>
        <div class="row">
          <div class="col">
          <?php
                    if (mysqli_num_rows($therapistidres)==0) {
                        # code...
                ?>   
                        <h5 class="display-6">You do not have any therapist assigned to you</h5>
                <?php
                    }else{
                        $i=1;
                    ?>
                    <table class="table caption-top">
                        <caption>Your assigned Therapist information</caption>
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Area of residence</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Consultation Hours</th>
                            <th scope="col">Dismiss Therapist</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                            foreach ($therapistidres as $clientidar) {
                                # code...
                                $clientid=$clientidar['th_ID'];
                                $clientinfoquery="SELECT `fname`, `lname`, `residence`, `gender`, `phoneNo`, `email` FROM `thinfo` WHERE `thID`='$clientid'";
                                $clientinfores=mysqli_query($mysqli,$clientinfoquery);
                                $clientinfo=mysqli_fetch_assoc($clientinfores);
                                $name=$clientinfo['fname']." ".$clientinfo['lname'];
                                $email=$clientinfo['email'];
                                $number="0".$clientinfo['phoneNo'];
                                $gender=$clientinfo['gender'];
                                $residence=$clientinfo['residence'];
                                
                               
                            
                            ?>
                            <div class="modal  modal-fullscreen-sm-down fade" id="clientdismissToggle" tabindex="-1" aria-labelledby="clientdismissModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="clientdismissModalLabel">Therapist Dismissal</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  
                    <div class="modal-body">
                    <form action="clientdismissval.php" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="thid" value="<?php echo $clientid;?>">
                      Are you sure you want to dismiss <?php echo $name;?> from being your therapist?
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-outline-danger" name="submit">Dismiss</button>
                    </div>
                  </form>  
                </div>
              </div>
            </div>
                            <th scope="row"><?php echo $i;?></th>
                            <td><?php echo $name;?></td>
                            <td><?php echo $number;?></td>
                            <td><?php echo $email;?></td>
                            <td><?php echo $residence;?></td>
                            <td><?php echo $gender;?></td>
                            <td>
                              <?php
                              $sched="SELECT  `startTime`, `endTime`, `workdays` FROM `thacthrs` WHERE `thID`='$clientid';";
                              $scheduleres=mysqli_query($mysqli,$sched);
                                if(mysqli_num_rows($scheduleres)==0){
                                  echo "Not Available";
                                }if(mysqli_num_rows($scheduleres)>0){
                                  foreach ($scheduleres as $schd) {
                                    # code...
                                    $st=$schd['startTime'];
                                    $et=$schd['endTime'];
                                    $wk=$schd['workdays'];
                                    echo $wk.":".$st."-".$et;
                                    echo"<br>";
                                  }
                                }
                                 $clientinfo=mysqli_fetch_assoc($clientinfores);
                              ?>
                            </td>
                            <td><div class="d-grid gap-2">
                                  <button id="btn" class="btn btn-outline-primary btn-lg" type="button" data-bs-toggle="modal" href="#clientdismissToggle" >Dismiss</button>
                              </div>
                            </td>
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
    </div>
    <!-- Footer -->
    <footer class="bg-secondary text-white text-center text-md-start">
      <!-- Grid container -->
      <div class="container p-4">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase">Helpline</h5>

            <p>
              Thank you for choosing us
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <!-- <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
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
          </div> -->
          <!--Grid column-->

          <!--Grid column-->
          <!-- <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
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
          </div> -->
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 ft" style="background-color: #111; color: #adb5bd;">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
          Copyright © 2023. All rights reserved.
        </div>
        <!-- Copyright -->
    
        <!-- Right -->
        <div>
          <a href="#!" class="text-white me-4">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#!" class="text-white me-4">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#!" class="text-white me-4">
            <i class="fab fa-google"></i>
          </a>
          <a href="#!" class="text-white">
            <i class="fab fa-linkedin-in"></i>
          </a>
        </div>
        <!-- Right -->
      </div>
    <!-- Copyright -->
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  
<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  </body>
</html>
<?php
}else{
  header("Location: getstarted.php?message=Kindly log in or sign up");
}
?>