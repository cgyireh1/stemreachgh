<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['mentor_fetch'])){

   $mentor_email = $_POST['mentor_email'];
   $mentor_email = filter_var($mentor_email, FILTER_SANITIZE_STRING);
   $select_mentor = $conn->prepare('SELECT * FROM `mentors` WHERE email = ?');
   $select_mentor->execute([$mentor_email]);

   $fetch_mentor = $select_mentor->fetch(PDO::FETCH_ASSOC);
   $mentor_id = $fetch_mentor['id'];

   $count_playlists = $conn->prepare("SELECT * FROM `playlist` WHERE mentor_id = ?");
   $count_playlists->execute([$mentor_id]);
   $total_playlists = $count_playlists->rowCount();

   $count_contents = $conn->prepare("SELECT * FROM `content` WHERE mentor_id = ?");
   $count_contents->execute([$mentor_id]);
   $total_contents = $count_contents->rowCount();

   $count_likes = $conn->prepare("SELECT * FROM `likes` WHERE mentor_id = ?");
   $count_likes->execute([$mentor_id]);
   $total_likes = $count_likes->rowCount();

   $count_comments = $conn->prepare("SELECT * FROM `comments` WHERE mentor_id = ?");
   $count_comments->execute([$mentor_id]);
   $total_comments = $count_comments->rowCount();

}else{
   header('location:mentors.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>mentor's profile</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- teachers profile section starts  -->

<section class="mentor-profile">

   <h1 class="heading">profile details</h1>

   <div class="details">
      <div class="mentor">
         <img src="uploaded_files/<?= $fetch_mentor['image']; ?>" alt="">
         <h3><?= $fetch_mentor['name']; ?></h3>
         <span><?= $fetch_mentor['profession']; ?></span>
      </div>
      <div class="flex">
         <p>total playlists : <span><?= $total_playlists; ?></span></p>
         <p>total videos : <span><?= $total_contents; ?></span></p>
         <p>total likes : <span><?= $total_likes; ?></span></p>
         <p>total comments : <span><?= $total_comments; ?></span></p>
      </div>
   </div>

</section>

<!-- teachers profile section ends -->

<section class="courses">

   <h1 class="heading">latest courese</h1>

   <div class="box-container">

      <?php
         $select_courses = $conn->prepare("SELECT * FROM `playlist` WHERE mentor_id = ? AND status = ?");
         $select_courses->execute([$mentor_id, 'active']);
         if($select_courses->rowCount() > 0){
            while($fetch_course = $select_courses->fetch(PDO::FETCH_ASSOC)){
               $course_id = $fetch_course['id'];

               $select_mentor = $conn->prepare("SELECT * FROM `mentors` WHERE id = ?");
               $select_mentor->execute([$fetch_course['mentor_id']]);
               $fetch_mentor = $select_mentor->fetch(PDO::FETCH_ASSOC);
      ?>
      <div class="box">
         <div class="mentor">
            <img src="uploaded_files/<?= $fetch_mentor['image']; ?>" alt="">
            <div>
               <h3><?= $fetch_mentor['name']; ?></h3>
               <span><?= $fetch_course['date']; ?></span>
            </div>
         </div>
         <img src="uploaded_files/<?= $fetch_course['thumb']; ?>" class="thumb" alt="">
         <h3 class="title"><?= $fetch_course['title']; ?></h3>
         <a href="playlist.php?get_id=<?= $course_id; ?>" class="inline-btn">view playlist</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no courses added yet!</p>';
      }
      ?>

   </div>

</section>

<!-- courses section ends -->










<?php include 'components/footer.php'; ?>    

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>