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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['export_table'])) {
    $filename = "survey_responses_export.txt";
    $file = fopen($filename, "w");

    $headers = "ID, Ім'я, Email, Питання 1, Питання 2, Питання 3, Дата та час\n";
    fwrite($file, $headers);

    $sql = "SELECT * FROM survey_responses";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // fetch_assoc() - імена масиву стають ключами
        while($row = $result->fetch_assoc()) {
            $line = "{$row['id']}, {$row['name']}, {$row['email']}, {$row['question1']}, {$row['question2']}, {$row['question3']}, {$row['created_at']}\n";
            fwrite($file, $line);
        }
    }

    fclose($file);
    echo "Таблиця експортована в файл <a href='$filename'>click here</a>.";
}

$conn->close();
?>

<a href="admin.php">Назад до адмін панелі</a>
