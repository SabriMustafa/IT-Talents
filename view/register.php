<?php
require_once "navigation.php";
?>


<body>
<div class="container-register">
    <form action="/IT-Talents/index.php?target=user&action=register" method="post">
        <input type="hidden" name="target" value="user">
        <table>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" class="form-control"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" class="form-control"></td>
            </tr>

            <tr>
                <td>Repeat Password</td>
                <td><input type="password" name="password2" class="form-control"></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="first_name" class="form-control"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="last_name" class="form-control"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="text" name="gender" class="form-control"></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="number" name="age" class="form-control"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="action" value="Register" class="btn btn-danger">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
<<<<<<< HEAD
<?php
require_once "footer.php ";
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
>>>>>>> fa636f0ab158e9d2fcfafd688eab9e655e7d3867
