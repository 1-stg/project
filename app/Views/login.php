<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Авторизация</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"
        defer></script>

    <script src="https://unpkg.com/imask" defer></script>
    <script src="../../public/web/formNumber.js" defer></script>
</head>

<body class="bg-light">

    <main class="container min-vh-100 d-flex align-items-center justify-content-center py-4">

        <section class="row w-100 justify-content-center">

            <div class="col-12 col-md-10 col-lg-8 col-xl-7">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4 p-md-5">

                        <header class="text-center mb-4">
                            <h1 class="h3 fw-bold mb-2">
                                Авторизация
                            </h1>

                            <p class="text-body-secondary mb-0">
                                Заполните форму, чтобы войти
                            </p>
                        </header>

                        <form action="/login" method="post">

                            <div class="row g-3">

                                <!-- Сообщение об ошибке -->
                                <?php if (!empty($_SESSION['error'])): ?>
                                    <div class="col-12">
                                        <span class="badge text-bg-danger w-100 p-3">
                                            <?= htmlspecialchars($_SESSION['error']) ?>
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <!-- Сообщение об успехе -->
                                <?php if (!empty($_SESSION['success'])): ?>
                                    <div class="col-12" id="success-alert">
                                        <span class="badge text-bg-success w-100 p-3">
                                            <?= htmlspecialchars($_SESSION['success']) ?>
                                        </span>
                                    </div>
                                <?php endif; ?>


                                <!-- Почта -->
                                <div class="col-12">
                                    <label for="email" class="form-label fw-medium">
                                        Электронная почта
                                    </label>

                                    <input type="email" class="form-control form-control-lg rounded-3" id="email"
                                        name="email" placeholder="example@mail.ru" autocomplete="email"
                                        value="<?= isset($_SESSION['old']['email']) ? htmlspecialchars($_SESSION['old']['email']) : '' ?>"
                                        required>
                                </div>

                                <!-- Пароль -->
                                <div class="col-12">
                                    <label for="password" class="form-label fw-medium">
                                        Пароль
                                    </label>

                                    <input type="password" class="form-control form-control-lg rounded-3" id="password"
                                        name="password" placeholder="Введите пароль" autocomplete="current-password"
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
                                        Войти
                                    </button>
                                </div>

                            </div>

                        </form>

                        <footer class="text-center mt-4 pt-3 border-top">
                            <span class="text-body-secondary">
                                Нет аккаунта?
                            </span>

                            <a href="/register" class="link-dark fw-medium text-decoration-none">
                                Зарегистрироваться
                            </a>
                        </footer>

                    </div>
                </div>

            </div>

        </section>

    </main>

    <?php
    unset($_SESSION['success']);
    unset($_SESSION['error']);
    unset($_SESSION['old']);
    ?>
</body>

</html>