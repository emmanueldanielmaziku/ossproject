<?php
include("C:/xampp/htdocs/lucky-number/connection/connection.php");

    session_start();
    if (empty($_SESSION['email'])) {
      header("location:../");
    }

$token = "0";
$email = "mariam@gmail.com";

$tokenChecker = "SELECT * FROM tokens WHERE user_ID = '$email'";
$tokenCheckerResults = mysqli_query($connect,$tokenChecker);
$counterResults = mysqli_num_rows($tokenCheckerResults);
if($counterResults >= 1){
   $savedToken = rand(0,100);
   $newTokenCreator = "UPDATE tokens SET token_number='$savedToken' WHERE user_ID = '$email'";
   $TokenResults = mysqli_query($connect,$newTokenCreator);
   if($TokenResults){
    $tokenSelector = "SELECT token_number FROM tokens WHERE user_ID = '$email'";
    $selectionResults = mysqli_query($connect,$tokenSelector);
    if ($selectionResults) {
         $row = mysqli_fetch_assoc($selectionResults);
         $token = $row['token_number'];
    } else {
       die("An error occured ! Please contact Mariam");
    }
}
}else{

$savedToken = rand(0,100);
$storeToken ="INSERT INTO tokens(token_number,user_ID) VALUES('$savedToken','$email')";
$insertionResult = mysqli_query($connect,$storeToken);

if($insertionResult){
    echo("A new token has been generated");
    $tokenSelector = "SELECT token_number FROM tokens WHERE user_ID = '$email'";
    $selectionResults = mysqli_query($connect,$tokenSelector);
    if ($selectionResults) {
         $row = mysqli_fetch_assoc($selectionResults);
         $token = $row['token_number'];
    } else {
       die("An error occured ! Please contact Mariam");
    }
}else{
    echo("Insertion failed");
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucky Number</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<style>
   #missed {
      display: none;
   }
   #active {
      display: block;
   }
</style>
<body>
<nav>
  <div class="navbar">
    <div class="logo-container">
      <img src="../images/clover.png" alt="Logo" class="logo-img">
      <span class="logtext">Lucky Five</span>
    </div>
    <div>
      <button class="button-get" onclick="starter('inputs.php')">Reset game</button>
           <a href="../connection/logout.php"><button class="button-out">Logout</button></a>
    </div>
  </div>
</nav>
        <center id="mainBox">
            <div id="active"><h1>A secret random number <span style="color: green;">***</span> has been generated!</h1></div>
            <div id="missed">🫤</div>
            <div id="missed"><h2>Sorry you missed the <span style="color: green;">lucky number</span> , try again!</h2></div>

            <div id="active"><h3>Choose 5 random numbers from <span style="color: green;">1</span> -  <span style="color: green;">100</span> and try your luck</h3></div>
<!-- One -->
<div id="inputOne">
<div class="inp">
    <div class="trial"> 
        <input type="number" name="" id="intOne">
        <div>1<sup>st</sup> Trial</div>
     
    </div>
    <img src="../images/link.png" alt="link" width="3%">
    <div class="trial">
        <input type="number" name="" id="intTwo">
    <div>2<sup>nd</sup> Trial</div>
    </div>
    <img src="../images/link.png" alt="link" width="3%">
   <div class="trial">
     <input type="number" name="" id="intThree">
    <div>3<sup>rd</sup> Trial</div>
   </div>
    <img src="../images/link.png" alt="link" width="3%">
    <div class="trial">
        <input type="number" name="" id="intFour">
    <div>4<sup>th</sup> Trial</div>
    </div>
    <img src="../images/link.png" alt="link" width="3%">
    <div class="trial">
        <input type="number" name="" id="intFive">
    <div>5<sup>th</sup> Trial</div>
    </div>
</div><br><br>
<div id="active"><span style="padding: 10px;font-size: 24px;">👉</span><button onclick="authenticateResults(<?php echo $token; ?>)" id="checkerBtn">Click to see your results!</button><span style="padding: 10px;font-size: 24px;">👈</span></div>
<div id="missed"><span style="padding: 10px;font-size: 24px;">👉</span><button onclick="reset()" id="checkerBtnReset">Sorry...! try again 😒</button><span style="padding: 10px;font-size: 24px;">👈</span></div>

</div>
</div>        
</center>

</body>



<script src="../js/inputs.js"></script>
<script>
    function authenticateResults(token){
       var tin = 0;
       var input1 = document.getElementById("intOne").value;
       var input2 = document.getElementById("intTwo").value;
       var input3 = document.getElementById("intThree").value;
       var input4 = document.getElementById("intFour").value;
       var input5 = document.getElementById("intFive").value;

       if (input1 == token) {
          document.getElementById("intOne").style.border = "2px solid green";
          document.getElementById("intOne").style.color = "green";
          tin++;
       }else{
          document.getElementById("intOne").style.border = "2px solid red";
          document.getElementById("intOne").style.color = "red";
       }

    // two
      if (input2 == token) {
          document.getElementById("intTwo").style.border = "2px solid green";
          document.getElementById("intOne").style.color = "green";
          tin++;
       }else{
          document.getElementById("intTwo").style.border = "2px solid red";
          document.getElementById("intTwo").style.color = "red";
       }
    // three
           if (input3 == token) {
          document.getElementById("intThree").style.border = "2px solid green";
          document.getElementById("intOne").style.color = "green";
          tin++;
       }else{
          document.getElementById("intThree").style.border = "2px solid red";
          document.getElementById("intThree").style.color = "red";
       }
    // four
           if (input4 == token) {
          document.getElementById("intFour").style.border = "2px solid green";
          document.getElementById("intOne").style.color = "green";
          tin++;
       }else{
          document.getElementById("intFour").style.border = "2px solid red";
          document.getElementById("intFour").style.color = "red";
       }
    //five
           if (input5 == token) {
          document.getElementById("intFive").style.border = "2px solid green";
          document.getElementById("intOne").style.color = "green";
          tin++;
       }else{
          document.getElementById("intFive").style.border = "2px solid red";
          document.getElementById("intFive").style.color = "red";
       }

       if(tin == 0){
         document.getElementById("missed").style.display = "block";
         document.getElementById("active").style.display = "block";
       }else{
         document.getElementById("missed").style.display = "none";
       }
    }
</script>
</html>
























































































<!-- Back up -->
 <?php
// include("C:/xampp/htdocs/lucky-number/connection/connection.php");

// $token = "0";
// $email = "mariam@gmail.com";

// $tokenChecker = "SELECT * FROM tokens WHERE user_ID = '$email'";
// $tokenCheckerResults = mysqli_query($connect,$tokenChecker);
// $counterResults = mysqli_num_rows($tokenCheckerResults);
// if($counterResults >= 1){
//    $savedToken = rand(0,100);
//    $newTokenCreator = "UPDATE tokens SET token_number='$savedToken' WHERE user_ID = '$email'";
//    $TokenResults = mysqli_query($connect,$newTokenCreator);
//    if($TokenResults){
//     $tokenSelector = "SELECT token_number FROM tokens WHERE user_ID = '$email'";
//     $selectionResults = mysqli_query($connect,$tokenSelector);
//     if ($selectionResults) {
//          $row = mysqli_fetch_assoc($selectionResults);
//          $token = $row['token_number'];
//     } else {
//        die("An error occured ! Please contact Mariam");
//     }
//    }
// //    echo("A new token has been generated");

// }else{
//     $savedToken = rand(0,100);
// $storeToken ="INSERT INTO tokens(token_number,user_ID) VALUES('$savedToken','$email')";
// $insertionResult = mysqli_query($connect,$storeToken);
// if($insertionResult){
//     echo("A new token has been generated");
//     $tokenSelector = "SELECT token_number FROM tokens WHERE user_ID = '$email'";
//     $selectionResults = mysqli_query($connect,$tokenSelector);
//     if ($selectionResults) {
//          $row = mysqli_fetch_assoc($selectionResults);
//          $token = $row['token_number'];
//     } else {
//        die("An error occured ! Please contact Mariam");
//     }
// }else{
//     echo("Insertion failed");
// }
// }

?>

<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucky Number</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>

<body>
<nav>
  <div class="navbar">
    <div class="logo-container">
      <img src="../images/clover.png" alt="Logo" class="logo-img">
      <span class="logtext">Lucky Five</span>
    </div>
    <div>
      <button class="button-get" onclick="starter('inputs.php')">Reset game</button>
      <button class="button-out">Logout</button>
    </div>
  </div>
</nav>
        <center id="mainBox">
            <div><h1>A secret random number <span style="color: green;">***</span> has been generated!</h1></div>
            <div><h3>Choose a number from <span style="color: green;">1</span> -  <span style="color: green;">100</span></h3></div>

<div id="inputOne">
<div><input type="number" value="<?php echo $token; ?>" id="token"></div>
<div><h2>first trial lets go.🐎🐣</h2></div>
<div><input type="number" name="" id="intOne"></div><br>
<div><button onclick="one()">Next Trial</button></div>
</div>
Two
<div id="inputTwo">
<div><input type="number" value="<?php echo $token; ?>" id="token"></div>

<div><h2>second trial you can do it😉</h2></div>
<div><input type="number" name="" id=""></div><br>
<div><button onclick="two()">Next Trial</button></div>
</div>

 three -->
<!-- <div id="inputThree">
<div><input type="number" value="<?php echo $token; ?>" id="token"></div>

<div><h2>third trial dont give up🤦‍♀️ keep up🤗</h2></div>
<div><input type="number" name="" id=""></div><br>
<div><button onclick="three()">Next Trial</button></div>

</div> -->
<!-- four -->
<!-- <div id="inputFour">
<div><input type="number" value="<?php echo $token; ?>" id="token"></div> -->

<!-- <div><h2>fourth trial almost there omg😎</h2></div>
 <div><input type="number" name="" id=""></div><br>
<div><button onclick="four()">Next Trial</button></div>

</div> -->
<!-- five -->
<!-- <div id="inputFive">
<div><input type="number" value="<?php echo $token; ?>" id="token"></div> -->

<!-- <div><h2>last trial woow deal done😍</h2></div>
<div><input type="number" name="" id=""></div><br>
<div><button onclick="five()">Try your luck 🙈</button></div>

</div>
        
        </center>

</body>



<script src="../js/inputs.js"></script>
</html>  -->
