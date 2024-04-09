<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['mentor_fetch'])){

   $mentor_email = $_POST['mentor_email'];
   $mentor_email =  htmlspecialchars($mentor_email);
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

   $mentor_interests = isset($_POST['interests']) ? htmlspecialchars($_POST['interests']) : '';
   $mentor_interests =  htmlspecialchars($mentor_interests);
   $select_mentor = $conn->prepare('SELECT * FROM `mentors` WHERE interests = ?');
   $select_mentor->execute([$mentor_interests]);

   $mentor_availability = isset($_POST['availability']) ? htmlspecialchars($_POST['availability']) : '';
   $mentor_availability =  htmlspecialchars($mentor_availability);
   $select_mentor = $conn->prepare('SELECT * FROM `mentors` WHERE availability = ?');
   $select_mentor->execute([$mentor_availability]);

   $mentor_approach = isset($_POST['approach']) ? htmlspecialchars($_POST['approach']) : '';
   $mentor_approach =  htmlspecialchars($mentor_approach);
   $select_mentor = $conn->prepare('SELECT * FROM `mentors` WHERE approach = ?');
   $select_mentor->execute([$mentor_approach]);

   $mentor_field_of_expertise = isset($_POST['field_of_expertise']) ? htmlspecialchars($_POST['field_of_expertise']) : '';
   $mentor_field_of_expertise =  htmlspecialchars($mentor_field_of_expertise);
   $select_mentor = $conn->prepare('SELECT * FROM `mentors` WHERE field_of_expertise = ?');
   $select_mentor->execute([$mentor_field_of_expertise]);
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

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>


<section class="mentor-profile">

   <h1 class="heading">profile details</h1>

   <div class="details">
      <div class="mentor">
         <img src="uploaded_files/<?= $fetch_mentor['image']; ?>" alt="">
         <h3><?= $fetch_mentor['name']; ?></h3>
         <span><?= $fetch_mentor['profession']; ?></span>
      </div>
      <div class="flex">
         <p>Email : <span><?= $fetch_mentor['email']; ?></span></p>
         <p>Field of Expertise : <span><?= $fetch_mentor['field_of_expertise']; ?></span></p>
         <p>Interests : <span><?= $fetch_mentor['interests']; ?></p>
         <p>Availability : <span><?= $fetch_mentor['availability']; ?></span></p>
         <p>Approach : <span><?= $fetch_mentor['approach']; ?></span></p>
      </div>
   </div>

</section>












<script src="js/script.js"></script>
   
</body>
</html>