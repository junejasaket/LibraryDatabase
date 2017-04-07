<?php
 include 'dbconnect.php';
 if ($_POST['usignup']){
   $uname = $_POST['uname'];
   $upassword = $_POST['upassword'];
   $reupassword = $_POST['reupassword'];


   if($uname !== "" && $upassword !== "" && $upassword==$reupassword){
      $sql = "Insert into users (uname, upassword) values('$uname', '$upassword')";

      if($conn->query($sql) === TRUE){
        $umsg = "Sign Up successful";
      }
      else {
        $umsg = "Error " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
   }
   else{
      $umsg = "Please enter a valid username and password.";
   }

   if($uname == ""){
      $unameError = "Please enter a User Name";
   }
   if($upassword == ""){
      $upasswordError = "Please enter a Password";
   }
   if($reupassword !== $upassword){
      $reupasswordError = "Passwords must match";
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
           <h2>Sign Up</h2>
       </header>
       <!--=====================HEADER=========================-->

       <form action="signup.php" method="post">
           <input <? if($unameError){echo "style=\"border: 2px solid red\" ";} ?> type="text" name="uname" value="<?=$uname?>" class="inputText" placeholder=<? if($unameError){echo "\"$unameError\"";} else{echo "\"Username\"";}?>><br><br>
           <input <? if($upasswordError){echo "style=\"border: 2px solid red\" ";} ?> type="password" name="upassword" class="inputText" placeholder=<? if($upasswordError){echo "\"$upasswordError\"";} else{echo "\"Password\"";}?>> <br><br>
           <input <? if($reupasswordError){echo "style=\"border: 2px solid red\" ";} ?> type="password" name="reupassword" class="inputText" placeholder=<? if($reupasswordError){echo "\"$reupasswordError\"";} else{echo "\"Re-Enter Password\"";}?>> <br><br>
           <br>
           <input type="submit" name="usignup" value="Sign Up" class="btn">
           <h4><?=$umsg?></h4>
       </form>


       <!--=====================FOOTER PART=========================-->

       <footer>
           <p>&copy; Copyright 2016, Library Catalogue</p>
       </footer>
       <!--=====================FOOTER PART=========================-->

   </body>

 </html>
