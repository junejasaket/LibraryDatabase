<?php
  session_start();
  if(!isset($_SESSION["aname"])){
    header('Location: adminLogin.php');
  }

?>

<?php
  if($_POST['addRecord']){
    $addTitle = $_POST['addTitle'];
     $addAuthor = $_POST['addAuthor'];
     $addPages = $_POST['addPages'];
     $addPrice = $_POST['addPrice'];
     include "dbconnect.php";

        $sql = "Insert into Library (Title, Author, Pages, Price)
                values('$addTitle', '$addAuthor', '$addPages', '$addPrice')";

        if($conn->query($sql) === TRUE){
          $record = "Record added successfully";
        }
        else {
          $record = "Error " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    if($_POST['deleteRecord']){
      $deleteTitle = $_POST['deleteTitle'];
       include "dbconnect.php";

          $sql = "Delete from Library where Title='$deleteTitle'";

          if($conn->query($sql) === TRUE){
            $record = "Record deleted successfully";
          }
          else {
            $record = "Error " . $sql . "<br>" . $conn->error;
          }
          $conn->close();
      }

  $dmsg = "";
  if($_GET['del']){
   deleteRecord($_GET['del']);
  }

  function deleteRecord($orderID){
    include "dbconnect.php";
    $sql2="DELETE FROM Library WHERE Title='".$orderID."'";
    $result = $conn->query($sql2) or die($conn->error);
    $dmsg = "Deleted Successfully!";
    echo "<script type='text/javascript'>alert('$dmsg');</script>";
    echo "<script type='text/javascript'>window.location=\"secureAdmin.php\";</script>";
  }

  if($_POST['search']){
    $title = $_POST["search"];
    $searchIndex = substr($title, 0, 1);

    include "dbconnect.php";

    $sql = "SELECT * FROM Library WHERE Title LIKE '$searchIndex%'";
    $searchResult = $conn->query($sql);



    if ($searchResult->num_rows > 0) {
      $result = $result . "<span id='removeTable' onclick='javascript:removeTable();'>x</span>";
      $result = $result . "<th>Title</th>" . "<th>Author</th>" . "<th>Pages</th>" . "<th>Price</th>" . "<th>Delete</th>";
      while($row = $searchResult->fetch_assoc()){
        $result = $result . "<tr>";
         $result = $result . "<td>" . $row["Title"] . "</td>";
         $result = $result . "<td>" . $row["Author"] . "</td>";
         $result = $result . "<td>" . $row["Pages"] . "</td>";
         $result = $result . "<td>" . $row["Price"] . "</td>";
         $result = $result . "<td>" . "<input type=\"button\" class=\"btn\" name=\"$row[Title]\" value=\"Delete\" onclick=\"return Deleteqry(this.name);\"/>" . "</td>";
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
        <h1>Admin Panel</h1>
        <h2>Manage the Library Catalogue</h2>
    </header>
    <!--=====================HEADER=========================-->

    <div class="container searchbar">
      <form ction="secureAdmin.php" method="post">
        <input type="search" name="search" placeholder="Search the Library" id="mysearch" onchange="this.form.submit()">
        <input type="button" class="btn" name="addRecord" value="Add Record" id="addRecord" onclick="javascript:addNewRecord();">
        <input type="button" class="btn" name="deleteRecord" value="Delete Record" id="deleteRecord" onclick="javascript:deleteRecordFromDB();">

      </form>
    </div>

    <div >
      <form action="secureAdmin.php" method="post" id="newRecordFields">
        <h2><?=$record?></h2>
      </form>
    </div>

    <div class="table container">
        <table>
          <?=$result ?>
        </table>
    </div>

    <script type="text/javascript">
    function Deleteqry(id){
      if(confirm("Are you sure you want to delete this row?")==true)
               window.location="secureAdmin.php?del="+id;
        return false;
    }

    function addNewRecord(){
      var content = document.getElementById('newRecordFields').innerHTML;
      content = "<input class=\"inputText\" type=\"text\" name=\"addTitle\" placeholder=\"Enter Title\" required><br>";
      content += "<input class=\"inputText\" type=\"text\" name=\"addAuthor\" placeholder=\"Enter Author\" required><br>";
      content += "<input class=\"inputText\" type=\"number\" name=\"addPages\" placeholder=\"Enter Pages\" required><br>";
      content += "<input class=\"inputText\" type=\"number\" name=\"addPrice\" placeholder=\"Enter Price\" required><br>";
      content += "<input type=\"submit\" name=\"addRecord\" class=\"btn\" value=\"Add to Database\"><br>";

      document.getElementById('newRecordFields').innerHTML+=content;

    }
    function deleteRecordFromDB(){
      var content = document.getElementById('newRecordFields').innerHTML;
      content = "<input class=\"inputText\" type=\"text\" name=\"deleteTitle\" placeholder=\"Enter Title to Delete\" required><br>";
      content += "<input type=\"submit\" name=\"deleteRecord\" class=\"btn\" value=\"Delete from Database\"><br>";

      document.getElementById('newRecordFields').innerHTML+=content;

    }
    function removeTable(){
      document.querySelector('.table table').innerHTML="";
      document.querySelector('#removeTable').remove();

    }
    </script>





    <!--=====================FOOTER PART=========================-->

    <footer>
      <p>&copy; Copyright 2016, Library Catalogue</p>
    </footer>
    <!--=====================FOOTER PART=========================-->





</body>

</html>
