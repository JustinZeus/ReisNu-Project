<?php
include "topinclude.php";
require 'connect.php';
$naam = $_POST['naam'];
$_SESSION["naam"] = $naam;
$mysql = @mysqli_connect('localhost', 'root', '', 'reisbureau');
$sql 	= "SELECT `Naam_reis`,`Prijs`,`Beschrijving`,`Image`,`Plaats`,`Adres`,`Postcode`,`Naam` FROM `reizen`,`accomodatie` WHERE Naam_reis = '$naam' AND reizen.Accomodatie_ID = accomodatie.Accomodatie_ID";
$query 	= mysqli_query($mysql, $sql);


echo "<table border = 1>";
while ($row = mysqli_fetch_array($query))
{
  echo "<h1>".$row['Naam_reis']."</h1>";
  echo "<table>";
  echo "<tr>";
  echo "<td><img src=\"".$row['Image']."\" width=\"1000\"></td>";
  echo "</tr>";
  echo "</table>";
  echo "<table>";
  echo "<tr>";
  echo "<td> Plaats</td>";
  echo "<td>".$row['Plaats']."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>Adres</td>";
  echo "<td>".$row['Adres']."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td> Postcode</td>";
  echo "<td>".$row['Postcode']."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td> Naam Accomodatie</td>";
  echo "<td>".$row['Naam']."</td>";
  echo "</tr>";
  echo "</table>";
  echo "<table>";
  echo "<tr>";
  echo "<td>".$row['Beschrijving']."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>".$row['Prijs']."</td>";
  echo '<td><form action="betalen1.php" method="post">
        <button type="submit" name="naam" value="$naam">Boek deze Reis</button>
        </form><center></td>';
  echo "</table>";
}
include "botinclude.php";
mysqli_close ($mysql);
?>
