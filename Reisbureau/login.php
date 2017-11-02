<?php include "topinclude.php"; ?>
<div class="inhoud">
    <div class="box1">
        <form action="#" method="post">
            <label class="formlabel">E-mailadres: </label><input type="text" name="Email"><br>
            <label class="formlabel">Wachtwoord: </label><input type="password" name="Wachtwoord"><br>
            <input class="submit" type="submit" name="sub">

        </form>
    </div>
    <?php

    function better_crypt($input)
    {
        return $password = sha1(md5($input));
     }

    if (isset($_POST["sub"]))
    {
        require "connect.php";

        if (empty($_POST["Email"]) || empty($_POST["Wachtwoord"]))
        {
            echo "E-mailadres of wachtwoord vergeten in te vullen.";
        } else
        {
            $Email = $_POST["Email"];
            $password = $_POST["Wachtwoord"];
            $password_crypt = better_crypt($password);
            $string = "SELECT Email, Wachtwoord FROM gebruikers WHERE Email = '$Email'";
            $result = mysqli_query($DBConnect, $string);
            $count = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);
            $password_get = $row['Wachtwoord'];
            if ($count == 1 && ($password_get == $password))
            {
                $_SESSION['Email'] = $Email;
                header("location: index.php");
            } else
            {
                echo "Verkeerde gebruikersnaam of wachtwoord.";
            }
        }
    }
    ?>
</div>
<?php include "botinclude.php"; ?>
