<?php
 include("C:/xampp/htdocs/lucky-number/connection/connection.php");
 $error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['fullname'];
    $email = $_POST['email'];

        $userChecker = "SELECT * FROM users WHERE email = '$email'";
        $userCheckerResults = mysqli_query($connect,$userChecker);
        $result = mysqli_num_rows($userCheckerResults);
        if($result > 0){
          $error = "Try again";
        }
   else{
      $register = "INSERT INTO users(username,email) VALUES('$username','$email')";
     $reg = mysqli_query($connect,$register);
     if($reg){
        header("location:../index.php");
     }
   }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
        <link rel="stylesheet" href="../styles/reglog.css">
</head>
<body>
       <nav>
  <div class="navbar">
    <div class="logo-container">
      <img src="../images/clover.png" alt="Logo" class="logo-img">
      <span class="logtext">Lucky Five</span>
    </div>
    <div>
      <a href="../"><button class="button-get">Sign - in to your account</button></a>
    </div>
  </div>
</nav>
     <main>
<center>
       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <center>
      <div>            <h2>
               Hi , Welcome !🤩 <br><span style="color: grey;">Sign - up to start the game.</span>
            </h2></div>
            <div><input type="text" placeholder="Fullname" name="fullname" required id="userinputs"></div><br>
            <div><input type="email" id="userinputs" placeholder="Email address" name="email" required></div>
            <div><button type="submit" id="btn">Create an account now!</button></div>
        </center></form>
        <?php
if(empty($error)){

}else{
echo(
    "<div class='error'>
    <div>😒 Email already used , use another email please! 😒</div>
</div>"
);
}
?>
</center>
     </main>
</body>
</html>