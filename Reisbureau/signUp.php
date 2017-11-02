<?php include "topinclude.php"; ?>
<div class="inhoud">
    <div class="box">
        <form  enctype="multipart/form-data" action="signUp.php" method="post">
            <label class="formlabel">Voornaam: </label><input type="text" name="Voornaam"><br>
            <label class="formlabel">Achternaam:: </label><input type="text" name="Achternaam"><br>
            <label class="formlabel">E-mailadres:</label> <input type="text" name="Email"><br>
            <label class="formlabel">Geboortedatum: </label><input type="text" name="Geboortedatum"<br>
            <label class="formlabel">Straat & Huisnummer: </label><input type="text" name="Staat_huisnummer"><br>
            <label class="formlabel">Postcode:</label> <input type="text" name="Postcode"><br>
            <label class="formlabel">Plaats: </label><input type="text" name="Woonplaats"><br>
            <label class="formlabel">Wachtwoord: </label><input type="password" name="Wachtwoord"><br>
            <label class="formlabel">Bevestig wachtwoord: </label><input type="password" name="Wachtwoord1"><br>
            <input class= "submit" type="submit" name="submit">

        </form>
    </div>
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
            echo "U bent iets vergeten in te vullen.";
        } else
        {
            if (strlen($_POST["Wachtwoord"]) < 8)
            {
                echo "Je wachtwoord moet minimaal 8 tekens bevatten.";
            } elseif (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL))
            {
                echo "Dit is geen geldig e-mail adres.";
            } elseif($_POST['Wachtwoord'] != $_POST['Wachtwoord1']){
                echo "Wachtwoorden komen niet overeen.";
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
                $string = "INSERT INTO gebruikers (Email, Achternaam, Voornaam, Staat_huisnummer, Woonplaats, Postcode, Geboortedatum, Wachtwoord) VALUES ('$email','$achternaam','$voornaam','$huisnummer','$woonplaats','$postcode','$dob','$password_crypt')";
                $stringuser = "SELECT Email FROM gebruikers WHERE Email = '$email'";
                $count = mysqli_query($DBConnect, $stringuser);
                if (mysqli_num_rows($count) == 1)
                {
                    echo "Dit e-mail adres is al in gebruik.";
                } else
                 
                {
                    mysqli_query($DBConnect, $string);
                    echo "you have succesfully registered";
                }
            }
        }
    }
    ?>
</div>
<?php include "botinclude.php"; ?>
