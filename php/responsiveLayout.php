<?php

function responsiveHeader()
{
    include '../config/constants.php';
    
    echo "<div class ='navbar'>";
    echo "<a href='index.html'><img src = 'images/visitKL.png' class ='logo' alt='homeIcon'></a>";
    echo "<nav id='navheader' class='nav-header'>";
    echo "<ul>";
    echo "<li><a href='fungame.html'>Fun Activity & Games</a></li>";
    echo "<li><a href='destinations.html'>Place To Visit</a></li>";
    echo "<li><a href='#'>Plan Your Trip</a></li>";
    echo "</ul>";
    echo "</nav>";
    echo "<img src = 'images/menu.png' class = 'menu-icon' alt='menuIcon'>";
    echo "</div>";
}

function responsiveFooter()
{
    echo "<footer class='footer'>";
    echo "<a href='index.html'><img src = 'images/visitKL.png' class='footer-img' alt='homeIcon'></a>";
    echo "<p class='footer-text'>Copyright &copy; Visit Kuala Lumpur 2021</p>";
    echo "<p class='footer-text'>Made by courtesy of The Group of Life - Web Development Assignment</p>";
    echo "</footer>";
}
?>


