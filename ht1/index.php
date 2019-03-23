<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма</title>
</head>
<body>
<form method="get" action="index.php">
    Имя <input name="user_name" type="text" maxlength="25" size="20" value="имя" />
    <br>
    Возраст <input name="age" type="text" maxlength="2" size="3" value="возраст" />
    <br>
    <input type="submit" value="Передать">
</form>

</body>
</html>
<?php
echo $_GET["age"];