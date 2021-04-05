<!DOCTYPE html>
<html>
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
else{
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['username'])){
    $user = $_POST['username'];
  }
  if(isset($_POST['password'])){
    $pass = $_POST['password'];
  }
  $sql = "SELECT * FROM users WHERE username = '$user' AND password = md5('$pass');";
  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($result);
  if(isset($row)){
    echo "User has a valid account.";
    //printReturn($refer);
    mysqli_free_result($result);
  }
  else{
    echo "username and/or password are invalid.";
    //printReturn($refer);
    mysqli_free_result($result);
  }
}
else{
  echo "Wrong connection method.";
}
mysqli_close($connection);
}
/* // parameter is the return link
function printReturn($e){
  if(isset($e)){
    echo "<a href = '".$e."'>Back</a>";
  }
} */
?>
</html>
