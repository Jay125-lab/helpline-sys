
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible"content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scae=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Helpline System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="sg.css" />
<title>Sign Up</title>
<link rel = "icon" href ="hlog.png" type = "image/x-icon">
</head>
<div class="topnav">

    <button type="button" class="btn btn-secondary"><a href="homepage.html">Home</a></button>
    <button type="button" class="btn btn-secondary"><a href="aboutus.html">About us</a></button>
    <button type="button" class="btn btn-secondary"><a href="testimonies.html">Testimonies</a></button>
    <button type="button" class="btn btn-dark"><a href="signup.html"> Sign up</a></button>
    <button type="button" class="btn btn-dark"><a href="login.php"> Log in </a></button>
    </div>    
    
        <hr style = "color: darkgrey;size: 10px;">
<body>
<h1> Helpline Therapy </h1>
    <div class ="signup-box">
 
   <center><h2> Sign up</h2> </center>
   <form action="signinval.php"method="post">
   <?php if (isset($_GET['message'])) { ?>
                <div class="container" style="color:#05386B; text-align:center;"> 
                <p> <?php echo $_GET['message']; ?> </p>
                </div>
                <?php } ?>
        
       <label> First Name</label>
       <input type="text"placeholder=""name="fname" autocomplete="off" required>
       <label> Last Name</label>
       <input type="text"placeholder=""name="lname" autocomplete="off" requied>
       <label> Phone Number</label>
       <input type="number"placeholder=""name="phone" autocomplete="off" required>
       <label> Email</label>
       <input type="email"placeholder=""name="email" autocomplete="off" required>
       <label> Password</label>
       <input type="password"placeholder=""name="psd" autocomplete="off" required>
       <label> Confirm Password</label>
       <input type="password"placeholder=""name="psdchk" autocomplete="off" required>
       
      <input type="submit" <a href="signin.php" Submit style="width: 320px;height: 35px;margin-top:20px;border:none;background-color:blue white;font-size: 18px;border-radius: 6px;"></a>
   
   <p> By clicking the Sign up button, you agree to our <a href="#">Terms<a href="#">Policy and Privacy</a> </p>  
</div>
<p> Already have an account?<a href="login.php"> Login Here</a></p>
</form>
<div
      class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
      <!-- Copyright -->
      <div class="text-white mb-3 mb-md-0">
        Helpline System Copyright © 2023. All rights reserved
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
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">    
</script>

</body>

</html>