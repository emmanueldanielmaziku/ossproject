<?php
    include("C:/xampp/htdocs/lucky-number/connection/connection.php");
    session_start();
    if (empty($_SESSION['email'])) {
        
    } else {
      header("location:components/");
    }
    
    $error = "";
     if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email'];
        $userChecker = "SELECT * FROM users WHERE email = '$email'";
        $userCheckerResults = mysqli_query($connect,$userChecker);
        if($userCheckerResults){
        $result = mysqli_num_rows($userCheckerResults);
        if($result >=1){
         $row = mysqli_fetch_assoc($userCheckerResults);
         $userEmail = $row['email'];
         $userName = $row['username'];
         $_SESSION['email'] = $userEmail;
         $_SESSION['name'] = $userName;
         header("location:components/");
        }else{
            $error = "Email not found";

        }


    } else {
        die("Sorry an error occured during authentication! , Please contact the developer for help!");
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles/reglog.css">
</head>
<body>
    <nav>
  <div class="navbar">
    <div class="logo-container">
      <img src="images/clover.png" alt="Logo" class="logo-img">
      <span class="logtext">Lucky Five</span>
    </div>
    <div>
      <a href="components/reg.php"><button class="button-get">Create a new account</button></a>
    </div>
  </div>
</nav>

    <main>
<center>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div>
            <h2>
               Welcome back !🤩 <br><span style="color: grey;"> Sign-in to start the game.</span>
            </h2>
            <div><input type="email" name="email" id="emailInput" placeholder="Type your email address..." required></div>
            <div>
                <button type="submit" id="btn">Sign-in & Play now</button>
            </div>
        </div>
</form>

<?php
if(empty($error)){

}else{
echo(
    "<div class='error'>
    <div>😒 Sorry email not available! 😒</div>
</div>"
);
}
?>
</center>
    </main>
</body>
</html>