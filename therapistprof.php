<?php
include "link.php";
$sql1 = "SELECT CountyName FROM counties ";
$result1 = mysqli_query($mysqli, $sql1);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible"content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scae=1.0" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Helpline System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="" />
    <link rel = "icon" href ="hlog.png" type = "image/x-icon">
    </head>
    <body>
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-lower">Helpline System (Online Therapy for Drug Addicts)</span>
            </h1>
        </header>
        <div class="topnav">

            <button type="button" class="btn btn-dark"><a href="homepage.html">Home</a></button>
            <button type="button" class="btn btn-dark"><a href="aboutus.html">About us</a></button>
            <button type="button" class="btn btn-dark"><a href="testimonies.html">Testimonies</a></button>
            <button type="button" class="btn btn-danger"><a href="screentest.html">Screen Test</a></button>
            <button type="button" class="btn btn-dark"><a href="signup.html"> Sign up</a></button>
            <button type="button" class="btn btn-dark"><a href="login.html"> Log in </a></button>
            </div>    
            </nav>
            <hr style = "color: darkslategrey;size: 10px;">
<form action="" method="post" enctype="multipart/form-data">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Upload your profile picture</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right"> Therapist Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" placeholder="first name" name="fname" required></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" name="lname" placeholder="last name" required></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" name="phone" required></div>
                    <div class="col-md-12"><label class="labels">Age</label><input type="number" class="form-control" placeholder="Age" name="age" required></div>
                    <div class="col-md-12">
                        <label class="labels">Gender</label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="option">Choose one</option>
                            <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="col-md-12"><label class="labels">Email Address</label><input type="email" class="form-control" placeholder="enter email address" name="email" required></div>
                    <div class="col-md-12"><label class="labels">Education</label>
                        <select name="education" id="education" class="form-control" required>
                            <option value="option">Choose one</option>
                            <option value="Diploma">Diploma</option>
                            <option value="Undergraduate">Undergraduate</option>
                            <option value="Masters">Masters</option>
                            <option value="Doctorate">PhD.</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">County</label>
                        <select name="county" id="county" class="form-control" required>
                            <option value="option">Choose one</option>
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
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
            <button type="submit" style="width: 320px;height: 35px;margin-top:20px;border:none;background-color:blue;font-size:18px;border-radius:6px;"> Submit</button>
        
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Experience as a counsellor </span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Work history</label><input type="text" class="form-control" placeholder="Work history" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div>
        </div>
    </div>
</div>    
</form>

</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">    
</script>
</body>
</html>
