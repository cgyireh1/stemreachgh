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
   <title>Mentors</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- teachers section starts  -->

<section class="mentors">

   <h1 class="heading">Mentorship Hub</h1>


   <div class="box-container">

      <div class="box offer">
         <h3>Welcome to our STEM Mentorship Hub!</h3>
         <p>We believe in the power of mentorship to inspire and empower the next generation of STEM leaders. Our mentorship program connects aspiring individuals with experienced professionals in science, technology, engineering, and mathematics, creating a supportive environment for knowledge sharing and personal growth.<br></p>
        
        
        <p>Join our STEM Mentorship Program today and embark on a rewarding journey of mentorship, growth, and inspiration. Together, let's shape a future where STEM thrives and transforms lives.</p>
      </div>

      <?php
         $select_mentors = $conn->prepare("SELECT * FROM `mentors`");
         $select_mentors->execute();
         if($select_mentors->rowCount() > 0){
            while($fetch_mentor = $select_mentors->fetch(PDO::FETCH_ASSOC)){

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
      ?>
      <div class="box">
         <div class="mentor">
            <img src="uploaded_files/<?= $fetch_mentor['image']; ?>" alt="">
            <div>
               <h3><?= $fetch_mentor['name']; ?></h3>
               <span><?= $fetch_mentor['field of expertise']; ?></span>
            </div>
         </div>
         <p>playlists : <span><?= $total_playlists; ?></span></p>
         <p>total videos : <span><?= $total_contents ?></span></p>
         <p>total likes : <span><?= $total_likes ?></span></p>
         <p>total comments : <span><?= $total_comments ?></span></p>
         <form action="mentor_profile.php" method="post">
            <input type="hidden" name="mentor_email" value="<?= $fetch_mentor['email']; ?>">
            <input type="submit" value="view profile" name="mentor_fetch" class="inline-btn">
         </form>
      </div>
      <?php
            }
         }else{
            echo '<p class="empty">no mentors found!</p>';
         }
      ?>

   </div>

</section>

<!-- teachers section ends -->


















<script src="js/script.js"></script>
   
</body>
</html>