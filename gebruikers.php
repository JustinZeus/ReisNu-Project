<?php include "topinclude.php"; ?>
<div class="content-usertable">
    <div class="usertable">
	<h2> Alle gebruikers </h2>
     
<?php
		require 'connect.php';
		$query = "SELECT * FROM gebruikers";
		$result = mysqli_query($DBConnect, $query);
		if (mysqli_num_rows($result)>0){
			$r = mysqli_fetch_array($result,MYSQL_ASSOC);
				 $table="<table><tr>";
				 $firstLine="<tr>";
				 foreach ($r as $k => $v){
				   $table .="<td>".$k."</td>";
				   $firstLine .="<td>".$v."</td>";
				 }
				 $table.="</tr>".$firstLine."<td>deleteknop</td></tr>";
				 while($r = mysqli_fetch_array($result,MYSQL_ASSOC)){
				   $table.="<tr>";
				   foreach($r as $k => $v)
					 $table.="<td>".$v."</td>";
					 $table .="<td>deleteknop</td>";
				   $table.="</tr>";
				 }
				  $table .="</table>";
				 echo $table;
}
?>
	 
    </div>
	</div>
<?php include "botinclude.php"; ?>




