<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Reisbureau</title>
        <link rel="stylesheet" type="text/css" href="css.css"> 
        <link rel="icon" href="logo/knipsel.png" type="image/x-icon"/>
    </head>
    <body>
        <div class="container">
            <div class="welcome">
                <?php
            if (isset($_SESSION['Email']))
                    {
                        require 'connect.php';

                        echo "Welkom {$_SESSION['Email']}!";
                    }    
                ?>
            </div>
            <div class="header">

            </div>
            <div class="nav">
                <?php
                echo "<br><ul>";
                echo "<li class='ok'><a href='signup.php' class='are'>Registreren </a></li>";
                echo "<li class='ok'><a href='logout.php' class='are'>Uitloggen </a> </li>";
                echo "<li class='ok'><a href='login.php' class='are'>Inloggen </a> </li>";
                
                echo "<li><a href='index.php' class='are'>Home</a></li>";
                echo "<li><a href='stedentrips.php' class='are'>Stedentrips</a></li>";
                echo "<li><a href='about.php' class='are'>About</a></li></ul>";
                ?>
            </div>

            <div class="clear"></div>
            