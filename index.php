<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>


   <section class="home-grid" id="home">

      <div class="box-container">

      <div class="home-text">
         <h1 class="heading"> STEMReach for North Ghana Girls</h1>
         <h4>Empowering North Ghana's Girls in STEM, Igniting Brilliance, and Transforming Communities.</h4>
         </div>
   
         <div class="home-img">
         <img src="images/stem (1).png" alt="">
         </div>  

      </div>

   </section>

    <!-- home section starts  -->

   <!-- about section starts  -->

   <section class="about" id="about">
      <h3>About Us</h3>
      <div class="row">
         <div class="image">
            <img src="images/about-img.png" alt="about-image">
         </div>

         <div class="content">
            <h3>Our Mission</h3>
            <p>STEM Reach North Ghana is an organization dedicated to empowering girls in North Ghana through STEM education and mentorship. Our mission is to inspire, educate, and support young girls to pursue and excel in science, technology, engineering, and mathematics, equipping them with the skills and confidence to thrive in the digital world and become future leaders and innovators.</p>

            <h3>Our Vision</h3>
            <p>Our vision is to create a gender-inclusive society in North Ghana, where girls have equal access to opportunities in STEM fields. We envision a future where every girl in North Ghana is empowered to explore and excel in science, technology, engineering, and mathematics, breaking through barriers and contributing to the advancement of their communities and the nation.</p>
         </div>
      </div>   

   </section>   




   <!-- course section starts  -->

   <section class="courses" id="courses">
    <h1 class="heading">Course Categories</h1>

    <div class="box-container">
      
    

      <div class="box">
        <div class="thumb">
            <img src="images/science.png" alt="">
            <span>S-courses</span>
        </div>
        <h3 class="title">Science</h3>
        <a href="courses.php" class="inline-btn">view courses</a>
      </div>

      <div class="box">
        <div class="thumb">
            <img src="images/tech.jpg" alt="">
            <span>T-courses</span>
        </div>
        <h3 class="title">Technology</h3>
        <a href="courses.php" class="inline-btn">view courses</a>
      </div>

      <div class="box">
        <div class="thumb">
            <img src="images/engineering.png" alt="">
            <span>E-courses</span>
        </div>
        <h3 class="title">Engineering</h3>
        <a href="courses.php" class="inline-btn">view courses</a>
      </div>


      <div class="box">
        <div class="thumb">
            <img src="images/maths.jpeg" alt="">
            <span>M-courses</span>
        </div>
        <h3 class="title">Mathematics</h3>
        <a href="courses.php" class="inline-btn">view courses</a>
      </div>

    </div>


  </section>


     <!-- mentorship section endss  -->
    <section class="mentorship" id="mentorship">
    <h3>Why Join Our Mentorship? </h3>
    <div class="row">
      <div class="image">
        <img src="images/mentorship.png" alt="">
      </div>  
      <div class="content">          
        <h4>Expert Guidance:</h4>
        <p>Our mentors possess extensive knowledge and experience in their respective STEM fields. They are committed to providing valuable insights, advice, and support to mentees.<br>
        </p>
        
        <h4>Personalized Mentorship:</h4>
        <p>We understand that every mentee has unique goals and aspirations. Our program matches mentees with mentors who align with their specific interests and needs, ensuring a tailored and enriching mentorship experience.<br>
        </p> 
          
        <h4>Building Networks:</h4>
        <p>Mentorship extends beyond knowledge transfer. Through our program, mentors and mentees have the opportunity to connect with like-minded individuals, fostering a strong network of STEM enthusiasts and professionals.<br>
        </p> 

        <h4>Impactful Collaboration:</h4>
        <p>By participating in our mentorship program, you contribute to a larger goal of promoting STEM education and cultivating a culture of curiosity, critical thinking, and innovation.
        </p>

        <a href="mentors.php" class="inline-btn">explore mentors</a>
      </div>

    </div>
   </section>








   <!-- contact section starts  -->
   <section class="contact" id="contact">
    <div class="main-contact">
      <div class="contact-content">
        <img src="images/logo.png" alt="logo">
        <a href="#"><i class="fab fa-linkedin-in"> </i> LinkedIn</a>
        <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
        <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
        <a href="#"><i class="fab fa-facebook"></i> Facebook</a>
      </div>

      <div class="contact-content">
        <a href="#home" >Home</a>
        <a href="#about">About</a>
        <a href="#courses">Courses</a>
        <a href="mentors.php">Mentorships</a>
        <a href="dforum.php">Discussion Forum</a>
        <a href="events.php">Events</a>
        <a href="contact.php">Contact</a>
      </div>

      <div class="contact-content">
        <a href="profile.php">Profile</a>
        <a href="login.php">Login</a>
        <a href="register.php">Sign Up</a>
        <a href="events.php">Women in STEM</a>
        <a href="admin/register.php">Apply As Mentor</a>
        <a href="mentors.php">Find Mentor</a>
        <a href="events.php">Blog</a>
      </div>

      <div class="contact-content">
        <div class="cont-details">Location:<a href="#">Jirapa, <br>Upper West Region, <br>Ghana</a></div>
        <div class="cont-details">Email:<a href="#">northreach24@gmail.com</a></div>
        <div class="cont-details">Phone:<a href="#">+233500000000</a></div>
      </div>

    </div>
  </section>

  
  <?php include 'components/footer.php'; ?>






<script src="js/script.js"></script>
   
</body>
</html>