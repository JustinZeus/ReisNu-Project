<?php
echo "<h1>Betalingsgegevens</h1>";
$naam = $_POST["naam"];
$vertrek = "18-10-2017";
$aankomst = "11-10-2017";
$mysql = @mysqli_connect('localhost', 'root', '', 'reisbureau');
$sql 	= "SELECT `Naam_reis`,`Prijs`,`Beschrijving` FROM `reizen` WHERE Naam_reis = '$naam'";
$query 	= mysqli_query($mysql, $sql);

while ($row = mysqli_fetch_array($query))
{
  echo "<table border = 1>";
  echo "<tr>";
	echo "<td>Naam Reis</td>";
  echo "<td>".$row['Naam_reis']."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>Aankomst Datum</td>";
  echo "<td>".$aankomst."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>Vertrek Datum</td>";
  echo "<td>".$vertrek."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>Prijs</td>";
  echo "<td>".$row['Prijs']."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>Betalings Methode</td>";
  echo "<td>" ?><select value = "Methode">
  <option value="IDEAL">IDEAL</option>
  <option value="PayPAL">PayPal</option>
</select><?php "</td>";
  echo "</tr>";
  echo "</table>";
  echo "<br />";
  echo "<table>";
  echo '<td><form action="reiszoeken.php" method="post">
    <button type="submit" name="naam" >Kies</button>
</form><center></td>';
echo "</table>";
}
?>
