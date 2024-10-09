<!DOCTYPE html>
<?php
/**
 * A PDO SELECT example that writes code as well as content. 
 * Use the grades table (grades.sql) from eLearn, and make sure you 
 * change connect.php to use your correct login information.
 * 
 * Sam Scott, Mohawk College, 2019
 */
include "connect.php";

// Prepare and execute the DB query
$command = "SELECT firstname, lastname, student_id FROM grades ORDER BY lastname";
$stmt = $dbh->prepare($command);
$success = $stmt->execute();
?>
<html>

<head>
    <title>SELECT Queries</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/basic_examples.css">
</head>

<body>
    <?php
    // output
    if ($success) {
        echo "<ul>";

        while ($row = $stmt->fetch()) {
            echo "<a href='showsingleuser.php?id=$row[student_id]'>";
            echo "<li>$row[firstname] $row[lastname]</li>"; 
            echo "</a>";
        }
        
        echo "</ul>";
    } else {
        echo "<p>Fail…</p>";
    }
    ?>
</body>

</html>