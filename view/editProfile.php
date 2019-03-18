<?php
require_once "navigation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Technomarket</title>
</head>
<body>
<form action="index.php?target=user&action=editProfile" method="post">
    <input type="hidden" name="target" value="user">
    <table>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?= $_SESSION['user']->getEmail(); ?>" disabled></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><input type="text" name="first_name" value="<?= $_SESSION['user']->getFirstName(); ?>" required></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type="text" name="last_name" value="<?= $_SESSION['user']->getLastName(); ?>" required></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><input type="text" name="gender" value="<?= $_SESSION['user']->getGender(); ?>" required></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type="number" name="age" value="<?= $_SESSION['user']->getAge(); ?>" required></td>
        </tr>
        <tr>
            <td>New password</td>
            <td><input type="password" name="new-password" ></td>
        </tr>
        <tr>
            <td>Repeat password</td>
            <td><input type="password" name="repeat-password" ></td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="action" value="Edit"  class="btn btn-danger">
            </td>
        </tr>
    </table>
</form>
<div>

</div>
<?php
require_once "footer.php";
?>
</body>
</html>