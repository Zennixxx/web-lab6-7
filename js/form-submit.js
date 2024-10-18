$(document).ready(function () {
    $("#surveyForm").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "process.php",
            data: $(this).serialize(),
            success: function (response) {
                window.location.href = "thank.php";
                alert("Анкета успішно надіслана!");
            },
            error: function () {
                alert("Сталася помилка під час надсилання форми.");
            }
        });
    });
});
