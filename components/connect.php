<?php
   $db_host = 'localhost';
   $db_name = 'stemreach_db';
   $user_name = 'root';
   $db_role = '';
   $user_password = '';
   
   $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $user_name, $user_password);

   function unique_id() {
      $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
      $rand = array();
      $length = strlen($str) - 1;
      for ($i = 0; $i < 20; $i++) {
          $n = mt_rand(0, $length);
          $rand[] = $str[$n];
      }
      return implode($rand);
   }

?>