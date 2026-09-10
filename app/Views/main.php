<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
</head>

<body>
    Главная страница

    <a href="/">Главная</a>
    <a href="/123123">Ошибка 404</a>

    <?php
    if ($_SESSION['user_role'] === 'user') {
        echo '<a href="/logout">Выход</a>';
        echo '<a href="/profile">Профиль</a>';
    }
    ?>

    <?php if ($_SESSION['user_role'] === 'guest') {
        echo '<a href="/register">Регистрация</a>';
        echo '<a href="/login">Вход</a>';
    }
    ?>

    <?php if ($_SESSION['user_role'] === 'admin') {

        echo '<a href="/logout">Выход</a>';
        echo '<a href="/admin">админ</a>';
    }
    ?>

</body>

</html>