<?php
  session_start();
  $umsg = "";
  if($_POST["asignin"]){
    $aname = $_POST["aname"];
    $apassword = $_POST["apassword"];

    include 'dbconnect.php';

    if($aname !=="" && $apassword!==""){
      $sql = "select aname from admins where aname = '$aname' and apassword = '$apassword'";
      $result = $conn->query($sql);
      if($result->num_rows > 0) {
        $_SESSION["aname"] = $aname;
        header('Location: secureAdmin.php');
      }
      else {
        $umsg = $umsg . "<br> Sign in failed.";
      }
    }

    if($aname == ""){
       $anameError = "Please enter a Admin User Name";
    }
    if($apassword == ""){
       $apasswordError = "Please enter a Admin Password";
    }

  }
?>


<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <title>Admin Log In</title>
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
          <h1>ADMINISTRATOR ACCESS</h1>
          <h2>Admin Sign In</h2>
      </header>
      <!--=====================HEADER=========================-->


      <form action="adminLogin.php" method="post">
          <input <? if($anameError){echo "style=\"border: 2px solid red\" ";} ?> type="text" name="aname" value="<?=$aname?>" class="inputText" placeholder=<? if($anameError){echo "\"$anameError\"";} else{echo "\"Admin Username\"";}?>><br><br>
          <input <? if($apasswordError){echo "style=\"border: 2px solid red\" ";} ?> type="password" name="apassword" class="inputText" placeholder=<? if($apasswordError){echo "\"$apasswordError\"";} else{echo "\"Admin Password\"";}?>> <br><br>
          <br>
          <input type="submit" name="asignin" value="Sign In" class="btn">
          <h4><?=$umsg ?></h4>
      </form>


      <!--=====================FOOTER PART=========================-->

      <footer>
          <p>&copy; Copyright 2016, Library Catalogue</p>
      </footer>
      <!--=====================FOOTER PART=========================-->

  </body>

</html>
