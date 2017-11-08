<?php include "topinclude.php"; ?>
<div class="content-form2">
    <div class="form2">
    <h2> Reis toevoegen </h2>
	 <?PHP
    if (isset($_POST["submit"]))
    {
        if (empty($_POST["Naam_reis"]) || empty($_POST["Vervoer"]) || empty($_POST["Prijs"]) || empty($_POST["Beschrijving"]))
        {
            echo "U bent iets vergeten in te vullen.";
        } 
		
		else {  
            require 'connect.php';
            $naam_reis = $_POST["Naam_reis"];
            $vervoer = $_POST["Vervoer"];
            $prijs = $_POST["Prijs"];
            $accomodatie_ID = $_POST['Accomodatie_ID'];
            $beschrijving = $_POST["Beschrijving"];
            $string = "INSERT INTO reizen (Naam_reis, Accomodatie_ID, Vervoer, Prijs, Beschrijving) VALUES ('$naam_reis','$accomodatie_ID','$vervoer','$prijs','$beschrijving')";
            
                mysqli_query($DBConnect, $string);
                echo "Reis succesvol toegevoegd";
            }
        }
    
    
    if (isset($_POST["submit1"]))
    {
        if (empty($_POST["Plaats"]) || empty($_POST["Adres"]) || empty($_POST["Postcode"]) || empty($_POST["Naam"]))
        {
            echo "U bent iets vergeten in te vullen.";
        } else
        {
          require 'connect.php';
                         $plaats = $_POST["Plaats"];
                         $adres = $_POST["Adres"];
                         $postcode = $_POST["Postcode"];
                         $naam = $_POST["Naam"];
                         $string = "INSERT INTO accomodatie (Plaats, Adres, Postcode, Naam) VALUES ('$plaats','$adres','$postcode','$naam')";
                         { mysqli_query($DBConnect, $string);
                     echo "Accomodatie succesvol toegevoegd";
                 }
             }
         }
    
    ?>
		

        <form  enctype="multipart/form-data" action="reis_toevoegen.php" method="post">

            <label class="formlabel">Naam reis: </label><input type="text" name="Naam_reis"><br>
			<label class="formlabel">Accomodatie ID:<br /></label>
		    <select input type ="text" name ="Accomodatie_ID" >
			<?php
					require 'connect.php';
					$queryID = "SELECT Plaats, Accomodatie_ID FROM `accomodatie` ";
					$db = mysqli_query($DBConnect, $queryID);
					while ( $d=mysqli_fetch_assoc($db)) {
					echo "<option value='".$d['Accomodatie_ID']."'>". $d['Plaats']. "</option>";    }
			?>
			</select>
			<br>
            <label class="formlabel">Vervoer: </label><input type="text" name="Vervoer"<br>
            <label class="formlabel">Prijs: </label><input type="text" name="Prijs"><br>
            <label class="formlabel">Beschrijving:</label> <input type="textarea" name="Beschrijving"><br>
            <button class= "submit" type="submit" name="submit">Toevoegen</button>

        </form>
        <h2> Accomodatie toevoegen </h2>
        <form  enctype="multipart/form-data" action="reis_toevoegen.php" method="post">
            <label class="formlabel">Plaats: </label><input type="text" name="Plaats"><br>
            <label class="formlabel">Adres: </label><input type="text" name="Adres"><br>
            <label class="formlabel">Postcode:</label> <input type="text" name="Postcode"><br>
            <label class="formlabel">Naam: </label><input type="text" name="Naam"<br>
			<button class= "submit" type="submit" name="submit1">Toevoegen</button>

        </form>
    </div>
   
</div>
<?php include "botinclude.php"; ?>