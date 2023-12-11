<?php

session_start();

if(isset($_GET['logout'])) {
    session_unset();
    session_destroy();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grading System - Main Page</title>
    <link rel="stylesheet" href="main.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <style>
       
    </style>
</head>
<body>

    <div class="hero" id="home">
        <div class="container">
            <header>
                <a href="#home"><img src="logoWhite.png" alt="" class="logo" width="50px"></a>
                <nav>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#Contact">Contact Us </i></a></li>
                        
                    </ul>
                </nav>
                <i class='bx bxs-circle fa' id="icon"></i>
                <a href="http://localhost/finalfinalgradingsystem/system/login.php"><button style="height:50px; margin-top:-2px; border-radius: 1px; left: 20%;"> Login</button></a>
                 
            </header>
            <div class="info">
                <h1 class="title">
                    EASIER AND FASTER
                </h1>
                
                <p class="intro"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint consectetur itaque, <br>placeat minima harum molestias natus facere iusto culpa ab dicta totam <br>officia est amet eos non sed, officiis accusantium.
                </p>
               
                <div class="scroll-btn">
                   
                    <a href="#about" class="scroll" >Scroll Down <i class='bx bxs-chevrons-down arrow'></i></a>
               
                </div>
            </div>
            <img src="images.webp" class="main-img">
        </div>
        <h1 class="overlay-text">Grading System</h1>
    </div>
<!-----About section------------------------------------>
    <div class="hero-two" id="about">
        <div class="about-title">
            <h1 class="title">About Us</h1>
            <h2 class="sub-title">Our Introduction</h2>
        </div>
        <div class="content">
            <div class="img-side">
                <img src="about.png" class="sub" width="320px">
            </div>
            <div class="circle"></div>
            <div class="text-side">
               <p style="font-size:18px;line-height:1.8 "> Welcome to Grading System!

At Grading System, we provide a comprehensive and user-friendly online service for educators to manage their class grades. Our platform is designed to make grading fast and easy, so that teachers can focus on their students and their learning.

We offer a range of features to help teachers keep track of their students' grades. Our intuitive user interface makes it easy to enter grades and monitor student progress. We also provide helpful reports that provide teachers with valuable insights into their students' performance.

Our team is passionate about helping educators succeed, and we work hard to make sure our platform is always up-to-date and running smoothly. We believe that education should be accessible to all, and we are committed to providing an affordable and efficient solution for educators.

Thank you for choosing Grading System!</p>
                <div class="row">
                    
                </div>
                
            </div>
            
        </div>
        <i class='bx bxs-chevron-down-circle ' id="right"></i>
        <i class='bx bxs-chevron-up-circle ' id="left"></i>
    </div>
<!-----About section End------------------------------------>


<!---------Contact------>
<div class="hero-four contact" id="Contact">
    <div class=" cont">
        <h1 class="title">Contact Us</h1>
        <h2 class=" contt">For assistance</h2>
    </div>
    <div class="container-box">
        <div class="content">
            <img src="contacts.svg" width="450px"> 
          <div class="image-box">
          </div>
        <form onsubmit="sendEmail(); reset(); return false;">
          <div class="topic">Send us a message</div>
          <div class="input-box">
            <input type="text" required id="name">
            <label>Enter your name</label>
          </div>
          <div class="input-box">
            <input type="text" required id="email">
            <label>Enter your email</label>
          </div>
          <div class="message-box">
            <textarea placeholder="Text Message" id="message"></textarea>
          </div>
          <div class="input-box">
            <input type="submit" value="Send Message">
          </div>
        </form>
      </div>
      </div>
    
</div>  

<script src="https://smtpjs.com/v3/smtp.js">
</script>
<script>
    function sendEmail(){
        Email.send({
        Host : "smtp.gmail.com",
        Username : document.getElementById("name").value,
        Password : "husbylovewifey",
        To : 'joel.dibdib@ctu.edu.ph',
        From : document.getElementById("email").value,
        Subject : "New Contact From Inquery",
        Body : "Name: "+ document.getElementById("name").value
        + " <br >Email: "+ document.getElementById("email").value
        + " <br >Message: "+ document.getElementById("message").value
    }).then(
    message => alert("Message sent Successfully.")
    );
    }
</script>
<script src="./main.js"></script>
    

</body>
</html>