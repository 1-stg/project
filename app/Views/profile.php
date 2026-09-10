<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Мои заявки</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"
        defer>
        </script>

</head>


<body class="bg-light">

    <?php require_once __DIR__ . '/../Components/header.php'; ?>


    <main class="container py-5">

        <!-- Заголовок -->

        <header class="mb-4">

            <h1 class="h3 fw-bold mb-2">
                Мои заявки
            </h1>

            <p class="text-body-secondary mb-0">
                Здесь отображаются ваши заявки на мероприятия
            </p>

        </header>


        <?php if (!empty($_SESSION['success'])): ?>

            <div class="alert alert-success rounded-3 mb-4">

                <?= htmlspecialchars($_SESSION['success']) ?>

            </div>

        <?php endif; ?>


        <?php if (!empty($_SESSION['error'])): ?>

            <div class="alert alert-danger rounded-3 mb-4">

                <?= htmlspecialchars($_SESSION['error']) ?>

            </div>

        <?php endif; ?>


        <?php if (empty($orders)): ?>

            <!-- Нет заявок -->

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-5 text-center">

                    <div class="fs-1 mb-3">
                        📋
                    </div>

                    <h2 class="h5 fw-bold mb-2">
                        У вас пока нет заявок
                    </h2>

                    <p class="text-body-secondary mb-4">
                        Вы ещё не подали заявку ни на одно мероприятие.
                    </p>

                    <a href="/" class="btn btn-primary rounded-3 px-4">

                        Посмотреть мероприятия

                    </a>

                </div>

            </div>


        <?php else: ?>


            <!-- Список заявок -->

            <div class="row g-4">

                <?php foreach ($orders as $order): ?>

                    <div class="col-12 col-md-6 col-lg-4">

                        <div class="card border-0 shadow-sm rounded-4 h-100">

                            <div class="card-body p-4 d-flex flex-column">


                                <!-- Название мероприятия -->

                                <h2 class="h5 fw-bold mb-3">

                                    <?= htmlspecialchars($order['title']) ?>

                                </h2>


                                <!-- Дата -->

                                <div class="small text-body-secondary mb-2">

                                    📅

                                    <?= htmlspecialchars($order['date']) ?>

                                </div>


                                <!-- Место -->

                                <div class="small text-body-secondary mb-3">

                                    📍

                                    <?= htmlspecialchars($order['place']) ?>

                                </div>


                                <hr class="my-2">


                                <!-- Статус -->

                                <div class="mb-2">

                                    <span class="small text-body-secondary">
                                        Статус заявки
                                    </span>

                                    <div class="mt-1">

                                        <?php
                                        $statusClass = match ((int) $order['status']) {
                                            1 => 'text-bg-warning',
                                            2 => 'text-bg-info',
                                            3 => 'text-bg-success',
                                            4 => 'text-bg-danger',
                                            5 => 'text-bg-secondary',
                                            default => 'text-bg-secondary'
                                        };
                                        ?>

                                        <span class="badge <?= $statusClass ?> rounded-3">

                                            <?= htmlspecialchars($order['status_name']) ?>

                                        </span>

                                    </div>

                                </div>


                                <!-- Тип оплаты -->

                                <div class="mb-4">

                                    <span class="small text-body-secondary">
                                        Способ оплаты
                                    </span>

                                    <div class="fw-medium mt-1">

                                        <?= htmlspecialchars($order['pay_type_name']) ?>

                                    </div>

                                </div>


                                <!-- Кнопка -->

                                <div class="mt-auto">

                                    <a href="/events/<?= (int) $order['event_id'] ?>"
                                        class="btn btn-outline-primary rounded-3 w-100">

                                        Подробнее о мероприятии

                                    </a>

                                </div>


                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>


    </main>



    <?php

    unset($_SESSION['success']);
    unset($_SESSION['error']);

    ?>

</body>

</html>