<?php include "topinclude.php"; ?>
<div class="content-form2">
    <div class="form2">
	<h2> Persoonlijke gegevens </h2>
     
		 <?php
		 
		     if (isset($_POST['submit'])) {
				require 'connect.php';
				$Email = $_SESSION['Email'];
				$string = "UPDATE gebruikers SET
				Voornaam='".$_POST['Voornaam']."',
				Achternaam='".$_POST['Achternaam']."',
				Geboortedatum='".$_POST['Geboortedatum']."',
				Staat_huisnummer='".$_POST['Staat_huisnummer']."',
				Postcode='".$_POST['Postcode']."',
				Woonplaats='".$_POST['Woonplaats']."'
				WHERE Email='$Email'";
					if(mysqli_query($DBConnect, $string)){
						echo "<h3>Gegevens zijn succesvol gewijzigd</h3>";
					} 
						else {
							echo "Er is iets mis gegaan.";
						}
			}
			if (isset($_SESSION['Email'])){
                $email = $_SESSION['Email'];
                $usertype = "SELECT * FROM gebruikers WHERE Email='$email'";
                $Rol = mysqli_query($DBConnect,$usertype);
                $row = mysqli_fetch_assoc($Rol);
				$voornaam = $row["Voornaam"];
				$achternaam = $row["Achternaam"];				
				$email = $row["Email"];				
				$geboortedatum = $row["Geboortedatum"];
				$staat_huisnummer = $row["Staat_huisnummer"];
				$postcode = $row["Postcode"];
				$woonplaats = $row["Woonplaats"];

				
			echo "<form action='' method='POST'> ";
			echo "<input type='text' name='Voornaam' value='". $voornaam."'><br>";
            echo "<input type='text' name='Achternaam' value='". $achternaam."'><br>";
            echo "<input type='text' name='Geboortedatum' value='". $geboortedatum."'><br>";
            echo "<input type='text' name='Staat_huisnummer' value='". $staat_huisnummer."'><br>";
			echo "<input type='text' name='Postcode' value='". $postcode."'><br>";
            echo "<input type='text' name='Woonplaats' value='". $woonplaats."'><br>";
            echo "<button class= 'submit' type='submit' name='submit'>Wijzigen</button>";
			echo '</form>';

			}
    ?>
    </div>
	</div>
<?php include "botinclude.php"; ?>