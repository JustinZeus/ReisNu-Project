<?php include "topinclude.php"; ?>
<div class="content-form2">
    <div class="form2">
	<h2> Reis zoeken </h2>
     
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
			echo "<td rowspan='2'>image</td>";
			echo "<td colspan='3'>".$row['Naam_reis']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>".$row['Beschrijving']."</td>";
			echo "<td>".$row['Prijs']."</td>";
			echo "<td><form action='reisbekijken.php' method='post'>";
			echo "<button type='submit' name='submit' value=" 	 .$row['Naam_reis']. ">Kies</button>";
			echo "</form><center></td>";
  echo "</tr>";
  echo "</table>";
}
?>
 
    </div>
	</div>
<?php include "botinclude.php"; ?>