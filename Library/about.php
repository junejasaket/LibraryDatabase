<?php
session_start();
 ?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Library search</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<style media="screen">
  header h1{
    font-size: 45px;
    text-decoration: none;
    font-weight: normal;
    color: #FFFFFF;
    margin-top: 3%;
    position: absolute;
    top: 6%;
  }

  #h2header{
    font-size: 45px;
    text-decoration: none;
    font-weight: normal;
    color: #FFFFFF;
    margin-top: 17%;
    position: absolute;
    top: 6%;
    left: 70%;
  }
</style>

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
    <div class="banner">
        <img src="images/library.jpg" alt="Library Image">
        <header class="container">
            <h1>Library Database</h1>
            <h2 id="h2header">About</h2>
        </header>
        <!--=====================HEADER=========================-->
        <div class="aboutPage container">
            <p>This is a Library Database containing over a 1000 books, this website features separate login systems for the public and the admin. People can search for books, the admin can delete and create and add new books.</p>

        </div>
    </div>



    <!--=====================FOOTER PART=========================-->

    <footer>
        <p>&copy; Copyright 2016, Library Catalogue</p>
    </footer>
    <!--=====================FOOTER PART=========================-->

</body>

</html>
