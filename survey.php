<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Анкета опитування</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/form-submit.js" defer></script> 
</head>
<body>
<header>Анкета опитування</header>
<div class="main">
    <section class="content">
        <form id="surveyForm">
            <label for="name">Ім'я респондента:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label>Питання 1: Який ваш улюблений колір?</label>
            <select name="question1">
                <option value="Червоний">Червоний</option>
                <option value="Синій">Синій</option>
                <option value="Зелений">Зелений</option>
                <option value="Жовтий">Жовтий</option>
                <option value="Білий">Білий</option>
            </select>

            <label>Питання 2: Опишіть своє улюблене хобі:</label>
            <textarea name="question2" rows="4" cols="50"></textarea>

            <label>Питання 3: Ви віддаєте перевагу книгам чи фільмам?</label>
            <div class="radio-group">
                <input type="radio" id="books" name="question3" value="Книги" required>
                <label for="books">Книги</label>
                <input type="radio" id="movies" name="question3" value="Фільми" required>
                <label for="movies">Фільми</label>
                <input type="radio" id="games" name="question3" value="Комп.ігри" required>
                <label for="games">Комп.ігри</label>
            </div>

            <input type="submit" value="Надіслати">
        </form>
    </section>
</div>
<footer>© 2024 Всі права захищено</footer>
</body>
</html>
