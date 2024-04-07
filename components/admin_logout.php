<?php

   include 'connect.php';

   setcookie('mentor_id', '', time() - 1, '/');

   header('location:../admin/login.php');

?>