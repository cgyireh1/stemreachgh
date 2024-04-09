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
   <title>mentors</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="css/dforum.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

  <section class="box-container">

    <div class="discussion-forum" id ="discussion-forum">
      <div class="top-bar">
        <h1>
          Discussion Forum
        </h1>
      </div>
    
      <div class="main">
        <div class="head">
          <h4 class="title">
            Thread 1
          </h4>
          <div class="bottom">
            <p class="timestand">
              14/03/2024
            </p>
            <p class="comment-count">
              5 comments
            </p>
          </div>
        </div>  
        <textarea name="message" placeholder="Enter your comment"> </textarea>
        <button>Add comment</button>
      
        <div class="comments">
          <div class="comment">
            <div class="top-comment">
              <p class="user">
                User1
              </p>        
              <p class="comment-ts">
                14/03/2024
              </p>
            </div>
            <div class="comment-content">
              Comment text here
            </div>
          </div>
    
          <div class="comment">
            <div class="top-comment">
              <p class="user">
                User2
              </p>        
              <p class="comment-ts">
                27/03/2024
              </p>
            </div>
            <div class="comment-content">
              Comment text here
            </div>
          </div>
        </div> 
      </div>
    </div>
  </section>








</body>