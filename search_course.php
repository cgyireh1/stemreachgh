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
   <title>courses</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>


<section class="courses">

   <h1 class="heading">search results</h1>

   <div class="box-container">

      <?php
         if(isset($_POST['search_course']) or isset($_POST['search_course_btn'])){
         $search_course = $_POST['search_course'];
         $select_courses = $conn->prepare("SELECT * FROM `playlist` WHERE title LIKE '%{$search_course}%' AND status = ?");
         $select_courses->execute(['active']);
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
         echo '<p class="empty">no courses found!</p>';
      }
      }else{
         echo '<p class="empty">please search something!</p>';
      }
      ?>

   </div>

</section>











<script src="js/script.js"></script>
   
</body>
</html>