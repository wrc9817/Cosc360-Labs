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
      if (isset($_POST["firstname"]))
        //echo $_POST["firstname"]."<br />";
        $first_name = $_POST["firstname"];
      if (isset($_POST["lastname"]))
        //echo $_POST["key"];
        $last_name = $_POST["lastname"];
      if (isset($_POST["username"]))
        //echo $_POST["key"];
        $user_name = $_POST["username"];
      if (isset($_POST["email"]))
          //echo $_POST["key"];
        $email = $_POST["email"];
      if (isset($_POST["password"]))
          //echo $_POST["key"];
        $password = $_POST["password"];

        //link for refering page
        if (isset($_SERVER['HTTP_REFERER']))
          $return_link = $_SERVER['HTTP_REFERER'];

        //check to see if user exists (based on username)
        //good connection, so do you thing
        //don't forget to escape '' either username or email
        $sql = "SELECT * FROM users where username = '$user_name' OR email = '$email';";

        $results = mysqli_query($connection, $sql);

        //and fetch requsults
        if ($row = mysqli_fetch_assoc($results))
        {
          echo "<p>User already exists with this name and/or email<p>";
          if (isset($return_link))
          {
            echo '<a href="'.$return_link.'">Return to user entry</a>';
          }
          //echo $row['username']." ".$row['firstName']." ".$row['lastName']." ".$row['email']." ".$row['password']."<br/>";
        }
        else {
          //insert user into table, and make sure to hash password!
          $sql = "INSERT INTO users (username, firstname, lastname, email, password) values ('$user_name','$first_name','$last_name','$email',md5('$password'));";
            if (mysqli_query($connection, $sql))
            {
              $count = mysqli_affected_rows($connection);
              echo "<p>An account for the user $user_name has been created</p>";
            }
        }
        mysqli_free_result($results);

    }
    else {
      //redirect
      echo "<p>Bad information has been entered</p>";
      if (isset($return_link))
      {
        echo '<a href="'.$return_link.'">Return to user entry</a>';
      }
    }

    mysqli_close($connection);
}
?>
</body>
</html>
