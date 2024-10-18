<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Дякуємо!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <h1>Дякуємо за участь в опитуванні!</h1>
    <p>Час заповнення форми: <span id="currentTime"></span></p>
    <p>Ви будете перенаправлені на головну сторінку через <span id="countdown">5</span> секунд.</p>

    <script>
        var now = new Date();
        var formattedTime = now.toLocaleString('uk-UA', {
            day: '2-digit', 
            month: '2-digit', 
            year: 'numeric',
            hour: '2-digit', 
            minute: '2-digit', 
            second: '2-digit'
        });
        document.getElementById('currentTime').innerText = formattedTime;

        var countdown = 5;
        var countdownElement = document.getElementById('countdown');
        
        var interval = setInterval(function() {
            countdown--;
            countdownElement.innerText = countdown;
            if (countdown <= 0) {
                clearInterval(interval);
                window.location.href = 'index.html';
            }
        }, 1000);
    </script>
</body>
</html>
