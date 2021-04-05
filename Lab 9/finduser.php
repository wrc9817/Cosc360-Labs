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
  if(isset($_SERVER['HTTP_REFERER'])){ 
    $refer = $_SERVER['HTTP_REFERER']; 
  }
  $sql = "SELECT * FROM users WHERE username = '$user';";
  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($result);
  if(isset($row)){
    echo $row['firstname'];
    echo "<fieldSet>
          <legend> User: ".$user."</legend>
          <table>
          <tr><td>First Name: </td><td>".$row['firstName']."</td></tr>
          <tr><td>Last Name: </td><td>".$row['lastName']."</td></tr>
          <tr><td>Email: </td><td>".$row['email']."</td></tr>
          </table></fieldSet>";
    printReturn($refer);
    mysqli_free_result($result);
  }
  else{
    echo "username and/or password are invalid.";
    printReturn($refer);
    mysqli_free_result($result);
  }
}
else{
  echo "Wrong connection method.";
}
mysqli_close($connection);
}
function printReturn($e){
  if(isset($e)){
    echo "<a href = '".$e."'>Back</a>";
  }
}
?>
</html>
