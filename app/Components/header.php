<?php
$userRole = $_SESSION['user_role'] ?? 'guest';
?>

<header>

    <nav class="navbar navbar-expand-lg bg-white border-bottom">

        <div class="container py-2">

            <!-- Логотип -->
            <a class="navbar-brand fw-bold fs-4" href="/">
                Events<span class="text-primary">Hub</span>
            </a>


            <!-- Мобильное меню -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Открыть меню">

                <span class="navbar-toggler-icon"></span>

            </button>


            <div class="collapse navbar-collapse" id="mainNavbar">


                <!-- Основная навигация -->
                <div class="navbar-nav mx-auto">

                    <a href="/" class="nav-link">
                        Главная
                    </a>

                    <a href="/events" class="nav-link">
                        Мероприятия
                    </a>

                </div>


                <!-- Навигация пользователя -->
                <div class="d-flex flex-column flex-lg-row gap-2 mt-3 mt-lg-0">


                    <?php if ($userRole === 'guest'): ?>

                        <a href="/register" class="btn btn-light rounded-3 px-3">
                            Регистрация
                        </a>

                        <a href="/login" class="btn btn-primary rounded-3 px-3">
                            Войти
                        </a>


                    <?php elseif ($userRole === 'user' || $userRole === 'admin'): ?>

                        <a href="/profile" class="btn btn-light rounded-3 px-3">
                            Профиль
                        </a>

                        <a href="/logout" class="btn btn-outline-danger rounded-3 px-3">
                            Выйти
                        </a>


                    <?php elseif ($userRole === 'admin'): ?>

                        <a href="/admin" class="btn btn-light rounded-3 px-3">
                            Админ-панель
                        </a>

                    <?php endif; ?>


                </div>

            </div>

        </div>

    </nav>

</header>