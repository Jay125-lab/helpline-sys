<?php
session_start();
include "link.php";

if (isset($_SESSION['ID'])&&isset($_SESSION['clientName'])&&isset($_SESSION['email'])&&isset($_SESSION['phone'])) {
  # code...
  $id=$_SESSION['ID'];
  $therapistidquery="SELECT `th_ID` FROM `clienttherapist` WHERE `cl_ID`='$id'";
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
            #tickmarks {
        display: flex;
        justify-content: space-between;
        padding: 0 10px;
    }

    #tickmarks p {
        position: relative;
        display: flex;
        justify-content: center;
        text-align: center;
        width: 1px;
        background: #D3D3D3;
        height: 10px;
        line-height: 40px;
        margin: 0 0 20px 0;
    }
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
                <li class="breadcrumb-item cl"><a href="clienthome.php">Home</a></li>
                <li class="breadcrumb-item cl"><a href="clientreport.php">Assesment Reports</a></li>
                <li class="breadcrumb-item cl"><a href="clientselfassessment.php">Self Assessment</a></li>
                <li class="breadcrumb-item cl"><a href="#">Progress</a></li>
                <li class="breadcrumb-item cl"><a href="#">My Schedule</a></li>
                <li class="breadcrumb-item cl"><a href="clienttherapistfeedback.php" class="active">Therapist Feedback</a></li>
              </ol>
            </nav>
            <?php if (isset($_GET['message'])) { ?>
                <br>
                <div class="container" style="color:#05386B; text-align:center;"> 
                <p> <?php echo $_GET['message']; ?> </p>
                </div>
                <?php } ?>
            <div class="main">
              <!-- <h2>Welcome <?php echo $_SESSION['clientName']; ?> to our drug addiction support website</h2>
              <p>This website provides resources and support for individuals seeking help with addiction issues.</p> -->
              <h2>This is a feedback form on your therapist.</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
          <?php
                    if (mysqli_num_rows($therapistidres)==0) {
                        # code...
                ?>   
                        <div class="row">
                          <div class="col">
                            <h5 class="display-6">You do not have any therapist assigned to you</h5>
                          </div>
                        </div>
                        
                <?php
                    }else{
                    ?>
                    <form action="clienttherapistfeedbackval.php" method="post">
                        <!-- q1 -->
                        <div class="row">
                            <div class="col">
                                <div class="mx-0 w-100">
                                    <div class="text">
                                        <p class="p-3">
                                        <strong>How would you rate your overall experience with your therapist?</strong>
                                        </p>
                                    </div>
                                    <label for="customRange3" class="form-label">Very unsatisfied</label>
                                    <label for="customRange3" class="form-label float-end">Very satisfied</label>
                                    <div class="range">
                                        <input type="range" name="q1" class="form-range" min="1" max="5" step="1" data-bs-trigger="hover" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" id="Range1" required/><br>
                                        <div id="tickmarks">
                                            <p></p>
                                            <p>Unsatisfied</p>
                                            <p>Neutral</p>
                                            <p>Satisfied</p>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- q2 -->
                        <div class="row">
                            <div class="col">
                                <div class="mx-0 w-100">
                                    <div class="text">
                                        <p class="p-3">
                                        <strong>How comfortable did you feel sharing your thoughts and feelings with your therapist?</strong>
                                        </p>
                                    </div>
                                    <label for="customRange3" class="form-label">Very uncomfortable</label>
                                    <label for="customRange3" class="form-label float-end">Very comfortable</label>
                                    <div class="range">
                                        <input type="range" name="q2" class="form-range" min="1" max="5" step="1" data-bs-trigger="hover" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" id="Range1" required/><br>
                                        <div id="tickmarks">
                                            <p></p>
                                            <p>uncomfortable</p>
                                            <p>Neutral</p>
                                            <p>Comfortable</p>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- q3 -->
                        <div class="row">
                            <div class="col">
                                <div class="mx-0 w-100">
                                    <div class="text">
                                        <p class="p-3">
                                        <strong>How well did your therapist listen to and understand your concerns?</strong>
                                        </p>
                                    </div>
                                    <label for="customRange3" class="form-label">Very poorly</label>
                                    <label for="customRange3" class="form-label float-end">Very well</label>
                                    <div class="range">
                                        <input type="range" name="q3" class="form-range" min="1" max="5" step="1" data-bs-trigger="hover" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" id="Range1" required/><br>
                                        <div id="tickmarks">
                                            <p></p>
                                            <p>Poorly</p>
                                            <p>Neutral</p>
                                            <p>Well</p>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- q4 -->
                        <div class="row">
                            <div class="col">
                                <div class="mx-0 w-100">
                                    <div class="text">
                                        <p class="p-3">
                                        <strong>How helpful were the interventions or strategies your therapist suggested?</strong>
                                        </p>
                                    </div>
                                    <label for="customRange3" class="form-label">Not at all helpful</label>
                                    <label for="customRange3" class="form-label float-end">Very helpful</label>
                                    <div class="range">
                                        <input type="range" name="q4" class="form-range" min="1" max="5" step="1" data-bs-trigger="hover" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" id="Range1" required/><br>
                                        <div id="tickmarks">
                                            <p></p>
                                            <p>Not_very_helpful</p>
                                            <p>Neutral</p>
                                            <p>Helpful</p>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- q5 -->
                        <div class="row">
                            <div class="col">
                                <div class="mx-0 w-100">
                                    <div class="text">
                                        <p class="p-3">
                                        <strong>How well did your therapist explain the therapy process and what to expect?</strong>
                                        </p>
                                    </div>
                                    <label for="customRange3" class="form-label">Very poorly</label>
                                    <label for="customRange3" class="form-label float-end">Very well</label>
                                    <div class="range">
                                        <input type="range" name="q5" class="form-range" min="1" max="5" step="1" data-bs-trigger="hover" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" id="Range1" required/><br>
                                        <div id="tickmarks">
                                            <p></p>
                                            <p>Poorly</p>
                                            <p>Neutral</p>
                                            <p>Well</p>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- q6 -->
                        <div class="row">
                            <div class="col">
                                <div class="mx-0 w-100">
                                    <div class="text">
                                        <p class="p-3">
                                        <strong>Did you feel your therapist was respectful and non-judgmental?</strong>
                                        </p>
                                    </div>
                                    <label for="customRange3" class="form-label">Never</label>
                                    <label for="customRange3" class="form-label float-end">Very often</label>
                                    <div class="range">
                                        <input type="range" name="q6" class="form-range" min="1" max="5" step="1" data-bs-trigger="hover" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" id="Range1" required/><br>
                                        <div id="tickmarks">
                                            <p></p>
                                            <p>Rarely</p>
                                            <p>Sometimes</p>
                                            <p>Often</p>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- q7 -->
                        <div class="row">
                            <div class="col">
                                <div class="mx-0 w-100">
                                    <div class="text">
                                        <p class="p-3">
                                        <strong>How likely are you to recommend your therapist to someone else?</strong>
                                        </p>
                                    </div>
                                    <label for="customRange3" class="form-label">Very unlikely</label>
                                    <label for="customRange3" class="form-label float-end">Very likely</label>
                                    <div class="range">
                                        <input type="range" name="q7" class="form-range" min="1" max="5" step="1" data-bs-trigger="hover" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" id="Range1" required/><br>
                                        <div id="tickmarks">
                                            <p></p>
                                            <p>Unlikely</p>
                                            <p>Neutral</p>
                                            <p>Likely</p>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- q8 -->
                        <div class="row">
                            <div class="col">
                                <div class="mx-0 w-100">
                                    <div class="text">
                                        <p class="p-3">
                                        <strong>Did your therapist keep your sessions confidential?</strong>
                                        </p>
                                    </div>
                                    <label for="customRange3" class="form-label">Never</label>
                                    <label for="customRange3" class="form-label float-end">Very often</label>
                                    <div class="range">
                                        <input type="range" name="q8" class="form-range" min="1" max="5" step="1" data-bs-trigger="hover" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" id="Range1" required/><br>
                                        <div id="tickmarks">
                                            <p></p>
                                            <p>Rarely</p>
                                            <p>Sometimes</p>
                                            <p>Often</p>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- q9 -->
                        <div class="row">
                            <div class="col">
                                <div class="mx-0 w-100">
                                    <div class="text">
                                        <p class="p-3">
                                        <strong>Did your therapist show up to sessions on time and fully prepared?</strong>
                                        </p>
                                    </div>
                                    <label for="customRange3" class="form-label">Never</label>
                                    <label for="customRange3" class="form-label float-end">Very often</label>
                                    <div class="range">
                                        <input type="range" name="q9" class="form-range" min="1" max="5" step="1" data-bs-trigger="hover" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" id="Range1" required/><br>
                                        <div id="tickmarks">
                                            <p></p>
                                            <p>Rarely</p>
                                            <p>Sometimes</p>
                                            <p>Often</p>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- q10 -->
                        <div class="row">
                            <div class="col">
                                <div class="mx-0 w-100">
                                    <div class="text">
                                        <p class="p-3">
                                        <strong>Given the opportunity to have a live session with your therapist, would you prefer going in person?</strong>
                                        </p>
                                    </div>
                                    <label for="customRange3" class="form-label">Very unlikely</label>
                                    <label for="customRange3" class="form-label float-end">Very likely</label>
                                    <div class="range">
                                        <input type="range" name="q10" class="form-range" min="1" max="5" step="1" data-bs-trigger="hover" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" id="Range1" required/><br>
                                        <div id="tickmarks">
                                            <p></p>
                                            <p>Unlikely</p>
                                            <p>Neutral</p>
                                            <p>Likely</p>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- qll -->
                        <div class="row">
                            <div class="col">
                                <div class="mx-0 w-100">
                                    <div class="text">
                                        <p class="p-3">
                                        <strong>Is there anything else you would like to share about your experience with your therapist?</strong>
                                        </p>
                                    </div>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ptext"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- submit button -->
                        <div class="row">
                            <div class="col">
                                <div class="text-end">
                                    <button type="submit" id="btn2" class="btn btn-outline-primary mt-3" onmouseover="hoverbtn2(this)" onmouseout="normalbtn2(this)">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
<script src="main.js"></script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

    function displayValue(val,val2){
    //   console.log(val);
      var value = document.getElementById(val).value 
      console.log(value)
        var slider = document.getElementById(val);
        var output = document.getElementById(val2);
        // output.innerHTML = slider.value;

        slider.oninput = function() {
            var message
            if (value==0) {
                message="Never" 
                console.log(value)
                output.innerHTML = message;
            }
            if (value==1) {
                message="Rarely"
                console.log(value)
                output.innerHTML = message; 
            }
            if (value==2) {
                message="Sometimes"
                console.log(value)
                output.innerHTML = message; 
            }
            if (value==3) {
                message="Often"
                console.log(value)
                output.innerHTML = message; 
            }
            if (value==4) {
                message="Very Often" 
                console.log(value)
                output.innerHTML = message;
            }
        
        }
    }

</script>

  </body>
</html>
<?php
}else{
  header("Location: getstarted.php?message=Kindly log in or sign up");
}
?>