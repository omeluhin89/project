<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма</title>
</head>
<body>
<form method="get" action="index.php">
    Имя <input name="user_name" type="text" maxlength="25" size="20" value="<?= $_GET['user_name'] ?? null ?>"/>
    <br>
    <br>
    Возраст <input name="age" type="text" maxlength="2" size="3" value="<?= $_GET['age'] ?? null ?>"/>
    <br>
    <br>
    <input type="submit" value="Передать">

</form>
<div class="main">
    <p>
        <?php

        if (!empty($_GET['user_name']) && !empty($_GET['age'])) {
            echo "Привет, {$_GET['user_name']}! Тебе правда  {$_GET['age']} лет";
        }

        ?>
    </p>
</div>
</body>
</html>