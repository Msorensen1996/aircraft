<?php
require_once('db_connect.php');

// Get the id query parameter from the url and escape it so it is safe to insert into a MySQL query
// This is the id of the pilot the user wants to view the details of.
$pilotId = mysqli_real_escape_string($connection, trim($_GET['id']));

// Fetch all aircraft that the pilot owns
$sql = "SELECT * FROM aircraft WHERE pilot_id = $pilotId";
$aircraft = mysqli_query($connection, $sql);

// Fetch the information for the pilot
$sql = "SELECT * FROM pilots WHERE id = $pilotId";
$pilots = mysqli_query($connection, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aircraft Registration System</title>
</head>
<body>
    <h1>Pilot Detail</h1>

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
                <td><?= $row['last_name'] ?></td>
                <td><?= $row['first_name'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= $row['email'] ?></td>
                <td>
                    <a href="pilot-detail.php?id=<?= $row['id'] ?>">View Pilot Record</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <h1>Aircraft Detail</h1>

    <p>
    <div>
        <a href="new-aircraft.php?id=<?= $pilotId ?>">Add a new Aircraft</a>
    </div>
    </p>
    <table class="center">
        <thead>
        <tr>
            <th>Registration Number</th>
            <th>Model</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_array($aircraft, MYSQLI_ASSOC)) : ?>
        <tr>
            <td><?= $row['registration_number'] ?></td>
            <td><?= $row['model'] ?></td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <a href="index.php">Return to Pilot List</a>



</body>
</html>