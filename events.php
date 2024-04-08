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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">  
  <title>Loading</title>
</head>

<body>

  <?php include 'components/user_header.php'; ?>


  <section class="events" id="events">
    <div class="events-text">
      <h2>This Page Is Coming Soon...</h2>
    </div>

    <div class="loading">
      <div class="bar">
        <div class="ball"></div>
      </div>
    </div>

    <div class="events-img">
      <a href="#"> loading . . .</a>
    </div>

  </section>


  <script src="script.js"></script>
</body>
</html>