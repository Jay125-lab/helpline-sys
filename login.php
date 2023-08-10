<?php
include "link.php";
    echo hash('sha512','admin');
    $therapistcountquery="SELECT COUNT(`clth_ID`) FROM `clienttherapist` WHERE `th_ID`=14";
    $therapistcountres=mysqli_query($mysqli,$therapistcountquery);
    $therapistcount=mysqli_fetch_assoc($therapistcountres);
    print_r($therapistcount);
    $cnt=$therapistcount['COUNT(`clth_ID`)'];
    echo $cnt;
?>

<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="logs.css"/>
<link rel = "icon" href ="hlog.png" type = "image/x-icon">
<title> Log in</title>
<link rel = "icon" href ="siteresources/silkart.png" type = "image/x-icon">
</head>
    <body>
        <section class ="bg-section">
            <h1>  Welcome to Helpline Therapy </h1>
            <br>
        <div class="login-box">
            <center> <h2> Login</h2> </center>
            <form action="loginsval.php"method="post">
                <?php if (isset($_GET['message'])) { ?>
                <div class="container" style="color:#05386B; text-align:center;"> 
                <p> <?php echo $_GET['message']; ?> </p>
                </div>
                <?php } ?>
                <label> Email</label> <br>
                <input type="email"placeholder="" name="email" required>
                <label> Password</label>
                <input type="password"placeholder=""name="psd" required>
              
                <button type="submit" style="width: 320px;height: 35px;margin-top:20px;border:none;background-color: #49c1a2;color: white;font-size: 18px;border-radius: 6px;">Submit</button>
                
            </form>
        </div>
        <br>
        <p>
            <div class ="para-2"> Don't have an account?<a href="signup.php"> Sign up Here</a></div>
        </p>
        </section>
    </body>
</html>