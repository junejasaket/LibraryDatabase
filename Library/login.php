<?php
  session_start();
  if(isset($_SESSION["uname"])){
    header('Location: secure.php');
  }
  if(isset($_SESSION["aname"])){
    header('Location: secureAdmin.php');
  }
  $umsg = "";
  if($_POST["usignin"]){
    $uname = $_POST["uname"];
    $upassword = $_POST["upassword"];

    include 'dbconnect.php';

    if($uname !=="" && $upassword!==""){
      $sql = "select uname from users where uname = '$uname' and upassword = '$upassword'";
      $result = $conn->query($sql);
      if($result->num_rows > 0) {
        $_SESSION["uname"] = $uname;
        header('Location: secure.php');
      }
      else {
        $umsg = $umsg . "<br> Sign in failed.";
      }
    }

    if($uname == ""){
       $unameError = "Please enter a User Name";
    }
    if($upassword == ""){
       $upasswordError = "Please enter a Password";
    }

  }
?>


<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <title>Library search</title>
      <link rel="stylesheet" href="styles/style.css">
  </head>

  <body>

      <!--=====================NAVIGATION BAR=========================-->

      <nav>
          <div class="container" id="navbar">
              <div id="navlistmobile">
                  <ul class="nav-list">
                      <?php include 'navbar.php'; ?>

                  </ul>
              </div>



              <ul class="social-list">
                  <li>
                      <a href="#">
                          <img src="images/youtube.png" alt="Youtube" />
                      </a>
                  </li>
                  <li>
                      <a href="#">
                          <img src="images/twitter.png" alt="twitter" />
                      </a>
                  </li>
                  <li>
                      <a href="#">
                          <img src="images/facebook.png" alt="facebook" />
                      </a>
                  </li>
              </ul>


          </div>
      </nav>

      <!--=====================NAVIGATION BAR=========================-->

      <!--=====================HEADER=========================-->
      <header class="container">
          <h1>Library Database</h1>
          <h2>Sign In</h2>
      </header>
      <!--=====================HEADER=========================-->


      <form action="login.php" method="post">
          <input <? if($unameError){echo "style=\"border: 2px solid red\" ";} ?> type="text" name="uname" value="<?=$uname?>" class="inputText" placeholder=<? if($unameError){echo "\"$unameError\"";} else{echo "\"Username\"";}?>><br><br>
          <input <? if($upasswordError){echo "style=\"border: 2px solid red\" ";} ?> type="password" name="upassword" class="inputText" placeholder=<? if($upasswordError){echo "\"$upasswordError\"";} else{echo "\"Password\"";}?>> <br><br>
          <br>
          <input type="submit" name="usignin" value="Sign In" class="btn">
          <h4><?=$umsg ?></h4>
      </form>


      <!--=====================FOOTER PART=========================-->

      <footer>
          <p>&copy; Copyright 2016, Library Catalogue</p>
      </footer>
      <!--=====================FOOTER PART=========================-->

  </body>

</html>
