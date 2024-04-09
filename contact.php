<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){

   $name = $_POST['name']; 
   $name =  htmlspecialchars($name);
   $email = $_POST['email']; 
   $email =  htmlspecialchars($email);
   $number = $_POST['number']; 
   $number =  htmlspecialchars($number);
   $msg = $_POST['msg']; 
   $msg =  htmlspecialchars($msg);

   $select_contact = $conn->prepare("SELECT * FROM `contact` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_contact->execute([$name, $email, $number, $msg]);

   if($select_contact->rowCount() > 0){
      $message[] = 'message sent already!';
   }else{
      $insert_message = $conn->prepare("INSERT INTO `contact`(name, email, number, message) VALUES(?,?,?,?)");
      $insert_message->execute([$name, $email, $number, $msg]);
      $message[] = 'message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>
<section>

  <div class="container">

    <h1 class="contact-heading">We would'd love to hear from you!</h1>

    <div class="form">
      <div class="contact-info">
        <h3 class="title">Get in touch!</h3>
        <div class="info">
            <img src="images/contactus.png" class="icon" alt="contact image" />
        </div>

        <div class="social-media">
          <p>Connect with us :</p>
          <div class="social-icons">
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="contact-form">
        <form action="" method="post">
          <h3 class="title">Contact us</h3>
          <div class="input-container">
            <input type="text" placeholder="Enter your name" required maxlength="100" name="name" class="box">
            <label for=""></label>
          </div>
          <div class="input-container">
            <input type="email" placeholder="Enter your email" required maxlength="100" name="email" class="box">
            <label for=""></label>
          </div>
          <div class="input-container">
            <input type="number" min="0" max="9999999999" placeholder="Enter your number" required maxlength="10" name="number" class="box">
            <label for=""></label>
          </div>
          <div class="input-container textarea">
            <textarea name="msg" class="box" placeholder="Enter your message" required cols="35" rows="10" maxlength="1000"></textarea>
            <label for=""></label>
          </div>
          <input type="submit" value="Submit" class="contact-btn" />
        </form>
      </div>
    </div>
  </div>

</section>

  










<script src="js/script.js"></script>
   
</body>
</html>