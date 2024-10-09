<!DOCTYPE html>
<?php
/**
 * A PDO SELECT example that shows a single user. This is just proof of concept
 * for example.php. If this was a real example, you wouldn't use var_dump.
 *  
 * Use the grades table (grades.sql) from eLearn, and make sure you 
 * change connect.php to use your correct login information.
 * 
 * Sam Scott, Mohawk College, 2022
 */
include "connect.php";

// get the id
$id = $_GET["id"];

// Prepare and execute the DB query
$command = "SELECT * FROM grades WHERE student_id=?";
$stmt = $dbh->prepare($command);
$success = $stmt->execute([$id]);

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
    // display the results
    if ($success && $row = $stmt->fetch()) {
        ?>
        <h1>Do you want to delete the user shown below?</h1>
        <form action="deleteuser.php" method="post">
            <input type="hidden" name="id" value="<?= $row["student_id"] ?>">
            <input type="submit" value="Yes, Please!">
        </form>

        <?php
        echo "<pre>";
        var_dump($row);
        echo "</pre>";
    } else {
        echo "<p>Fail…</p>";
    }
    ?>
</body>

</html>