<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма</title>
</head>
<body>
<form method="post" action="index.php">
    Имя <input name="user_name" type="text" maxlength="25" size="20" value="<?= $_POST['user_name'] ?? null ?>"/>
    <br>
    <br>
    Возраст <input name="age" type="text" maxlength="2" size="3" value="<?= $_POST['age'] ?? null ?>"/>
    <br>
    <br>
    <input type="submit" value="Передать">

</form>
<div>
    <p>
        <?php
        if (!empty($_POST['user_name']) && !empty($_POST['age'])) {
            echo "Привет, {$_POST['user_name']}! Тебе правда  {$_POST['age']} лет";
            $data = $_POST['user_name'] . ";" . $_POST["age"] . "\n";
            file_put_contents("user.txt", $data, FILE_APPEND);
        }
        ?>
    </p>
</div>
<div style="background: #cccccc; border: 2px solid black; border-radius: 9px; width: 150px;">
<?php
$text = file_get_contents('user.txt');
$usersDataList = explode("\n", $text);
array_pop($usersDataList);
foreach ($usersDataList as $value) {
    [$name, $age] = explode(';', $value);
    echo "$name, $age лет<br>";
}
?>
</div>

</body>
</html>