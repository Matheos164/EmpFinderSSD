<!DOCTYPE html>
<?php
/**
 * This is an example of an INSERT query using parameters from a form.
 * Use the grades table (grades.sql) from Canvas, and make sure you change
 * connect.php to use your correct login information.
 * 
 * Sam Scott, Mohawk College, 2022
 */
include "connect.php";


$paramsok = false;
if (isset($_POST["first"]) and $_POST["first"] != "" and isset($_POST["last"]) and $_POST["last"] != "" and isset($_POST["start"])) {
    $paramsok = true;
    $firstname = $_POST["first"];
    $lastname = $_POST["last"];
    $start = $_POST["start"];
    $command = "INSERT into grades (firstname, lastname, start) VALUES (?, ?, ?)";
    $stmt = $dbh->prepare($command);
    $params = [$firstname, $lastname, $start];
    $success = $stmt->execute($params);
}

?>
<html>

<head>
    <title>Insert Script</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/basic_examples.css">
</head>

<body>
    <?php
    if ($paramsok) {
        if ($success) {
            echo "<p>Win!</p>";
            echo "<p>{$stmt->rowCount()} rows were affected by your 
query.</p>";
        } else {
            echo "<p>Fail…</p>";
        }
    } else {
        echo "<p>Something was wrong with your parameters!</p>";
    }
    ?>
</body>

</html>