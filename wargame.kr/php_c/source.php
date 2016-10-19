<?php
 if (isset($_GET['view-source'])) {
     show_source(__FILE__);
     exit();
 }
 require '../lib.php'; // include for auth_code function.
 if (isset($_POST['d1']) && isset($_POST['d2'])) {
     $input1 = (int) $_POST['d1'];
     $input2 = (int) $_POST['d2'];
     if (!is_file('/tmp/p7')) {
         exec('gcc -o /tmp/p7 ./p7.c');
     }
     $result = exec('/tmp/p7 '.$input1);
     if ($result != 1 && $result == $input2) {
         echo auth_code('php? c?');
     } else {
         echo 'try again!';
     }
 } else {
     echo ':p';
 }
