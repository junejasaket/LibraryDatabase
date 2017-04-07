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
            <h1>Contact us:</h1>
            <h2>Email</h2>
        </header>
        <!--=====================HEADER=========================-->
        <div class="contactPage container">
            <h2>Juneja.saket@gmail.com</h2>
            <h2>junejasa@sheridancollege.ca</h2>
        </div>



    <!--=====================FOOTER PART=========================-->

    <footer>
        <p>&copy; Copyright 2016, Library Catalogue</p>
    </footer>
    <!--=====================FOOTER PART=========================-->

</body>

</html>
