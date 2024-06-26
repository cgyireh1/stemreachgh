<?php

include '../components/connect.php';

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = htmlspecialchars($email);
   $pass = sha1($_POST['pass']);
   $pass = htmlspecialchars($pass);

   $select_mentor = $conn->prepare("SELECT * FROM `mentors` WHERE email = ? AND password = ? LIMIT 1");
   $select_mentor->execute([$email, $pass]);
   $row = $select_mentor->fetch(PDO::FETCH_ASSOC);
   
   if($select_mentor->rowCount() > 0){
     setcookie('mentor_id', $row['id'], time() + 60*60*24*30, '/');
     header('location:dashboard.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body style="padding-left: 0;">

<?php include '../components/admin_header.php'; ?>

<?php
if(isset($message)){
   foreach($message as $msg){
      echo '
      <div class="message form">
         <span>'.$msg.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>


<section class="form-container">

   <form action="" method="post" enctype="multipart/form-data" class="login">
      <h3>welcome back!</h3>
      <p>your email <span>*</span></p>
      <input type="email" name="email" placeholder="enter your email" maxlength="50" required class="box">
      <p>your password <span>*</span></p>
      <input type="password" name="pass" placeholder="enter your password" maxlength="20" required class="box">
      <p class="link">don't have an account? <a href="register.php">register new</a></p>
      <input type="submit" name="submit" value="login" class="btn">
   </form>

</section>













   
</body>
</html>