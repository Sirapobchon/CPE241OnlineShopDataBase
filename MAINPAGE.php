<?php

$conn = mysqli_connect("localhost","root","","pstudio8");

// Check connection
if (!$conn) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//echo "Connected successfully";
?>
<!DOCTYPE html>
<html>
<head>
    <title>STUDIO8_Homepage</title>
    <link rel="stylesheet" href="MAINpage.css">
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <a href="#" target="_blank"><img src="LOGO_STUDIO8.svg" class="logo_MAIN"></a>
            <form action="" class="search-btn">
                <input type="text" placeholder="Search Here!" name="q">
                <button type="submit"><img src="icon/searchIcon.png"></button>
            </form>
            <ul>
                <li><a href="#" class = "navbarTabFont">Overview</a></li>
                <li><a href="#" class = "navbarTabFont">About</a></li>
                <li><a href="#" class = "navbarTabFont">Contract us</a></li>
                <a href="#"><img src="icon/CartIcon.png" class="navbarIcon"></a>
                <a href="MAINselect.php" target="_blank"><img src="icon/SignIcon.png" class="navbarIcon"></a>
            </ul>
        </div>
        <div class="btn_accessories">
            <a href="#" class = "btn">View more accessories</a>
            <a href="#" class = "btn-nonline"> ></a>
        </div>
        <div class="Social">
            <a href="#" target="_blank"><img src="icon/IGIcon.png" class="SocialIcon"></a>
            <a href="#" target="_blank"><img src="icon/WhatAppIcon.png" class="SocialIcon"></a>
            <a href="#" target="_blank"><img src="icon/FBIcon.png" class="SocialIcon"></a>
        </div>
    </div>
</body>
</html>