<?php
require_once('db_connect.php');

$errors = [];
if (isset($_POST['submit'])){

    if (empty($_POST['last_name'])) {
        $errors[] = 'enter your last name';
    }
    if (empty($_POST['first_name'])) {
        $errors[] = 'enter your first name';
    }
    if (empty($_POST['phone'])) {
        $errors[] = 'enter your phone number';
    }
    if (empty($_POST['email'])) {
        $errors[] = 'enter your email';
    }

    if (!count($errors))  {
        // No validation errors occurred.
        $last_name = mysqli_real_escape_string($connection, trim($_POST['last_name']));
        $first_name = mysqli_real_escape_string($connection, trim($_POST['first_name']));
        $phone = mysqli_real_escape_string($connection, trim($_POST['phone']));
        $email = mysqli_real_escape_string($connection, trim($_POST['email']));


        $sql = "INSERT INTO pilots (last_name,first_name , phone, email) VALUES ('$last_name', '$first_name', '$phone', '$email')";


        $result = mysqli_query($connection, $sql);

        // Redirect back to the index page.
        header('location: index.php');
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
<h1>Add Pilot</h1>

<?php if (count($errors)) : ?>
    <h2>Please fix the errors listed</h2>
    <ul>
        <?php foreach ($errors as $error) : ?>
            <li><?php echo $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>




<form method="post">

    <label for="first_name">First Name</label>
    <input type="text" name="first_name" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : '' ?>">
    <br>
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : '' ?>">
    <br>
    <label for="phone">Phone Number</label>
    <input type="tel" name="phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>">
    <br>
    <label for="first_name">Email</label>
    <input type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
    <br>


    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>