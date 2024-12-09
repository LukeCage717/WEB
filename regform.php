<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>

<?php
if (isset($_POST['submit'])) { 
    include 'dbconnect.php';   
    $First_Name = $_POST["First_Name"];  
    $Last_Name = $_POST["Last_Name"];  
    $Email = $_POST["Email"]; 
    $Contact_Number = $_POST["Contact_Number"];  
    $User_Name = $_POST["User_Name"];  
    $Password = $_POST["Password"];
    $sql = "INSERT INTO user_register (First_Name, Last_Name, Email, Contact_Number, User_Name, Password) 
        VALUES ('$First_Name', '$Last_Name', '$Email', '$Contact_Number', '$User_Name', '$Password')";


    if (mysqli_query($conn, $sql)) {  
        echo "New record added";
    } else {
        echo "Error:".mysqli_error($conn);
    }
}
?>
    <section class="container">
      <header>Register</header>
      <form action="" method="POST" class="form">
        <div class="input-box">
          <label>First Name</label>
          <input type="text" name="First_Name" placeholder="Enter first name" required />
        </div>

	<div class="input-box">
          <label>Last Name</label>
          <input type="text" name="Last_Name" placeholder="Enter last name" required />
        </div>


        <div class="input-box">
          <label>Email Address</label>
          <input type="text" name="Email" placeholder="Enter email address" required />
        </div>

        <div class="column">
          <div class="input-box">
            <label>Contact Number</label>
            <input type="number" name="Contact_Number" placeholder="Enter contact number" required />
          </div>

               <div class="input-box">
          <label>User name</label>
          <input type="text" name="User_Name" placeholder="Enter user name" required />
        </div>
	
	<div class="input-box">
          <label>Password</label>
          <input type="password" name="Password" placeholder="Enter password" required />
        </div>

        </div>
        <button type="submit" name="submit">Register</button>
      </form>
    </section>
  </body>
</html>