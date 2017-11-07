<?php
include "topinclude.php";
require 'connect.php';
echo "<h1>Bevestig gegevens</h1>";
$naam = $_SESSION["naam"];
$mysql = @mysqli_connect('localhost', 'root', '', 'reisbureau');
$sql 	= "SELECT `Naam_reis`,`Prijs`,Prijs_per_nacht FROM `reizen` WHERE Naam_reis = '$naam'";
$query 	= mysqli_query($mysql, $sql);

while ($row = mysqli_fetch_array($query))
{
  echo '<td><form action="betalen2.php" method="post"></td>';
  echo "<table border = 1>";
  echo "<tr>";
	echo "<td>Naam Reis</td>";
  echo "<td>".$row['Naam_reis']."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>Aankomst Datum (dd-mm-yyyy)</td>";
  echo "<td><input type='text' name='aankomst'><br></td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>Vertrek Datum (dd-mm-yyyy)</td>";
  echo "<td><input type='text' name='vertrek'><br></td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>Aantal Personen</td>";
  echo "<td><input type='text' name='personen'><br></td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>Betalings Methode</td>";
  echo '<td><form method ="POST" action="betalen2.php" ><select name ="betaling">
        <option value =""></option>
        <option value="IDEAL">IDEAL</option>
        <option value="PayPAL">PayPal</option>
        </select></form></td>';
  echo "</tr>";
  echo "</table>";
  echo "<br />";
  echo "<table>";
  echo '<td><button type="submit" name="naam" >Bevestig gegevens</button>
        </form><center></td>';
  echo "</table>";

}
if (isset($_POST['submit'])){
checkdate($_POST['aankomst']);
checkdate($_POST['vertrek']);
}

include "botinclude.php";
mysqli_close ($mysql);
?>
