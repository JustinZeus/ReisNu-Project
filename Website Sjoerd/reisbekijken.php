<?php
session_start();
$naam = $_POST['naam'];
$_SESSION["naam"] = $naam;
$mysql = @mysqli_connect('localhost', 'root', '', 'reisbureau');
$sql 	= "SELECT `Naam_reis`,`Prijs`,`Beschrijving` FROM `reizen` WHERE Naam_reis = '$naam'";
$query 	= mysqli_query($mysql, $sql);

echo "<h1>Gekozen reis</h1>";
echo "<table border = 1>";
while ($row = mysqli_fetch_array($query))
{
  echo "<table border = 1>";
  echo "<tr>";
  echo "<td rowspan='3'>image</td>";
	echo "<td colspan='3'>".$row['Naam_reis']."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td rowspan='2'>".$row['Beschrijving']."</td>";
  echo "<td colspan='2'></td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>".$row['Prijs']."</td>";
  echo '<td><form action="betalen.php" method="post">
        <button type="submit" name="naam" value="$naam">Betalen</button>
        </form><center></td>';
  echo "</table>";

}
mysqli_close ($mysql);
?>
