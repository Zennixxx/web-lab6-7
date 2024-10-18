<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

$servername = "mysql";
$username = "9db4d93";
$password = "tijtlxu0";
$dbname = "9db4d93";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Очищення таблиці
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['clear_table'])) {
    $clearSql = "TRUNCATE TABLE survey_responses";
    if ($conn->query($clearSql) === TRUE) {
        echo "Таблиця успішно очищена.";
    } else {
        echo "Помилка при очищенні таблиці: " . $conn->error;
    }
}

$conn->close();

// Повернення на admin.php після очищення
header("Location: admin.php");
exit;
?>
