<?php

// функція збереження результату опитування у вигляді текстового файлу
function saveSurveyResponse($name, $email, $question1, $question2, $question3) {
    $directory = 'survey';

    
    if (!is_dir($directory)) {
        mkdir($directory, 0755, true);
    }

    $dateTime = date('Y-m-d H:i:s');
    $fileName = "$directory/" . date('Y-m-d_H-i-s') . ".txt";

    $content = "Ім'я: $name\n";
    $content .= "Email: $email\n";
    $content .= "Питання 1: $question1\n";
    $content .= "Питання 2: $question2\n";
    $content .= "Питання 3: $question3\n";
    $content .= "Час заповнення: $dateTime\n";

    file_put_contents($fileName, $content);

    return $dateTime;
}
?>
