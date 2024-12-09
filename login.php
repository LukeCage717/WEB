<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
    <style>
      .error-message {
        color: red;
        font-size: 14px;
        margin-top: 10px;
        text-align: center;
      }
      .signup-link {
        text-align: center;
        margin-top: 15px;
        font-size: 14px;
      }
      .signup-link a {
        text-decoration: none;
        color: #826afb;
        font-weight: bold;
      }
      .signup-link a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
<?php
$error_message = "";

if (isset($_POST['submit'])) { 
    include 'dbconnect.php';    
    $User_Name = $_POST["User_Name"];  
    $Password = $_POST["Password"];

    $sql = "SELECT * FROM user_register WHERE User_Name='$User_Name' AND Password='$Password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        header("Location: welcome.html");
        exit();
    } else {
        $error_message = "Incorrect Username or Password";
    }
}
?>
    <section class="container">
      <header>Login</header>
      <form action="" method="POST" class="form">
        <div class="input-box">
          <label>User name</label>
          <input type="text" name="User_Name" placeholder="Enter user name" required />
        </div>
        <div class="input-box">
          <label>Password</label>
          <input type="password" name="Password" placeholder="Enter password" required />
        </div>
        <button type="submit" name="submit">Login</button>
        <?php if ($error_message != ""): ?>
          <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
      </form>
      <div class="signup-link">
        New User? <a href="regform.php">Sign Up</a>
      </div>
    </section>
  </body>
</html>
