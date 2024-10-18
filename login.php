<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'admin' && $password == '1234') {
        $_SESSION['loggedin'] = true;
        header("Location: admin.php");
        exit;
    } else {
        $error = "Неправильне ім'я користувача або пароль.";
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вхід</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
    </style>
</head>
<body>
<h1>Вхід в адмін панель</h1>
<?php if (isset($error)) echo "<p style='color:red; text-align:center;'>$error</p>"; ?>
<form action="login.php" method="POST">
    <label for="username">Ім'я користувача:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <input type="submit" value="Увійти">
</form>
</body>
</html>