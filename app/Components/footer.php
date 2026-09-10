<footer class="bg-white border-top mt-5">

    <div class="container py-4">

        <div class="row g-4">


            <!-- Название -->
            <div class="col-12 col-md-5">

                <div class="fw-bold fs-5">
                    Events<span class="text-primary">Hub</span>
                </div>

                <p class="text-body-secondary small mb-0 mt-2">
                    Платформа для подачи заявок
                    на участие в мероприятиях.
                </p>

            </div>


            <!-- Навигация -->
            <div class="col-6 col-md-3">

                <h6 class="fw-bold">
                    Навигация
                </h6>

                <div class="d-flex flex-column gap-2">

                    <a href="/" class="text-body-secondary text-decoration-none">
                        Главная
                    </a>

                    <a href="/events" class="text-body-secondary text-decoration-none">
                        Мероприятия
                    </a>

                </div>

            </div>


            <!-- Пользователь -->
            <div class="col-6 col-md-4">

                <h6 class="fw-bold">
                    Личный кабинет
                </h6>

                <div class="d-flex flex-column gap-2">

                    <?php if ($userRole === 'guest'): ?>

                        <a href="/login" class="text-body-secondary text-decoration-none">
                            Войти
                        </a>

                        <a href="/register" class="text-body-secondary text-decoration-none">
                            Регистрация
                        </a>

                    <?php else: ?>

                        <a href="/profile" class="text-body-secondary text-decoration-none">
                            Профиль
                        </a>

                        <?php if ($userRole === 'user'): ?>

                            <a href="/applications" class="text-body-secondary text-decoration-none">
                                Мои заявки
                            </a>

                        <?php endif; ?>

                    <?php endif; ?>

                </div>

            </div>

        </div>


        <hr class="my-4">


        <div class="text-center text-body-secondary small">
            © <?= date('Y') ?> EventsHub. Все права защищены.
        </div>

    </div>

</footer>