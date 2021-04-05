<!DOCTYPE html>
<html>
<body>
<?php

$host     = "localhost";
$database = "lab9";
$user     = "webuser";
$password = "P@ssw0rd";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();
if($error != null)
{
  $output = "<p>Unable to connect to database!</p>";
  exit($output);
}
else
{
    //get data from POST (last week)
    //print_r($_POST);
    if (isset($_SERVER["REQUEST_METHOD"]) &&  $_SERVER["REQUEST_METHOD"] == "POST")
    {
      if (isset($_POST["username"]))
        //echo $_POST["key"];
        $user_name = $_POST["username"];
      if (isset($_POST["password"]))
          //echo $_POST["key"];
        $password = $_POST["password"];

        //check to see if user exists (based on username)
        //good connection, so do you thing

        //hash the password before checking
        $password_hash = md5($password);
        $sql = "SELECT * FROM users where username = '$user_name' AND password = '$password_hash';";

        $results = mysqli_query($connection, $sql);

        //and fetch requsults
        if ($row = mysqli_fetch_assoc($results))
        {
          echo "<p>This user has a valid account<p>";
        }
        else
        {
          echo "<p>Invalid username and/or password </p>";
          if (isset($return_link))
          {
            echo '<a href="'.$return_link.'">Return to user entry</a>';
          }
        }
        mysqli_free_result($results);

    }
    else {
      //redirect
      echo "<p>Bad information has been entered</p>";

    }

    mysqli_close($connection);
}
?>
</body>
</html>
