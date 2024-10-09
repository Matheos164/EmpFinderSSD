<!DOCTYPE html>
<?php
/**
 * This is an example of an UPDATE query using parameters from a form.
 * Use the grades table (grades.sql) from eLearn, and make sure you change
 * connect.php to use your correct login information.
 * 
 * Sam Scott, Mohawk College, 2019
 */
include "connect.php";

$paramsok = false;
if (isset($_POST["first"]) and $_POST["first"] != "" and isset($_POST["exam"]) and is_numeric($_POST["exam"])) {
    {
    $paramsok = true;
    $firstname = $_POST["first"];
    $exam = $_POST["exam"];
    $command = "UPDATE grades SET final_exam=? WHERE firstname=?";
    $stmt = $dbh->prepare($command);
    $params = [$exam, $firstname];
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