<?php
session_start();
$_SESSION['user_id'] = 112233;
if (!empty($_POST['user_name']) && !empty($_POST['age'])) {
    $user_name = $_POST['user_name'];
    $user_age = $_POST['age'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма</title>
</head>
<body>
<div>
    <p>
        <?php
        $submit = 'disabled';
        if (isset($_SESSION['user_id'])) {
            $submit = '';
        }
        if (!empty($user_name) && !empty($user_age)) {
            echo "Привет, $user_name! Тебе правда $user_age лет";
            $data = $user_name . ";" . $user_age . "\n";
            file_put_contents("user.txt", $data, FILE_APPEND);
        }
        ?>
    </p>
</div>
<form method="post" action="index.php">
    Имя <input name="user_name" type="text" maxlength="25" size="20" value="<?=$user_name ?? null ?>"/>
    <br>
    <br>
    Возраст <input name="age" type="text" maxlength="2" size="3" value="<?=$user_age ?? null ?>"/>
    <br>
    <br>
    <input type="submit" value="Передать" <?=$submit ?>>
</form>
<p></p>
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
