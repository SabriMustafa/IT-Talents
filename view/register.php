<?php
require_once "navigation.php";
?>


<body>
<form action="/IT-Talents/index.php?target=user&action=register" method="post">
    <input type="hidden" name="target" value="user">
    <table>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" ></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" ></td>
        </tr>

        <tr>
            <td>Repeat Password</td>
            <td><input type="password" name="password2" ></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><input type="text" name="first_name" ></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type="text" name="last_name" ></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><input type="text" name="gender" ></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type="number" name="age" ></td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="action" value="Register">
            </td>
        </tr>
    </table>
</form>
</body>
</html>

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