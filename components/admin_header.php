<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <section class="flex">

      <a href="dashboard.php" class="logo">Admin.</a>

      <nav class="navbar">
         <a href="home.php"><span>Home</span></a>
         <a href="home.php#about"><span>About</span></a>
         <a href="courses.php"><span>Courses</span></a>
         <a href="mentors.php"><span>Mentorship</span></a>
         <a href="contact.php"><span>Discussion-Forum</span></a>
         <a href="contact.php"><span>Events</span></a>
      </nav>


      <div class="icons">
      <div id="user-btn" class="fas fa-user"></div>
      <div id="toggle-btn" class="fas fa-toggle-off"></div>
      </div>


      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `mentors` WHERE id = ?");
            $select_profile->execute([$mentor_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="../uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <span><?= $fetch_profile['profession']; ?></span>
         <a href="profile.php" class="btn">view profile</a>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
         </div>
         <a href="../components/admin_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
         <?php
            }else{
         ?>
         <h3>please login or register</h3>
          <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
         </div>
         <?php
            }
         ?>
      </div>

   </section>

</header>

