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
<div class="main">
    <p>
        <?php
        if (!empty($_POST['user_name']) && !empty($_POST['age'])) {
            echo "Привет, {$_POST['user_name']}! Тебе правда  {$_POST['age']} лет";
            $data = $_POST['user_name'] . ";" . $_POST["age"] . "\n";
            file_put_contents("user.txt",$data,FILE_APPEND);
            var_dump($data); //просто сделал, чтобы смотреть что в переменной
        }
        ?>
    </p>
    <?=file_get_contents('user.txt')?>
    <p>
    </p>

</div>
</body>
</html>