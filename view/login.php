<?php
require_once "navigation.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<div class="container-login">
<form action="/finalProject/index.php?target=user&action=login" method="post" >
    <table>
        <tr>
            <th>Email</th>
            <td><input type="text" name="email" class="form-control"></td>
        </tr>
        <tr>
            <th>Password</th>
            <td class="form-group"><input type="password" name="password" class="form-control"></td>
        </tr>
        <br>
        <br>
        <tr>
            <td><input type="submit" name="login" value="Вход" class="btn btn-danger"></td>

        </tr>
    </table>

</form>
</div>
</body>
</html>
<<<<<<< HEAD
<?php
require_once "footer.php";
?>
=======


<?php
$messageHandler = \Message\MessageHandler::getInstance();
foreach ($messageHandler->getMessages() as $message) {
    $style = 'color:green';
    if ($message['type'] === \Message\MessageHandler::MESSAGE_TYPE_ERROR) {
        $style = 'color:red';
    }
    echo "<p style=$style>" . $message['message'] . "</p>";
}
?>