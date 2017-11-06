<?php include "topinclude.php"; ?>
<div class="inhoud">
    <div class="box">
        <form  enctype="multipart/form-data" action="reis_toevoegen.php" method="post">
            <label class="formlabel">Reis_ID: </label><input type="text" name="Reis_ID"><br>
            <label class="formlabel">Naam_reis:: </label><input type="text" name="Naam_reis"><br>
            <label class="formlabel">Accomodatie_ID:</label> <input type="text" name="Accomodatie_ID"><br>
            <label class="formlabel">Vervoer: </label><input type="text" name="Vervoer"<br>
            <label class="formlabel">Prijs: </label><input type="text" name="Prijs"><br>
            <label class="formlabel">Beschrijving:</label> <input type="textarea" name="Beschrijving"><br>
            <input class= "submit" type="submit" name="submit">

        </form>
    </div>
    <?PHP

    <?php
   if (isset($_POST["submit"]))
   {
       if (empty($_POST["Reis_ID"]) || empty($_POST["Naam_reis"]) || empty($_POST["Accomodatie_ID"]) || empty($_POST["Vervoer"]) || empty($_POST["Prijs"]) || empty($_POST["Beschrijving"]))
       {
           echo "U bent iets vergeten in te vullen.";
       } else
       {


         require 'connect.php';
                        $reis_id = $_POST["Reis_ID"];
                        $naam_reis = $_POST["Naam_reis"];
                        $accomodatie_id = $_POST["Accomodatie_ID"];
                        $vervoer = $_POST["Vervoer"];
                        $prijs = $_POST["Prijs"];
                        $beschrijving = $_POST["Beschrijving"];
                        $string = "INSERT INTO reizen (Reis_ID, Naam_reis, Accomodatie_ID, Vervoer, Prijs, Beschrijving) VALUES ('$reis_id','$naam_reis','$accomodatie_id','$vervoer','$prijs','$beschrijving')";
                        { mysqli_query($DBConnect, $string);
                    echo "Reis succesvol toegevoegd";
                }
            }
        }
    }
    ?>
</div>
<?php include "botinclude.php"; ?>
