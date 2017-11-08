      <?php
$id = $_GET['id'];
mysqli_query("DELETE from purchase WHERE id='$id'");
        ?>