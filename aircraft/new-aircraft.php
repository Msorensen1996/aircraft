<?php
require_once('db_connect.php');

// Fetch the id parameter from the URL.  This tells us which pilot we are adding the aircraft for.
$pilotId = mysqli_real_escape_string($connection, trim($_GET['id']));

$errors = [];
if (isset($_POST['submit'])){

    if (!$pilotId) {
        $errors[] = 'Please select a pilot.';
    }
    if (empty($_POST['model'])) {
        $errors[] = 'enter a model';
    }
    if (empty($_POST['registration'])) {
        $errors[] = 'enter a model';
    }



    if (!count($errors))  {
        $model = mysqli_real_escape_string($connection,trim($_POST['model']));
        $registration = mysqli_real_escape_string($connection,trim($_POST['registration']));


        $sql = "INSERT INTO aircraft(pilot_id, model, registration_number) VALUES ($pilotId,' $model', '$registration')";

        $result = mysqli_query($connection, $sql);

        // Redirect to the pilot-detail.php page, for the pilot that we just added the aircraft to.
        header('location: pilot-detail.php?id=' . $pilotId);
        die;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aircraft Registration System</title>
</head>
<body>
<h1>Add Aircraft</h1>

<?php if (count($errors)) : ?>
<h2>Please fix the errors listed</h2>
<ul>
    <?php foreach ($errors as $error) : ?>
    <li><?php echo $error ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>


<form method="post">
    <label for="model">Model</label>
    <input type="text" name="model" value="<?php echo isset($_POST['model']) ? $_POST['model'] : '' ?> ">
    <br>
    <label for="registration">Registration</label>
    <input type="text" name="registration" value="<?php echo isset($_POST['registration']) ? $_POST['registration'] : '' ?> ">
    <br>
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>