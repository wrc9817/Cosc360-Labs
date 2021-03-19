<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lab 6</title>
  <!-- Bootstrap core CSS -->
  <link href="bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/lab7.css" rel="stylesheet">
</head>

<body>
  <?php
  $server = array('Server 1', 'Server 2', 'Server 3', 'Server 4', 'Server 5');
  $emailErr = '';
  $pwdErr = '';
  include("lab7-data.php");
  if (isset($_POST['SubmitButton'])) { //check if form was submitted

    if (empty($_POST["email"])) {
      $emailErr = "Enter an email";
    } else {
      $Email = $_POST["email"];
    }
    if (empty($_POST["password"])) {
      $pwdErr = "Email and password not found";
    } else {
      $Password = $_POST["password"];
    }
  }
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-6">
        <div id="login">
          <div class="page-header">
            <h2>Login</h2>
          </div>
          <form role="form" action="" method="post">
            <div class="form-group has-error">

              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" name="email" value="">
              <p class="help-block"><?php echo $emailErr; ?></p>
            </div>
            <div class="form-group has-error">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="password">
              <p class="help-block"><?php echo $pwdErr; ?></p>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Server</label>
              <select name="server" class="form-control">
                <?php
                foreach ($server as $key => $value) :
                  echo '<option value="' . $key . '">' . $value . '</option>'; //close your tags!!
                endforeach;
                ?>
              </select>


            </div>
            <button type="submit" class="btn btn-primary" name="SubmitButton">Submit</button>
          </form>
        </div>
      </div>
      <div class="col-md-3">
      </div>
    </div>
  </div> <!-- end container -->
  <!-- Bootstrap core JavaScript
================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="bootstrap3_defaultTheme/assets/js/jquery.js"></script>
  <script src="bootstrap3_defaultTheme/dist/js/bootstrap.min.js"></script>
</body>

</html>