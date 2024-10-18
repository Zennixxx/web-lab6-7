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

// Видалення окремого запису за ID
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $conn->query("DELETE FROM survey_responses WHERE id = $delete_id");
    header("Location: admin.php");
    exit;
}

// Очищення всієї таблиці
if (isset($_POST['clear'])) {
    $conn->query("TRUNCATE TABLE survey_responses");
    header("Location: admin.php");
    exit;
}

// Експорт до JSON
if (isset($_POST['export'])) {
    $sql = "SELECT * FROM survey_responses";
    $result = $conn->query($sql);

    $responses = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $responses[] = $row;
        }
    }

    $jsonFile = 'survey_responses.json';
    file_put_contents($jsonFile, json_encode($responses, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="' . basename($jsonFile) . '"');
    readfile($jsonFile);
    exit;
}

$sql = "SELECT * FROM survey_responses";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Адмін панель</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<h1>Відповіді на опитування</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Ім'я</th>
        <th>Email</th>
        <th>Питання 1</th>
        <th>Питання 2</th>
        <th>Питання 3</th>
        <th>Дата та час</th>
        <th>Дія</th>
    </tr>
    <?php if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['question1']}</td>
                <td>{$row['question2']}</td>
                <td>{$row['question3']}</td>
                <td>{$row['created_at']}</td>
                <td><a href='admin.php?delete_id={$row['id']}' onclick=\"return confirm('Ви впевнені, що хочете видалити цей коментар?');\">Видалити</a></td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='8'>Немає відповідей.</td></tr>";
    } ?>
</table>

<form method="post">
    <input type="submit" name="clear" value="Очистити таблицю" onclick="return confirm('Ви впевнені, що хочете очистити таблицю?');">
    <input type="submit" name="export" value="Експортувати у JSON">
</form>

<a href="logout.php">Вийти</a>
</body>
</html>

<?php $conn->close(); ?>