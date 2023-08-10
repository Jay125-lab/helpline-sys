<?php
include "link.php";
$sql1 = "SELECT CountyName FROM counties ";
$result1 = mysqli_query($mysqli, $sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="main.css">
  <title>Document</title>
</head>
<body>
<div>
  <!-- First modal to ask client to sign up  -->
  <div class="modal  modal-fullscreen-sm-down fade" id="clientSignUpModalToggle" tabindex="-1" aria-labelledby="clientSignUpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="clientSignUpModalLabel">Client Sign Up</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
          <div class="modal-body">
          <form action="signinval.php" method="post" enctype="multipart/form-data">
            <div class="row mb-4">
              <div class="col">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="fname" autocomplete="off" required>
              </div>
              <div class="col">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="lname" autocomplete="off" required>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-12 g-6">
                  <label for="inputEmail" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="inputAddress" placeholder="you@example.com" autocomplete="off" required>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <label for="Number" class="form-label">Phone Number</label>
                <input type="number" class="form-control" placeholder="07xxxxxxxx" aria-label="Phone Number" name="phone" autocomplete="off" required>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="psd" id="psd" autocomplete="off" required>
              </div>
              <div class="col">
                <label for="passwordCheck" class="form-label">Repeat Password</label>
                <input type="password" class="form-control" name="psdchk" id="psdchk" autocomplete="off" required>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <p class="text-muted">
                  If you have an account, sign in <button type="button" class="btn btn-link"  data-bs-target="#clientSignInModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">here</button>
                </p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
          </div>
        </form>  
      </div>
    </div>
  </div>
  <!-- end of modal -->
  <!-- Modal for client sign in -->
  <div class="modal  modal-fullscreen-sm-down fade" id="clientSignInModalToggle" tabindex="-1" aria-labelledby="clientSignInModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="clientSignInModalLabel">Client Sign In</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
          <div class="modal-body">
          <form action="loginsval.php" method="post" enctype="multipart/form-data">
            <div class="row mb-4">
              <div class="col-12 g-6">
                  <label for="inputEmail" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="inputAddress" placeholder="you@example.com" autocomplete="off" required>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="psd" id="password" autocomplete="off" required>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <p class="text-muted">
                  If you don't have an account, sign up <button type="button" class="btn btn-link"  data-bs-target="#clientSignUpModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">here</button>
                </p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="submit">Sign In</button>
          </div>
        </form>  
      </div>
    </div>
  </div>
  <!-- end of model -->
    <!-- First modal to ask client to sign up or sign in -->
      <div class="modal fade" id="clientModalToggle" aria-hidden="true" aria-labelledby="clientModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="clientModalToggleLabel">Client Sign up or Sign in</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class=" justify-content-center align-items-center">
                    
                    <br>
                    <div class="d-grid gap-2">
                        <button id="btn" class="btn btn-outline-primary btn-lg" type="button" data-bs-toggle="modal" href="#clientSignUpModalToggle" onmouseover="hoverbtn(this)" onmouseout="normalbtn(this)" >Sign Up</button>
                    </div>
                    <div class="divider d-flex justify-content-center align-items-center my-4">
                        <p class="text-center fw-bold ">Or</p>
                    </div>
                    
                    
                    <div class="d-grid gap-2">
                        <button id="btn2" class="btn btn-outline-primary btn-lg" type="button" data-bs-toggle="modal" href="#clientSignInModalToggle" onmouseover="hoverbtn2(this)" onmouseout="normalbtn2(this)" >Sign In</button>
                    </div>
                  </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end of client modal -->
  <!-- First modal to ask therapist to sign up or sign in -->
  <div class="modal fade" id="therapistModalToggle" aria-hidden="true" aria-labelledby="therapistModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="therapistModalToggleLabel">Therapist Sign up or Sign in</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class=" justify-content-center align-items-center">
                
                <br>
                <div class="d-grid gap-2">
                    <button id="btn" class="btn btn-outline-primary btn-lg" type="button" data-bs-toggle="modal" href="#therapistSignUpModalToggle" onmouseover="hoverbtn(this)" onmouseout="normalbtn(this)">Sign Up</button>
                </div>
                <div class="divider d-flex justify-content-center align-items-center my-4">
                    <p class="text-center fw-bold ">Or</p>
                </div>
                
                
                <div class="d-grid gap-2">
                    <button id="btn2" class="btn btn-outline-primary btn-lg" type="button" data-bs-toggle="modal" href="#therapistSignInModalToggle" onmouseover="hoverbtn2(this)" onmouseout="normalbtn2(this)">Sign In</button>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end of therapist modal -->
  <!-- Start of therapist sign up modal -->
  <div class="modal  modal-fullscreen-sm-down fade" id="therapistSignUpModalToggle" tabindex="-1" aria-labelledby="therapistSignUpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="therapistSignUpModalLabel">Therapist Sign Up</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
          <form action="therapistsignupval.php" method="post" enctype="multipart/form-data">
            <div class="row mb-4">
                <div class="col-12 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-1">
                      <img class="rounded-circle mt-5" width="150px" id="disp" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        <!-- <span class="font-weight-bold">Upload your profile picture</span><span> </span> -->
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload your profile picture</label>
                            <input class="form-control" type="file" id="formFile" name="profilepic" accept="image/*" onchange="loadFile(event)" required>
                        </div>
                    </div>
                  </div>  
            </div>
            <div class="row mb-4">
              <div class="col">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="fname" autocomplete="off" required>
              </div>
              <div class="col">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="lname" autocomplete="off" required>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-12 g-6">
                  <label for="inputEmail" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="inputAddress" placeholder="you@example.com" autocomplete="off" required>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <label for="Number" class="form-label">Phone Number</label>
                <input type="number" class="form-control" placeholder="07xxxxxxxx" aria-label="Phone Number" name="phone" autocomplete="off" required>
              </div>
              <div class="col-3">
                  <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" placeholder="age" aria-label="Age" name="age" autocomplete="off" required>
              </div>
              <div class="col-4">
                <label for="Gender" class="form-label">Gender</label>
                  <select name="gender" id="gender" aria-label="Gender" class="form-select" autocomplete="off" required>
                  <option selected>Choose...</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-6">
                <label for="Education" class="form-label">Education</label>
                <select name="education" id="education" autocomplete="off" class="form-select" required>
                      <option selected>Choose one</option>
                      <option value="Diploma">Diploma</option>
                      <option value="Undergraduate">Undergraduate</option>
                      <option value="Masters">Masters</option>
                      <option value="Doctorate">PhD.</option>
                </select>
              </div>
              <div class="col-6">
                <label for="County" class="form-label">County of Residence</label>
                  <select name="county" id="county" class="form-select" required>
                    <option selected>Choose one</option>
                      <?php
                          foreach ($result1 as $result) {
                      ?>
                      <option value="<?php echo $result['CountyName'];?>"><?php echo $result['CountyName'];?></option>
                      <?php
                          }
                      ?>
                  </select>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
              <div class="mb-3">
                            <label for="formFile" class="form-label">Upload your qualification certificates and relevant documents</label>
                            <input class="form-control" type="file" id="formFile" name="document" accept=".doc,.docx,.pdf,.epub,.odf" multiple required>
                        </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" autocomplete="off" required>
              </div>
              <div class="col">
                <label for="passwordCheck" class="form-label">Repeat Password</label>
                <input type="password" class="form-control" name="passwordchk" id="passwordchk" autocomplete="off" required>
              </div>
            </div>
              <div class="col">
                <p class="text-muted">
                  If you have an account, sign in <button type="button" class="btn btn-link"  data-bs-target="#therapistSignInModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">here</button>
                </p>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
          </div>
        </form>  
      </div>
    </div>
  </div>
  <!-- end of therapist sign up modal -->
  <!-- Therapist sign in modal -->
  <div class="modal  modal-fullscreen-sm-down fade" id="therapistSignInModalToggle" tabindex="-1" aria-labelledby="therapistSignInModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="therapistSignInModalLabel">Therapist Sign In</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
          <div class="modal-body">
          <form action="loginsval.php" method="post" enctype="multipart/form-data">
            <div class="row mb-4">
              <div class="col-12 g-6">
                  <label for="inputEmail" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="inputAddress" placeholder="you@example.com" autocomplete="off" required>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="psd" id="password" autocomplete="off" required>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <p class="text-muted">
                  If you don't have an account, sign up <button type="button" class="btn btn-link"  data-bs-target="#therapistSignUpModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">here</button>
                </p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="submit">Sign In</button>
          </div>
        </form>  
      </div>
    </div>
  </div>
  <!-- end of modal -->
  


  <!-- my buttons -->
  <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-center " style="width: 100%;">
        <p class="lead fw-normal mb-0 me-3 text-center">For Clients</p>
    </div>
    <br>
    <div class="d-grid gap-2">
        <button id="btn" class="btn btn-outline-primary btn-lg" type="button" data-bs-toggle="modal" href="#clientModalToggle" onmouseover="hoverbtn(this)" onmouseout="normalbtn(this)">Clients</button>
    </div>
    <div class="divider d-flex align-items-center my-4">
        <p class="text-center fw-bold mx-3 mb-0">Or</p>
    </div>
    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-center">
        <p class="lead fw-normal mb-0 me-3">For Therapists</p>
    </div>
    <br>
    <div class="d-grid gap-2">
        <button id="btn2" class="btn btn-outline-primary btn-lg" type="button" data-bs-toggle="modal" href="#therapistModalToggle" onmouseover="hoverbtn2(this)" onmouseout="normalbtn2(this)">Therapist</button>
    </div>
  </div>
  <!-- end of my buttons -->



</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="main.js"></script>
</body>
</html>