<link rel="stylesheet" href="styles/style.css">


<?php
  if (!isset($_SESSION["uname"]) && !isset($_SESSION["aname"])) {
?>
    <li><a href="login.php">LOG IN</a></li>
    <li><a href="adminLogin.php">ADMIN LOG IN</a></li>
    <li><a href="signup.php">SIGN UP</a></li>
    <li><a href="about.php">ABOUT</a></li>
    <li><a href="contact.php">CONTACT</a></li>

<?php
    }
  else if(isset($_SESSION["aname"])){

?>

<li><a href="logout.php">LOGOUT</a></li>
<li><a href="secure.php">LIBRARY SEARCH</a></li>
<li><a href="secureAdmin.php">LIBRARY MANAGE</a></li>

<?php
    }
  else{
?>

<li><a href="logout.php">LOGOUT</a></li>
<li><a href="secure.php">LIBRARY</a></li>
<li><a href="about.php">ABOUT</a></li>
<li><a href="contact.php">CONTACT</a></li>

<?php
    }
?>
