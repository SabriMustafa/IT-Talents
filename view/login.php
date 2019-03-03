<?php
require_once "navigation.php";
?>


<body>
<form action="/IT-Talents/index.php?target=user&action=login" method="post" >
    <table>
        <tr>
            <th>Email</th>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td><input type="submit" name="login" value="Login"></td>

        </tr>
    </table>

</form>
</body>
</html>