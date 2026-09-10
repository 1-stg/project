<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Регистрация</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"
        defer></script>

    <script src="https://unpkg.com/imask" defer></script>
    <script src="web/formNumber.js" defer></script>
</head>

<body class="bg-light">

    <main class="container min-vh-100 d-flex align-items-center justify-content-center py-4">

        <section class="row w-100 justify-content-center">

            <div class="col-12 col-md-10 col-lg-8 col-xl-7">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4 p-md-5">

                        <header class="text-center mb-4">
                            <h1 class="h3 fw-bold mb-2">
                                Создание аккаунта
                            </h1>

                            <p class="text-body-secondary mb-0">
                                Заполните форму, чтобы зарегистрироваться
                            </p>
                        </header>

                        <form action="/register" method="post">

                            <div class="row g-3">

                                <?php if (!empty($_SESSION['error'])): ?>
                                    <div class="col-12">
                                        <span class="badge text-bg-danger w-100 p-3">
                                            <?= htmlspecialchars($_SESSION['error']) ?>
                                        </span>
                                    </div>
                                <?php endif; ?>


                                <!-- ФИО -->
                                <div class="col-12">
                                    <label for="fio" class="form-label fw-medium">
                                        ФИО
                                    </label>

                                    <input type="text" class="form-control form-control-lg rounded-3" id="fio"
                                        name="fio" placeholder="Иванов Иван Иванович" autocomplete="name" 
                                        value="<?= isset($_SESSION['old']['fio']) ? htmlspecialchars($_SESSION['old']['fio']) : '' ?>" required>
                                </div>

                                <!-- Логин -->
                                <div class="col-12 col-md-6">
                                    <label for="login" class="form-label fw-medium">
                                        Логин
                                    </label>

                                    <input type="text" class="form-control form-control-lg rounded-3" id="login"
                                        name="login" placeholder="Example1123" autocomplete="username" 
                                        value="<?= isset($_SESSION['old']['login']) ? htmlspecialchars($_SESSION['old']['login']) : '' ?>" required>
                                </div>

                                <!-- Телефон -->
                                <div class="col-12 col-md-6">
                                    <label for="phone" class="form-label fw-medium">
                                        Телефон
                                    </label>

                                    <input type="tel" class="form-control form-control-lg rounded-3" id="phone"
                                        name="phone" placeholder="+7 (123) 456-78-90" autocomplete="tel"
                                        inputmode="numeric" 
                                        value="<?= isset($_SESSION['old']['phone']) ? htmlspecialchars($_SESSION['old']['phone']) : '' ?>" required>
                                </div>

                                <!-- Почта -->
                                <div class="col-12">
                                    <label for="email" class="form-label fw-medium">
                                        Электронная почта
                                    </label>

                                    <input type="email" class="form-control form-control-lg rounded-3" id="email"
                                        name="email" placeholder="example@mail.ru" autocomplete="email" 
                                        value="<?= isset($_SESSION['old']['email']) ? htmlspecialchars($_SESSION['old']['email']) : '' ?>" required>
                                </div>

                                <!-- Пароль (Оставляем пустым ради безопасности) -->
                                <div class="col-12">
                                    <label for="password" class="form-label fw-medium">
                                        Пароль
                                    </label>

                                    <input type="password" class="form-control form-control-lg rounded-3" id="password"
                                        name="password" placeholder="Введите пароль" autocomplete="new-password"
                                        required>
                                </div>

                                <!-- Запомнить -->
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberMe"
                                            name="rememberMe" <?= isset($_SESSION['old']['rememberMe']) ? 'checked' : '' ?>>

                                        <label class="form-check-label" for="rememberMe">
                                            Запомнить меня
                                        </label>
                                    </div>
                                </div>

                                <!-- Кнопка -->
                                <div class="col-12 pt-2">
                                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-3">
                                        Зарегистрироваться
                                    </button>
                                </div>

                            </div>

                        </form>

                        <footer class="text-center mt-4 pt-3 border-top">
                            <span class="text-body-secondary">
                                Уже зарегистрированы?
                            </span>

                            <a href="/login" class="link-dark fw-medium text-decoration-none">
                                Войти
                            </a>
                        </footer>

                    </div>
                </div>

            </div>

        </section>

    </main>

<?php 
unset($_SESSION['error']);
unset($_SESSION['old']); 
?>
</body>

</html>
