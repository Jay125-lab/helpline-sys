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
     <link rel="stylesheet" href="help.css" />
     <link rel = "icon" href ="hlog.png" type = "image/x-icon">
    </head>
    <body>
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-lower">Helpline System (Online Therapy for Drug Addicts)</span>
            </h1>
        </header>
  
<div class="topnav">

<button type="button" class="btn btn-light"><a href="homepage.html">Home</a></button>
<button type="button" class="btn btn-light"><a href="aboutus.html">About us</a></button>
<button type="button" class="btn btn-light"><a href="testimonies.html">Testimonies</a></button>
<button type="button" class="btn btn-light"><a href="team.html">Our Team</a></button>
<button type="button" class="btn btn-danger"><a href="screentest.html">Screen Test</a></button>
<button type="button" class="btn btn-dark"><a href="signup.html"> Sign up</a></button>
<button type="button" class="btn btn-dark"><a href="login.html"> Log in </a></button>
</div>    

<hr style = "color: darkgrey;size: 10px;">
<form>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
              <div class="col">
                <div class="row mt-3">
                 <p> <div class="form-check">
                    <p>1. Have you ever taken alchohol </p>
                    <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">Yes
                    <label class="form-check-label" for="radio1"></label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2"> No
                    <label class="form-check-label" for="radio2"></label>
                  </div>
                  <p> 2.How often do you have a drink containing alcohol?</p>
                    <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">Never
                    <label class="form-check-label" for="radio3"></label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2"> Monthly or less
                    <label class="form-check-label" for="radio4"></label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option3"> 2 to 4 times a month
                  <label class="form-check-label" for="radio5"></label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="radio4" name="optradio" value="option4"> 4 or more times a week
                  <label class="form-check-label" for="radio"></label>
                </div>
                 <p> 3.How many drinks containing alcohol do you have on a typical day when you are drinking?</p>
                 <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">1 0r 2
                    <label class="form-check-label" for="radio1"></label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2"> 3 or 4
                    <label class="form-check-label" for="radio2"></label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option3">  5 or 6
                  <label class="form-check-label" for="radio3"></label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="radio4" name="optradio" value="option4"> 7 or more
                  <label class="form-check-label" for="radio4"></label>
                </div>
                <p> <div class="form-check">
                    <p> 4.How often during the last year have you found that you were not able to stop drinking once you had started?</p>
                    <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">Never
                    <label class="form-check-label" for="radio1"></label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2"> Monthly
                    <label class="form-check-label" for="radio1"></label>
                  </div>
                  <div class="form-check">
                  <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option 3">Daily or mostly daily
                    <label class="form-check-label" for="radio1"></label>
                  </div>
                <p> <div class="form-check">
                    <p> 5.How often during the last year have you been unable to remember what happened the night before because you had been drinking? </p>
                    <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">Never
                    <label class="form-check-label" for="radio1"></label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2"> Sometimes
                    <label class="form-check-label" for="radio1"></label>
                  </div>
                  <div class="form-check">
                  <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option 3">Daily 
                    <label class="form-check-label" for="radio1"></label>
                  </div>
                   <div class="form-check">
                  <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option 3">Often 
                    <label class="form-check-label" for="radio1"></label>
                   </div>
                   <p> <div class="form-check">
                    <p>6.How often during the last year have you needed an alcoholic drink first thing in the morning to get yourself going after a night of heavy drinking? </p>
                    <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">Never
                    <label class="form-check-label" for="radio1"></label>
                    </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2"> less than monthly
                    <label class="form-check-label" for="radio1"></label>
                  </div>
                  <div class="form-check">
                  <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option 3">Daily 
                    <label class="form-check-label" for="radio1"></label>
                  </div>
                   <div class="form-check">
                  <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option 3">Often 
                    <label class="form-check-label" for="radio1"></label>
                   </div>
                    <p> <div class="form-check">
                   <p>7.How often during the last year have you had a feeling of guilt or remorse after drinking?</p>
                    <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">Never
                    <label class="form-check-label" for="radio1"></label>
                    </div>
                    <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2"> less than monthly
                    <label class="form-check-label" for="radio1"></label>
                  </div>
                  <div class="form-check">
                  <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option 3">Daily 
                    <label class="form-check-label" for="radio1"></label>
                  </div>
                   <div class="form-check">
                  <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option 3">Often 
                    <label class="form-check-label" for="radio1"></label>
                   </div>
                   <p> <div class="form-check">
                   <p>8.Has a relative, friend, doctor, or another health professional expressed concern about your drinking or suggested you cut down?</p>
                  <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">No
                    <label class="form-check-label" for="radio1"></label>
                    </div>
                    <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2"> Yes but last year
                    <label class="form-check-label" for="radio1"></label>
                  </div>
                  <div class="form-check">
                  <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option 3">Yes duiring the last year
                    <label class="form-check-label" for="radio1"></label>
                  </div>
                   </p>
                    </p>
                   </p>
                </p>
                </p>
            </div>
        </div>
    </section>
</form>
                
<hr style="color:gray;size:15px">  
<footer class="footer" style="background-color:darkslategray;">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-md-3 footer-about wow fadeInUp">
          <img class="logo-footer" src="cont.gif" width="300px" alt="logo-footer" data-at2x="">
          <p>
            Start your journey to sobreity.
          </p>
         
              </div>
              <div class="col-md-4 offset-md-1 footer-contact wow fadeInDown" style="padding: 15px;">
                                                        
                    </div>

        <div class="col-md-4 offset-md-1 footer-contact wow fadeInDown" style="padding: 15px;">
          </div>
          </div>
          </div>
          <h3>Contact</h3>
              <p><i class="fas fa-map-marker-alt"></i> Location: Ongata rongai, Kenya</p>
              <p><i class="fas fa-phone"></i> Phone: <a  class="footy" href="tel: +255 234 598 563">+255 234 598 563 </a></p>
              <p><i class="fas fa-envelope"></i> Email: <a  class="footy" href="mailto:Help25line@gmail.com  ">Help25line@gmail.com  </a></p>
              <p><i class="fab fa-skype"></i> Skype: Help_online</p>
              <p><i class="fab fa-linkedin"></i> LinkedIn: Help25linelinkedin</p>
              </div>
              <div class="col-md-4 footy footer-links wow fadeInUp" style="padding: 15px;">
                <div class="row">
                  <div class="col">
                    <h3>Links</h3>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <p><a class="scroll-link footy" href="homepage.html">Home</a></p>
                    <p><a class="footy" href="aboutus.html">About</a></p>
                    <p><a class="footy" href="testimonies.html">Testimonies</a></p>
                  </div>
                  <div class="col-md-6">
                    <p><a class="footy" href="#">Pricing</a></p>
                    <p><a class="footy" href="#">Terms</a></p>
                  </div>
                </div>
              </div>
        </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
         <center>  <div class="col-md-12 footer-copyright";>
                &copy;  2023 Copyright:Helpline System (Online Therapy for Drug Addicts)  </center>
                
                  <a class="footy" href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook-f" aria-hidden="true"></i></a>
                  <a class="footy"  href=" https://twitter.com/"target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  <a class="footy"  href="https://www.youtube.com/"target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                  <a class="footy"  href="https://www.linkedin.com/"target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                  <a class="footy"  href="https://www.instagram.com/"target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                
                
         </div>            
         </div>
    </div>
  </div>
  
  
</footer>

                        
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">    
</script>


</body>

</html>

