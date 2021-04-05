<!DOCTYPE html>
<html>

<p>Here are some results:</p>

<?php

$host = "localhost";
$database = "lab9";
$user = "webuser";
$password = "P@ssw0rd";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();
if($error != null)
{
  $output = "<p>Unable to connect to database!</p>";
  die($error);
}
else
{
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['firstname'])){ 
      $firstname = $_POST['firstname']; 
    }
    if(isset($_POST['lastname'])){ 
      $lastname = $_POST['lastname']; 
    }
    if(isset($_POST['username'])){ 
      $user = $_POST['username']; 
    }
    if(isset($_POST['email'])){ 
      $email = $_POST['email']; 
    }
    if(isset($_POST['password'])){ 
      $pass = $_POST['password']; 
    }
    if(isset($_SERVER['HTTP_REFERER'])){ 
      $refer = $_SERVER['HTTP_REFERER']; 
    }
    $sql1 = "SELECT * FROM users WHERE username = '$user' OR email = '$email';";
    $sql2 = "INSERT INTO users (username, firstname, lastname, email, password) values ('$user','$firstname','$lastname','$email',md5('$pass'));";
    $result1 = mysqli_query($connection, $sql1);
    $row = mysqli_fetch_assoc($result1);
    if(isset($row)){
      echo "<p>User already exists with this name and/or email.</p>";
      printReturn($refer);
      mysqli_free_result($result1);
    }else{
      $result2 = mysqli_query($connection, $sql2);
      echo "<p>An account for the user ".$user." has been created.</p>";
      printReturn($refer);
      mysqli_free_result($result2);
    }
  }
  else{
    echo "Wrong connection method.";
    printReturn($refer);
}
mysqli_close($connection);
}
// parameter is the return link
function printReturn($e){
  if(isset($e)){
    echo "<a href = '".$e."'>Back</a>";
  }
}
?>
</html>
