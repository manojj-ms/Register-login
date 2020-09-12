<?php
session_start();
$db = mysqli_connect("localhost", "root", "" , "form");
if(isset($_POST['registration'])) {
    $email = mysqli_real_escape_string($_POST['email']);
    $password = mysqli_real_escape_string($_POST['password']);
    $password2 = mysqli_real_escape_string($_POST['password2']);
    if ($password == $password2)
    {
        $password = md5($password);
        $sql = "INSERT INTO data (email, password) VALUES('$email', '$password')";
        mysqli_query($db, $sql);
        $_SESSION['message'] = "You are now logged in";
        $_SESSION['email'] = $email;
    }
    else{
        $_SESSION['message'] = "The Passwords are incorrect";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
<form method="post" action="Signup.php">
 <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn" name="registration">Register</button>
  </div>

  <!--<div class="container signin">-->
    <p style="margin-left:17px;margin-top:-10px">Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>
</body>
</html></head>