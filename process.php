<?php
include 'functions.php';

$servername = "mysql";
$username = "9db4d93";
$password = "tijtlxu0";
$dbname = "9db4d93";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $question1 = htmlspecialchars($_POST['question1']);
    $question2 = htmlspecialchars($_POST['question2']);
    $question3 = htmlspecialchars($_POST['question3']);

    $sql = "INSERT INTO survey_responses (name, email, question1, question2, question3)
            VALUES ('$name', '$email', '$question1', '$question2', '$question3')";

    if ($conn->query($sql) === TRUE) {
        $dateTime = saveSurveyResponse($name, $email, $question1, $question2, $question3);

        echo "Ваші дані успішно збережено. Час заповнення форми: $dateTime";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>