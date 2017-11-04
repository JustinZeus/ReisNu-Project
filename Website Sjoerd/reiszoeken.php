<?php
$mysql = @mysqli_connect('localhost', 'root', '', 'reisbureau');
$sql 	= "SELECT `Naam_reis`,`Prijs`,`Beschrijving` FROM `reizen`";
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
  echo "<table>";
  echo '<td><form action="reisbekijken.php" method="post">
    <button type="submit" name="naam" value="'.$row['Naam_reis'].'">Kies</button>
</form><center></td>';
echo "</table>";
  echo "<br />";
}
?>
