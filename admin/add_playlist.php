<?php

include '../components/connect.php';

if(isset($_COOKIE['mentor_id'])){
   $mentor_id = $_COOKIE['mentor_id'];
}else{
   $mentor_id = '';
   header('location:login.php');
}

if(isset($_POST['submit'])){

   $id = unique_id();
   $title = $_POST['title'];
   $title = htmlspecialchars($title);
   $description = $_POST['description'];
   $description = htmlspecialchars($description);
   $status = $_POST['status'];
   $status = htmlspecialchars($status);

   $image = $_FILES['image']['name'];
   $image = htmlspecialchars($image);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = unique_id().'.'.$ext;
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_files/'.$rename;

   $add_playlist = $conn->prepare("INSERT INTO `playlist`(id, mentor_id, title, description, thumb, status) VALUES(?,?,?,?,?,?)");
   $add_playlist->execute([$id, $mentor_id, $title, $description, $rename, $status]);

   move_uploaded_file($image_tmp_name, $image_folder);

   $message[] = 'new playlist created!';  

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Playlist</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>
   
<section class="playlist-form">

   <h1 class="heading">create playlist</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <p>Status <span>*</span></p>
      <select name="status" class="box" required>
         <option value="" selected disabled>-- select status</option>
         <option value="active">active</option>
         <option value="deactive">deactive</option>
      </select>
      <p>Title <span>*</span></p>
      <input type="text" name="title" maxlength="100" required placeholder="enter playlist title" class="box">
      <p>Playlist description <span>*</span></p>
      <textarea name="description" class="box" required placeholder="write description" maxlength="1000" cols="30" rows="10"></textarea>
      <p>Thumbnail <span>*</span></p>
      <input type="file" name="image" accept="image/*" required class="box">
      <input type="submit" value="create playlist" name="submit" class="btn">
   </form>

</section>
















<script src="../js/admin_script.js"></script>

</body>
</html>