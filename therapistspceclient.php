<?php
include "link.php";
session_start();

if (isset($_SESSION['ID'])&&isset($_SESSION['Name'])&&isset($_SESSION['email'])&&isset($_SESSION['phone'])) {
  # code...
    if($_GET['clid']){
      $_SESSION['clientid']=$_GET['clid'];
      $clid=$_GET['clid'];
    }else{
      $clid=$_SESSION['clientid'];
    }
    
    $id=$_SESSION['ID'];
    $clientidquery="SELECT `assignmentStatus` FROM `clienttherapist` WHERE `cl_ID`='$clid'";
    $clientidres=mysqli_query($mysqli,$clientidquery);
    $statusquery="SELECT  `status` FROM `thinfo` WHERE `thID`='$id';";
    $statusres=mysqli_query($mysqli,$statusquery);
    $statusarray=mysqli_fetch_assoc($statusres);
    $status=$statusarray['status'];
    $clientprogressquery="SELECT `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `total`, `subDate`, `subTime`, `q11` FROM `clientselfassessment` WHERE `clID`='$clid';";
    $clientprogressres=mysqli_query($mysqli,$clientprogressquery);

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
                <li class="breadcrumb-item cl"><a href="therapisthome.php" class="active">Home</a></li>
                <!-- <li class="breadcrumb-item cl"><a href="clierepor.php">Assesment Reports</a></li>
                <li class="breadcrumb-item cl"><a href="payment.php">Payment</a></li> -->
                <li class="breadcrumb-item cl"><a href="#">Client Progress</a></li>
                <li class="breadcrumb-item cl"><a href="#">Meetings</a></li>
              </ol>
            </nav>
            <div class="main">
              <h2>Welcome <?php echo $_SESSION['Name']; ?></h2>
              <p>Thank you for providing resources and support for individuals seeking help with addiction issues.</p>
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
              if ($status=="unverified") {
                # code...
                echo "<h1 class=\"display-6\">Your registration is awaiting verification. Please check back occassionally to see if your application has been verified</h1>";
              }
              if ($status=="declined") {
                # code...
                echo "<h1 class=\"display-6\">Unfortunately, your application has been declined due to not meeting requirements.</h1>";
              }
              if ($status=="verified") {
                # code...
                ?>
                <?php
                if (mysqli_num_rows($clientidres)==0) {
                  # code...
                ?>   
                  <h5 class="display-6">You do not have any clients assigned to you</h5>
                  <div>
                    <div class="caption-top">
                    <caption>List of Asigned Clients</caption>
                      <form action="" method="post">
                      <div class="row mb-4">
                        <div class="col">
                          <label for="firstName" class="form-label">First name</label>
                          <input type="time" class="form-control" placeholder="First name" aria-label="First name" name="fname" autocomplete="off" required>
                        </div>
                        <div class="col">
                          <label for="lastName" class="form-label">Last Name</label>
                          <input type="time" class="form-control" placeholder="Last name" aria-label="Last name" name="lname" autocomplete="off" required>
                        </div>
                        <div class="col"><button type="submit" class="btn btn-primary" name="submit">Enter schedule</button></div>
                      </div>
                      </form>
                    </div>
                  </div>
                  <?php
                      }else{
                          $i=1;
                      ?>
                  <div class="caption-top">
                    <caption><h5>Set Meeting Details</h5></caption>
                    <div >
                      
                      <form action="therapistactivehoursval.php" method="post">
                        <div class="row mb-4">
                        <div class="col">
                            <label for="startTime" class="form-label">Meeting Date</label>
                            <input type="date" class="form-control" placeholder="HH:MM" aria-label="Start time" name="st" autocomplete="off" required>
                          </div>
                          <div class="col">
                            <label for="startTime" class="form-label">Meeting Start</label>
                            <input type="time" class="form-control" placeholder="HH:MM" aria-label="Start time" name="st" autocomplete="off" required>
                          </div>
                          <div class="col">
                            <label for="endTime" class="form-label">Meeting End</label>
                            <input type="time" class="form-control" placeholder="HH:MM" aria-label="End time" name="et" autocomplete="off" required>
                            </div>
                            <div class="col-4">
                              <label for="Gender" class="form-label">Weekdays and weekends selector</label>
                                <select name="selector" id="selector" aria-label="selector" class="form-select" autocomplete="off" required>
                                <option selected>Choose...</option>
                                <option value="weekdays">Once</option>
                                <option value="weekends">Daily</option>
                                <option value="weekends">Weekly</option>
                              </select>
                            </div>
                            <div class="col">
                            <label for="Gender" class="form-label"></label>
                              <button type="submit" class="btn btn-outline-primary" name="submit" value="schedule">Enter schedule</button>
                            </div>
                        </div>
                      </form>
                    </div>
                  </div>
                      <table class="table caption-top">
                          <caption>List of Asigned Clients</caption>
                          <thead>
                              <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Phone Number</th>
                              <th scope="col">Email</th>
                              <th scope="col">Assignment Status</th>
                              <th scope="col">Progress report</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                              <?php
                              foreach ($clientidres as $clientidar) {
                                  # code...
                                  $clientid=$clid;
                                  $stats=$clientidar['assignmentStatus'];
                                  $clientinfoquery="SELECT `fname`, `lname`, `phone`, `email` FROM `signupcl` WHERE `ID`='$clientid'";
                                  $clientinfores=mysqli_query($mysqli,$clientinfoquery);
                                  $clientinfo=mysqli_fetch_assoc($clientinfores);
                                  $name=$clientinfo['fname']." ".$clientinfo['lname'];
                                  $email=$clientinfo['email'];
                                  $number="0".$clientinfo['phone'];
                              
                              ?>
                              <!-- Modal begin -->
                              <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleLabel">Client Progress Report</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <canvas id="myChart"></canvas>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Close Report</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                              <!-- modal end -->
                              <th scope="row"><?php echo $i;?></th>
                              <td><?php echo $name;?></td>
                              <td><?php echo $number;?></td>
                              <td><?php echo $email;?></td>
                              <td><?php echo $stats;?></td>
                              <td class="cl"> <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open Progress</a></td>
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
                      <?php
                    }
                  ?>
          </div>
        </div>
    </div>
  <!-- Footer -->
  <footer class="header text-white text-center text-md-start">
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
  </footer>
  <!-- Footer -->
</section>
<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script>
<script>
    
// const xValues = [50,60,70,80,90,100,110,120,130,140,150];
// const yValues = [7,8,8,9,9,9,10,11,14,14,15];
const yValues= [<?php 
$clientprogressquery="SELECT `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `total`, `subDate`, `subTime`, `q11` FROM `clientselfassessment` WHERE `clID`='$clid';";
$clientprogressres=mysqli_query($mysqli,$clientprogressquery);
    if (mysqli_num_rows($clientprogressres)==0) {
        # code...
        echo "0";
    }else{
        foreach ($clientprogressres as $progresress) {
            # code...
            $point=$progresress['total'];
            echo $point.",";
        }
        echo "0";
    }
?>]
const xValues= [<?php 
$clientprogressquery="SELECT `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `total`, `subDate`, `subTime`, `q11` FROM `clientselfassessment` WHERE `clID`='$clid';";
$clientprogressres=mysqli_query($mysqli,$clientprogressquery);
    if (mysqli_num_rows($clientprogressres)==0) {
        # code...
        echo "0";
    }else{
        foreach ($clientprogressres as $progresress) {
            # code...
            $point=$progresress['subDate'];
            echo $point.",";
        }
        echo "0";
    }
?>]

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(233,150,122,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 6, max:16}}],
    }
  }
});
</script>
  </body>
</html>
<?php
}else{
  header("Location: getstarted.php?message=Kindly log in or sign up");
}
?>