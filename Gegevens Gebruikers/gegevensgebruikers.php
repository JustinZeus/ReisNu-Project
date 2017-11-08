<?php include "topinclude.php"; ?>
<div class="inhoud">

    <h2> Gegevens Gebruikers </h2>
    <TABLE BORDER = "3">
    <TR>
    <TH>Voornaam</TH><TH>Achternaam</TH><TH>E-mail Adres</TH><TH>Geboortedatum</TH><TH>Plaats</TH><TH>Postcode</TH><TH>Straat & Huisnummer</TH><TH>Wachtwoord</TH>
    </TR>
    </form>
</div>

<?php

     $DBConnect = mysqli_connect("127.0.0.1", "root", "", "reisbureau");
     if ($DBConnect === FALSE)
     {
         echo "<p>Unable to connect to the database server.</p>"
         . "<p>Error code " . mysqli_errno() . ": "
         . mysqli_error() . "</p>";
     }

$rs = mysqli_query($DBConnect,"SELECT * FROM gebruikers");

?>

    <?php
    if( $rs){

        while($row = mysqli_fetch_assoc($rs)){
          echo "<TR>";
          echo "<TD>" . $row['Voornaam'] . "</TD>";
          echo "<TD>" . $row['Achternaam'] . "</TD>";
          echo "<TD>" . $row['Email'] . "</TD>";
          echo "<TD>" . $row['Geboortedatum'] . "</TD>";
          echo "<TD>" . $row['Woonplaats'] . "</TD>";
          echo "<TD>" . $row['Postcode'] . "</TD>";
          echo "<TD>" . $row['Staat_huisnummer'] . "</TD>";
          echo "<TD>" . $row['Wachtwoord'] . "</TD>";
          echo "</TR>";

            }
        echo "</TABLE>";

    }else{
      echo '<p>';
      echo mysqli_error($db);
      echo '</p>';
    }
     ?>
  </div>

<?php include "botinclude.php";
  mysqli_close($DBConnect)
 ?>
