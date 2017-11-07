<?php
include "topinclude.php";
 ?>

<div id="">
<form action="#" method="post">
  <label> <b>Landen</b> </label><br>
    <input type="checkbox" name="Landen[]" value="Dominicaanse Republiek"> Dominicaanse Republiek<br>
    <input type="checkbox" name="Landen[]" value="Dubai" > Dubai<br>
    <input type="checkbox" name="Landen[]" value="Egypte"> Egypte<br>
    <input type="checkbox" name="Landen[]" value="Frankrijk" > Frankrijk<br>
    <input type="checkbox" name="Landen[]" value="Italie"> Italie<br>
    <input type="checkbox" name="Landen[]" value="Mexico"> Mexico<br>
    <input type="checkbox" name="Landen[]" value="Oostenrijk"> Oostenrijk<br>
    <input type="checkbox" name="Landen[]" value="Spanje"> Spanje<br>
    <input type="checkbox" name="Landen[]" value="Sri Lanka"> Sri Lanka<br><br>

  <label> <b>Reisperiode</b><br> Zoeken op exacte datum.<br>
    <input type="text" name= "aankomst" placeholder="Aankomst Datum" ><br>
    <input type="text" name= "vertrek" placeholder="Vertrek Datum" ><br><br>

  <label> <b>Vervoer</b></label><br>
    <input type="checkbox" name="Vervoer[]" value="Vliegtuig"> Vliegtuig<br>
    <input type="checkbox" name="Vervoer[]" value="Eigen Vervoer"> Eigen Vervoer<br><br>

  <label> <b>Prijs</b></label><br>
    <input type="text" name= "prijslaag" placeholder="Vanaf Prijs" ><br>
    <input type="text" name= "prijshoog" placeholder="Tot Prijs" ><br><br>
    <input type="submit" name="submit" Value="Submit"/>
</form>
</div>
<div id="">
 <?php
 // Voor label Landen
if(isset($_POST['submit'])) {
if(!empty($_POST['Landen'])) {

$checked_count = count($_POST['Landen']);
echo "You have selected following ".$checked_count." option(s): <br/>";

foreach($_POST['Landen'] as $selected) {
echo "<p>".$selected ."</p>";
$landen =array($selected);
}
}
}
// Voor label reisperiode




// Voor label vervoer
if(isset($_POST['submit'])) {
if(!empty($_POST['Vervoer'])) {

$checked_count2 = count($_POST['Vervoer']);
echo "You have selected following ".$checked_count2." option(s): <br/>";
if ($checked_count2==1) {
  foreach($_POST['Vervoer'] as $selected2) {
  echo "<p>".$selected2 ."</p>";
  $vervoer = "Vervoer = $selected2";
}
}
}
}

// Voor label Prijs


// SQL deel
$mysql = @mysqli_connect('localhost', 'root', '', 'reisbureau');
$sql 	= "SELECT `Naam_reis`,`Prijs`,`Beschrijving`,`Image`,`Vervoer` FROM `reizen`";
$query 	= mysqli_query($mysql, $sql);


echo "<h1>Kies een reis</h1>";
while ($row = mysqli_fetch_array($query))
{
  echo "<table border = 1>";
  echo "<tr>";
  echo "<td rowspan='3'><img src=\"".$row['Image']."\" width=\"300\"></td>";
	echo "<td colspan='3'>".$row['Naam_reis']."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td rowspan='2'>".$row['Beschrijving']."</td>";
  echo "<td colspan='2'></td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>".$row['Prijs']."</td>";
  echo '<td><form action="reisbekijken.php" method="post">
    <button type="submit" name="naam" value="'.$row['Naam_reis'].'">Kies</button>
    </form><center></td>';
  echo "</tr>";
  echo "</table>";
}
echo "<br />";
 ?>
</div>
 <?php
include "botinclude.php";
mysqli_close ($mysql);
 ?>
