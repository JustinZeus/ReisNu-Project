<?php
include "topinclude.php";
require 'connect.php';
echo "<h1>Betalingsgegevens</h1>";
$naam = $_SESSION["naam"];
$email = $_SESSION["Email"];

$vertrek = $_POST["vertrek"];
$aankomst = $_POST["aankomst"];
$personen = $_POST["personen"] -1;
$methode = $_POST['betaling'];

$mysql = @mysqli_connect('localhost', 'root', '', 'reisbureau');
$sql 	= "SELECT `Reis_ID`,`Prijs`,`Prijs_per_nacht` FROM `reizen` WHERE Naam_reis = '$naam'";
$query 	= mysqli_query($mysql, $sql);

while ($row = mysqli_fetch_array($query))
{

  if (isset($_POST["personen"])){
    $prijsnacht = $row['Prijs_per_nacht'];
    $prijs = $row['Prijs'];
    $prijstotaal = ($personen*$prijsnacht)+$prijs;
  }

  echo "<table border = 1>";
  echo "<tr>";
	echo "<td>Naam Reis</td>";
  echo "<td>".$naam."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>Aankomst Datum (dd-mm-yyyy)</td>";
  echo "<td>".$aankomst."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>Vertrek Datum (dd-mm-yyyy)</td>";
  echo "<td>".$vertrek."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>Prijs</td>";
  echo "<td>".$prijstotaal."</td>";
  echo "</tr>";
  echo "</table>";
  echo "<br />";
  echo "<table>";
  echo '<td><form action="reiszoeken.php" method="post">
    <button type="submit" name="submit" >Voltooi Betaling</button>
</form><center></td>';
echo "</table>";

$reisID = $row['Reis_ID'];
}
$aankomst = date("Y-m-d", strtotime($aankomst));
$vertrek = date("Y-m-d", strtotime($vertrek));
$datum = date("Y-m-d");
$sql2 	= "INSERT INTO boekingen(Email, Reis_ID, Betalingsmethode, Datum, Aankomst_datum, Vertrek_datum, Aantal_personen, Prijs) VALUES ('$email','$reisID','$methode','$datum','$aankomst','$vertrek','$personen','$prijstotaal')";
mysqli_query($mysql, $sql2);

include "botinclude.php";
mysqli_close ($mysql);
?>
