<?php
  session_start();
  if(!isset($_SESSION["uname"]) && !isset($_SESSION["aname"])){
    header('Location: login.php');
  }

?>

<?php
  if($_POST['search']){
    $title = $_POST["search"];
    $searchIndex = substr($title, 0, 1);

    include "dbconnect.php";

    $sql = "SELECT * FROM Library WHERE Title LIKE '$searchIndex%'";
    $searchResult = $conn->query($sql);



    if ($searchResult->num_rows > 0) {
      $result = $result . "<th>Title</th>" . "<th>Author</th>" . "<th>Pages</th>" . "<th>Price</th>";
      while($row = $searchResult->fetch_assoc()){
        $result = $result . "<tr>";
         $result = $result . "<td>" . $row["Title"] . "</td>";
         $result = $result . "<td>" . $row["Author"] . "</td>";
         $result = $result . "<td>" . $row["Pages"] . "</td>";
         $result = $result . "<td>" . $row["Price"] . "</td>";
         $result = $result . "</tr>";
      }
    }
    else {
      $result = "error";
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
    <style class="alphaStyle">

    </style>
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
        <h2>Search the Library Catalogue</h2>
    </header>
    <!--=====================HEADER=========================-->

    <div class="container searchbar">
      <form class="" action="secure.php" method="post">
        <input type="search" name="search" placeholder="Search the Library" id="mysearch" onchange="this.form.submit()">
      </form>
    </div>
    <div class="alphaList">

    </div>

    <div class="table container">
        <table>
          <?=$result ?>
        </table>
    </div>

    <!--=====================FOOTER PART=========================-->

    <footer>
      <p>&copy; Copyright 2016, Library Catalogue</p>
    </footer>
    <!--=====================FOOTER PART=========================-->





</body>

</html>
