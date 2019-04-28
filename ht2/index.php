<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма</title>
</head>
<body>
<form method="get" action="index.php">
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
            echo "{$_POST['user_name']} {$_POST['age']}";
            //$result = $_POST['user_name'] + $_POST['age'];
            $file = fopen ("user.txt","a+b  ");
            fwrite($file, "$_POST\n");
            fclose($file);
        }

        ?>
    </p>
</div>
</body>
</html>