<?php
require_once('db_connect.php');

$sql = "SELECT * FROM pilots";
$pilots = mysqli_query($connection, $sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aircraft Registration System</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>
<body>
    <h1>Pilots</h1>

    <p>
        <div>
        <a href="new-pilot.php">Add a new Pilot</a>
    </div>
    </p>
    <table class="center">
        <thead>
        <tr>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_array($pilots, MYSQLI_ASSOC)) : ?>
        <tr>
            <th><?= $row['last_name'] ?></th>
            <th><?= $row['first_name'] ?></th>
            <th><?= $row['phone'] ?></th>
            <th><?= $row['email'] ?></th>
            <th>
                <a href="pilot-detail.php?id=<?= $row['id'] ?>">View Pilot Record</a>
            </th>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>