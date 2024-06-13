<?php
    session_start();
    if (empty($_SESSION['email'])) {
      header("location:../");
    }else {
      $username = $_SESSION['name'];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucky Number</title>
    <link rel="stylesheet" href="../styles/landing.css">
</head>
<body>
<nav>
  <div class="navbar">
    <div class="logo-container">
      <img src="../images/clover.png" alt="Logo" class="logo-img">
      <span class="logtext">Lucky Five</span>
    </div>
    <div>
      <button class="button-get" onclick="starter('inputs.php')">Get Started</button>
     <a href="../connection/logout.php"><button class="button-out">Logout</button></a>
    </div>
  </div>
</nav>

<main>
    <h1>Welcome <span style="color: green;"><?php  echo $username; ?></span> to Lucky Five Game !</h1>
    <p>Are you ready to test your luck and intuition? Welcome to <span style="font-weight: 700;color: green;">Lucky Five</span>, the ultimate guessing game where your wits and a bit of fortune can lead you to victory! <br> We've hidden a <span style="color: green; font-weight: 800;">random number</span>, known only to our mysterious admin 🥷. Find out what it is.</p>
    <!-- tips -->
<div class="tips">
  <div class="tip-box">
     <div class="tip">
        <div class="icon"><img src="../images/puzzle.png" alt="brain" width="100%"></div>
        <div class="exp">Enhance your problem-solving skills while enjoying an entertaining game.</div>
     </div>
     <div class="tip">
        <div class="icon"><img src="../images/coin.png" alt="brain" width="80%"></div>
        <div class="exp">You have five attempts to guess the right number.</div>
     </div>
  </div>

  <div class="tip-box">
    <div class="tip">
                <div class="icon"><img src="../images/fun.png" alt="brain" width="90%"></div>
        <div class="exp">Prove your guessing prowess and share your success with friends!</div>
    </div>
    <div class="tip">
                <div class="icon"><img src="../images/unlocked.png" alt="brain" width="100%"></div>
        <div class="exp">Dive into the excitement of guessing the secret number with only five chances.</div>
    </div>
  </div>
</div>
    <!-- End of tips -->

    <div class="button-container">
        <button class="play-button" onclick="starter('inputs.php')">
            <div class="image-container">
            <img src="../images/play-button.png" alt="Play">
            </div>

            <div class="starter"><h3>😉 Tap to get Started</h3></div>
        </button>
    </div>
</main>
</body>
<script src="../js/landing.js"></script>
</html>