<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ReisNU</title>
        <link rel="stylesheet" type="text/css" href="/source/style.css"> 
		<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
		<link rel="manifest" href="favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
    </head>
	
<body>
	<div id="wrapper">
	
		<div class="welcome">
                <?php
            if (isset($_SESSION['Email']))
                    {
                        require 'connect.php';

                        echo "<p>Ingelogd als {$_SESSION['Email']}<p>";
                    }    
                ?>
        </div>
		
		<div id="header">
			<div class="logo">
				<a href="index.php"><img src="/source/logo1.png"/></a>
			</div>
			</div>
			<div id="menubalk">
			
			<?php
                if (isset($_SESSION['Email'])){
                $email = $_SESSION['Email'];
                $usertype = "SELECT * FROM gebruikers WHERE Email='$email'";
                $Rol = mysqli_query($DBConnect,$usertype);
                $row = mysqli_fetch_assoc($Rol);
				$voornaam = $row["Voornaam"];
                if ($row["Rol"] == 'Admin')
                {
echo 			"<ul id='menu'>";
echo				"<li><a href='index.php'>Home</a></li>";
echo				"<li><a href='/stedentrips'>Stedentrips</a></li>";
echo				"<li><a href='/about'>About</a></li>";

echo				"<li style='float: right; width: 250px;'><a href='#'>"."Ingelogd als ". "$voornaam". "</a>";
echo					"<ul>";
echo						"<li class='dropdown' style='width: 250px;'><a href='gegevenswijzigen.php'>Gegevens wijzigen </a> </li>";
echo						"<li class='dropdown' style='width: 250px;'><a href='wachtwoordwijzigen.php'>Wachtwoord wijzigen </a> </li>";
echo						"<li class='dropdown' style='width: 250px;'><a href='reis_toevoegen.php'>Reis toevoegen</a> </li>	";
echo						"<li class='dropdown' style='width: 250px;'><a href='logout.php'>Uitloggen </a> </li>	";
echo					"</ul>";
echo				"</li>";
echo			"</ul>";
								
                } 
				else if($row["Rol"] == 'Gebruiker')
                {
				echo 			"<ul id='menu'>";
echo				"<li><a class='active' href='index.php'>Home</a></li>";
echo				"<li><a href='/stedentrips'>Stedentrips</a></li>";
echo				"<li><a href='/about'>About</a></li>";

echo				"<li style='float: right; width: 250px;'><a href='#'>"."Ingelogd als ". "$voornaam". "</a>";
echo					"<ul>";
echo						"<li class='dropdown' style='width: 250px;'><a href='gegevenswijzigen.php'>Gegevens wijzigen </a> </li>";
echo						"<li class='dropdown' style='width: 250px;'><a href='wachtwoordwijzigen.php'>Wachtwoord wijzigen </a> </li>";
echo						"<li class='dropdown' style='width: 250px;'><a href='logout.php'>Uitloggen </a> </li>	";
echo					"</ul>";
echo				"</li>";
echo			"</ul>";	
                }
                }
                else{
					echo 			"<ul id='menu'>";
echo				"<li><a class='active' href='index.php'>Home</a></li>";
echo				"<li><a href='/stedentrips'>Stedentrips</a></li>";
echo				"<li><a href='/about'>About</a></li>";

echo				"<li style='float: right;'><a href='registreren.php'>Registreren</a>";"</li>";
echo				"<li style='float: right;'><a href='login.php'>Inloggen</a>";"</li>";

echo			"</ul>";

                }
                ?>
			</div>
			 <div class="clear"></div>
	