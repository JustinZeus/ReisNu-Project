<?php include "topinclude.php"; ?>
<div class="container">
    <?php
    require 'connect.php';
    $random = rand(200000,200009);
    $sql = "SELECT `Naam_reis`,`Beschrijving`,`Image`FROM `reizen` WHERE Reis_ID = $random";
    $query 	= mysqli_query($DBConnect, $sql);
echo "<h2>Is dit jouw volgende reis?</h2>";
while ($row = mysqli_fetch_array($query))
{
  echo "<table border = 1>";
  echo "<h3>".$row['Naam_reis']."</h3>";
  echo "<table>";
  echo "<tr>";
  echo "<td><img src=\"".$row['Image']."\" width=\"450\"></td>";
  echo "</tr>";
  echo "</table>";
  echo "<table>";
  echo "<tr>";
  echo "<td>".$row['Beschrijving']."</td>";
  echo "</tr>";
  echo "</table>";
  echo "<br />";
}
    ?>
</div>
<?php include "botinclude.php"; ?>