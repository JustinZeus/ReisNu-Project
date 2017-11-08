<?php include "topinclude.php"; ?>
<div class="content-form2">
    <div class="form2">
	<h2> Registreren </h2>
        <form  enctype="multipart/form-data" action="signUp.php" method="post">
			<input type="text" placeholder="Voornaam" name="Voornaam"><br>
            <input type="text" placeholder="Achternaam" name="Achternaam"><br>
			<input type="text" placeholder="E-mailadres" name="Email"><br>
            <input type="text" placeholder="Geboortedatum"name="Geboortedatum"<br>
            <input type="text" placeholder="Straat en huisnummer" name="Staat_huisnummer"><br>
            <input type="text" placeholder="Postcode" name="Postcode"><br>
            <input type="text" placeholder="Woonplaats" name="Woonplaats"><br>
			<input type="password" placeholder="Wachtwoord" name="Wachtwoord"><br>
			<input type="password" placeholder="Wachtwoord herhalen" name="Wachtwoord1"><br>
            <button class= "submit" type="submit" name="submit">Registreren</button>

        </form>
    <?PHP

    // Original PHP code by Chirp Internet: www.chirp.com.au
    // Please acknowledge use of this code by including this header.

    function better_crypt($input, $rounds = 7)
    {
        $salt = "";
        $salt_chars = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
        for ($i = 0; $i < 22; $i++)
        {
            $salt .= $salt_chars[array_rand($salt_chars)];
        }
        return crypt($input, sprintf('$2a$%02d$', $rounds) . $salt);
    }
    ?>
    <?php
    if (isset($_POST["submit"]))
    {
        if (empty($_POST["Voornaam"]) || empty($_POST["Achternaam"]) || empty($_POST["Staat_huisnummer"]) || empty($_POST["Email"]) || empty($_POST["Woonplaats"]) || empty($_POST["Geboortedatum"]) || empty($_POST["Wachtwoord"]) || empty($_POST["Wachtwoord1"]))
        {
            echo "<h3><center>U bent iets vergeten in te vullen.</h3></center>";
        } else
        {
            if (strlen($_POST["Wachtwoord"]) < 8)
            {
                echo "<h3><center>Je wachtwoord moet minimaal 8 tekens bevatten.</h3></center>";
            } elseif (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL))
            {
                echo "<h3><center>Dit is geen geldig e-mail adres.</h3></center>";
            } elseif($_POST['Wachtwoord'] != $_POST['Wachtwoord1']){
                echo "<h3><center>Wachtwoorden komen niet overeen.</h3></center>";
            } else
            {

                require 'connect.php';
                $email = $_POST["Email"];
                $voornaam = $_POST["Voornaam"];
                $achternaam = $_POST["Achternaam"];
                $woonplaats = $_POST["Woonplaats"];
                $huisnummer = $_POST["Staat_huisnummer"];
                $postcode = $_POST["Postcode"];
                $dob = $_POST["Geboortedatum"];
                $password = $_POST["Wachtwoord"];
                $password_crypt = better_crypt($password);
                $string = "INSERT INTO gebruikers (Email, Achternaam, Voornaam, Staat_huisnummer, Woonplaats, Postcode, Geboortedatum, Wachtwoord) VALUES ('$email','$achternaam','$voornaam','$huisnummer','$woonplaats','$postcode','$dob','$password')";
                $stringuser = "SELECT Email FROM gebruikers WHERE Email = '$email'";
                $count = mysqli_query($DBConnect, $stringuser);
                if (mysqli_num_rows($count) == 1)
                {
                    echo "<h3><center>Dit e-mail adres is al in gebruik.</center></h3>";
                } else
                 
                {
                    mysqli_query($DBConnect, $string);
                    echo "<h3><center>Account is succesvol aangemaakt</center></h3>";
                }
            }
        }
    }
    ?>
	</div>
</div>
<?php include "botinclude.php"; ?>
