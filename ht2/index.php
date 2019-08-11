<?php
session_start();
$_SESSION['user_id'] = 112233;
$userName = $_POST['user_name'] ?? null;
$userAge = $_POST['age'] ?? null;
if ($userName && $userAge) {
    $userName = $_POST['user_name'];
    $userAge = $_POST['age'];
}

$submit = 'disabled';
if (isset($_SESSION['user_id'])) {
    $submit = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<form method="post" action="index.php">
    Имя <input name="user_name" type="text" maxlength="25" size="20" value="<?=$userName ?>"/>
    <br>
    <br>
    Возраст <input name="age" type="text" maxlength="2" size="3" value="<?=$userAge ?>"/>
    <br>
    <br>
    <input type="submit" value="Передать" <?=$submit ?>>
</form>
<p></p>
<div>
    <p>
        <?php
        if (!empty($userName) && !empty($userAge)) {
            echo "Привет, $userName! Тебе правда $userAge лет";
            $data = $userName . ";" . $userAge . "\n";
            file_put_contents("user.txt", $data, FILE_APPEND);
        }
        ?>
    </p>
</div>
<div class="user-list">
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
