<?php include "topinclude.php"; ?>
<div class="content-form">
    <div class="form">
	<h2> Inloggen </h2>
        <form action="#" method="post">
			<input type="text" placeholder="email address" name="Email"/>
			<input type="password" placeholder="password" name="Wachtwoord"/>
            <button class="submit" type="submit" name="sub">Inloggen</button>
        </form>
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
   
</div>
<?php include "botinclude.php"; ?>