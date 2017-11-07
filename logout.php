<?php include "topinclude.php"; ?>
<head><meta http-equiv="refresh" content="5; url=/index.php" /></head>
<div class="container">
    <h2>Succesvol uitgelogd</h2>
	
	         <p>
			redirect
		 </p>
		 
	<?php 
if (isset($_SESSION["Email"])){
    session_destroy();
    header("Refresh:0");
    
}else{
   
    echo "Je bent succesvol uitgelogd.";
    
}
?>
</div>
<?php include "botinclude.php"; ?>