<!DOCTYPE html>
<html lang="en">
<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $key = $_GET['key'];
  $firstname = $_GET['firstname'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $key = $_POST['key'];
  $firstname = $_POST['firstname'];
}


$file = fopen('data.txt', 'r') or die('Unable to open the file');
// $bob= explode(',',file('data.txt')[0]);
$content = file('data.txt');
$num = count($content);
$count1 = 0;
$count2 =0;
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['key']) && isset($_GET['firstname'])) {
    foreach ($content as $e) {
      $count2++;
      $each = explode(',', $e);
      if (strcmp($each[0], $key) == 0 && strcasecmp($each[1], $firstname) == 0) {
        echo '<h2>' . $each[2] . '</h2>
              <figure>
              <img src = "' . $each[3] . '">
              <figcaption>' . $each[2] . '</figcaption>
              <figure>
              ';
        break;
      } 
      if($count2 == $num && !(strcmp($each[0], $key) == 0 && strcasecmp($each[1], $firstname) == 0)) {
        echo 'firstname or key is invalid. ';
        break;
      }
    }
  }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['key']) && isset($_POST['firstname'])) {
    foreach ($content as $e) {
      $count1++;
      $each = explode(',', $e);
      if (strcmp($each[0], $key) == 0 && strcasecmp($each[1], $firstname) == 0) {
        echo '<h2>' . $each[2] . '</h2>
              <figure>
              <img src = "' . $each[3] . '">
              <figcaption>' . $each[2] . '</figcaption>
              <figure>
              ';
        break;
      } 
      if($count1 == $num && !(strcmp($each[0], $key) == 0 && strcasecmp($each[1], $firstname) == 0)) {
        echo 'firstname or key is invalid. ';
        break;
        /* foreach(file('data.txt') as $e){
          echo $e;
          echo '</br>';
        }
        echo file('data.txt'); */
      }
    }
  }
}
?>