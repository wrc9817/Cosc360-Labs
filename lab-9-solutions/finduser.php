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

        //check to see if user exists (based on username)
        //good connection, so do you thing

        //hash the password before checking
        $sql = "SELECT * FROM users where username = '$user_name';";

        $results = mysqli_query($connection, $sql);

        echo "<fieldset><legend>User: $user_name</legend>";
        echo "<table id=\"usertable\">";
        //and fetch requsults
        if ($row = mysqli_fetch_assoc($results))
        {
            echo "<tr><td>First Name:</td><td>".$row['firstName']."</td></tr>";
            echo "<tr><td>Last Name:</td><td>".$row['lastName']."</td></tr>";
            echo "<tr><td>Email:</td><td>".$row['email']."</td></tr>";
        }
        else
        {
          echo "<tr><td>Invalid username and/or password</tr></td>";

        }
        echo "</table>";
        echo "</fieldset>";
        if (isset($return_link))
        {
          echo '<a href="'.$return_link.'">Return to user entry</a>';
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
