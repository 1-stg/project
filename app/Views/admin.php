<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    Страница Админа
    <a href="/">На главную</a>

    <?php if ($_SESSION['user_role'] === 'guest') {
        echo '<a href="/register">Регистрация</a>';
        echo '<a href="/login">Вход</a>';
    }
    ?>

    <?php if ($_SESSION['user_role'] === 'admin')
        echo '<a href="/admin">админ</a>'; ?>
</body>

</html>