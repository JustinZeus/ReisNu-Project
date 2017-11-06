
<!--
Fekke Fekkes
2016
Stenden Hogeschool
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2> Edit a bug </h2>
        <form method="POST" action="">
            <?php
            if (isset($_POST['Submit'])) {


                $DBConnect = mysqli_connect("127.0.0.1", "root", "");
                if ($DBConnect === FALSE) {
                    echo "<p>Unable to connect to the database server.</p>"
                    . "<p>Error code " . mysqli_errno() . ": " . mysqli_error()
                    . "</p>";
                } else {
                    $DBName = "sdb";
                    if (!mysqli_select_db($DBConnect, $DBName)) {
                        echo "<p>Can't select database!</p>";
                    } else {
                        $TableName = "reports";
                        $sql = "UPDATE reports SET product='" . $_POST['product'] . "', 
version='" . $_POST['version'] . "',
hardware='" . $_POST['hardware'] . "',
OS='" . $_POST['os'] . "',
frequency='" . $_POST['frequency'] . "',
solution='" . $_POST['solution'] . "' 
    WHERE countID =" . $_GET['edit'];
                        $stmt = $DBConnect->prepare($sql);
                        $stmt->execute();
                        echo "Report has been changed.";
                    }
                }
            }
            $DBConnect = mysqli_connect("127.0.0.1", "root", "");
            if ($DBConnect === FALSE) {
                echo "<p>Unable to connect to the database server.</p>"
                . "<p>Error code " . mysqli_errno() . ": " . mysqli_error()
                . "</p>";
            } else {
                $DBName = "sdb";
                if (!mysqli_select_db($DBConnect, $DBName)) {
                    echo "<p>There are no reports!</p>";
                } else {
                    $TableName = "reports";
                    $SQLstring = "SELECT * FROM $TableName WHERE countID =" . $_GET['edit'];
                    $QueryResult = mysqli_query($DBConnect, $SQLstring);
                    if (mysqli_num_rows($QueryResult) == 0) {
                        echo "<p>There are no reports!</p>";
                    } else {
                        echo "<p>You can now change the following report:</p>";
                        while ($Row = mysqli_fetch_assoc($QueryResult)) {
                            echo "<p>Product name: <input type='text' value='{$Row['product']}' name='product'/></p>";
                            echo "<p>Version: <input type='text' value='{$Row['version']}'  name='version'/></p>";
                            echo "<p>hardware: <input type='text' value='{$Row['hardware']}' name='hardware'/></p>";
                            echo "<p>Operating system: <input type='text' value='{$Row['os']}' name='os'/></p>";
                            echo "<p>Frequency of occurance: <input type='text' value='{$Row['frequency']}' name='frequency'/></p>";
                            echo "<p>Possible solution: <input type='text' value='{$Row['solution']}' name='solution'/></p>";
                            echo "<p><input type='submit' name='Submit' value='Submit'></p>";
                            echo "<p><a href='main.php'>back to current bugs</a></p></form>";
                        }
                    }
                    mysqli_free_result($QueryResult);
                }
                mysqli_close($DBConnect);
            }
            ?>
    </body>
</html>
<?php
