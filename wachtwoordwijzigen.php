<?php include "topinclude.php"; ?>
<div class="content-form2">
    <div class="form2">
	<h2> Persoonlijke gegevens </h2>
     
		 <?php
		 
		     if (isset($_POST['submit'])) {
			  if (strlen($_POST["Wachtwoord"]) < 8) {
                echo "<h3><center>Je wachtwoord moet minimaal 8 tekens bevatten.</h3></center>";
				} else
					if($_POST['Wachtwoord'] == $_POST['Wachtwoord1']){
							require 'connect.php';
							$email = $_SESSION['Email'];
							$usertype = "SELECT * FROM gebruikers WHERE Email='$email'";
							$Rol = mysqli_query($DBConnect,$usertype);
							$row = mysqli_fetch_assoc($Rol);
							$Wachtwoord_oud = $row["Wachtwoord"];
							$Wachtwoord_oud1 = $_POST['Wachtwoord_oud'];
							$Email = $_SESSION['Email'];
							$string = "UPDATE gebruikers SET
							Wachtwoord='".$_POST['Wachtwoord']."'
							WHERE Email='$Email'";
							
							if ($Wachtwoord_oud == $Wachtwoord_oud1){
									if(mysqli_query($DBConnect, $string)){
									echo "<h3>Uw wachtwoord is succesvol gewijzigd</h3>";
							}}
								else {
										echo "<h3>Uw oude wachtwoord is onjuist ingevoerd.</h3>";
										}
					}
				else {
				echo "<h3>De wachtwoorden komen niet overeen.</h3>";
			 }
			 }	
			 		 
			
			if (isset($_SESSION['Email'])){
                $email = $_SESSION['Email'];
                $usertype = "SELECT * FROM gebruikers WHERE Email='$email'";
                $Rol = mysqli_query($DBConnect,$usertype);
                $row = mysqli_fetch_assoc($Rol);
				$Wachtwoord_oud = $row["Wachtwoord"];

				
			echo "<form action='' method='POST'> ";
			echo "<h3>Uw oude wachtwoord</h3>";
			echo "<input type='password' name='Wachtwoord_oud' value=''><br>";
			echo "<h3>Uw nieuwe wachtwoord</h3>";
			echo "<input type='password' name='Wachtwoord' value=''><br>";
			echo "<h3>Wachtwoord herhalen</h3>";
            echo "<input type='password' name='Wachtwoord1' value=''><br>";
            echo "<button class= 'submit' type='submit' name='submit'>Wijzigen</button>";
			echo '</form>';
			}
    ?>
    </div>
	</div>
<?php include "botinclude.php"; ?>