<?php
session_start();
$db = mysqli_connect("localhost", "root", "" , "form");
if(isset($_POST['login'])) {
    session_start();
    $email = mysqli_real_escape_string($_POST['email']);
    $password = mysqli_real_escape_string($_POST['password']);
    $password = md5($password);
    $sql = "SELECT * FROM data WHERE email='$email' AND password='$password'";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result)==1){
        $_SESSION['message'] = "You are now logged in";
        $_SESSION['email'] = $email;
    }
    else{
        $_SESSION['message'] = "The Username/Password are incorrect";
    }
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="log.css">
</head>
<div class="container">
<h1>Log-In</h1>
<br>
    <label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" name="login">Login</button> 
     
  </div>
</form>
</html>