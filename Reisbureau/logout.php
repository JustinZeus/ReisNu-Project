<?php include "topinclude.php"; ?>

<div class="inhoud">
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
