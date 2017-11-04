<?php
$naam = $_POST['naam'];
$mysql = @mysqli_connect('localhost', 'root', '', 'reisbureau');
$sql 	= "SELECT `Naam_reis`,`Prijs`,`Beschrijving` FROM `reizen` WHERE Naam_reis = '$naam'";
$query 	= mysqli_query($mysql, $sql);

echo "<h1>Kies een reis</h1>";
echo "<table border = 1>";
while ($row = mysqli_fetch_array($query))
{
  echo "<table border = 1>";
  echo "<tr>";
	echo "<td>".$row['Naam_reis']."</td>";
  echo "<td>".$row['Prijs']."</td>";
  echo "<td>".$row['Beschrijving']."</td>";
  echo "</tr>";
  echo "</table>";
  echo "<br />";
  echo "<table>";
  echo '<td><form action="betalen.php" method="post">
    <button type="submit" name="naam" value="'$reis'">Betalen</button>
</form><center></td>';
echo "</table>";
}
?>
