<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= htmlspecialchars($event['title']) ?>
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"
        defer>
        </script>

</head>


<body class="bg-light">

    <?php require_once __DIR__ . '/../Components/header.php'; ?>

    <main>

        <section class="container py-5">

            <div class="row justify-content-center">

                <div class="col-12 col-lg-9">

                    <div class="card border-0 shadow-sm rounded-4">

                        <div class="card-body p-4 p-md-5">


                            <!-- ID -->
                            <div class="mb-4">

                                <span class="badge text-bg-light border rounded-3 px-3 py-2">
                                    Мероприятие №
                                    <?= (int) $event['id'] ?>
                                </span>

                            </div>


                            <!-- Название -->
                            <h1 class="display-6 fw-bold mb-4">
                                <?= htmlspecialchars($event['title']) ?>
                            </h1>


                            <!-- Описание -->
                            <div class="mb-4">

                                <h2 class="h5 fw-bold mb-2">
                                    О мероприятии
                                </h2>

                                <p class="text-body-secondary fs-5 mb-0">
                                    <?= nl2br(htmlspecialchars($event['description'])) ?>
                                </p>

                            </div>


                            <hr class="my-4">


                            <!-- Информация -->
                            <div class="row g-4">


                                <!-- Место -->
                                <div class="col-12 col-md-6">

                                    <div class="bg-light rounded-4 p-4 h-100">

                                        <div class="text-body-secondary small mb-2">
                                            Место проведения
                                        </div>

                                        <div class="fw-semibold fs-5">
                                            📍
                                            <?= htmlspecialchars($event['place']) ?>
                                        </div>

                                    </div>

                                </div>


                                <!-- Дата -->
                                <div class="col-12 col-md-6">

                                    <div class="bg-light rounded-4 p-4 h-100">

                                        <div class="text-body-secondary small mb-2">
                                            Дата проведения
                                        </div>

                                        <div class="fw-semibold fs-5">
                                            📅
                                            <?= htmlspecialchars($event['date']) ?>
                                        </div>

                                    </div>

                                </div>


                            </div>


                            <!-- Кнопки -->
                            <div class="d-flex flex-column flex-sm-row gap-2 mt-5">

                                <a href="/" class="btn btn-light btn-lg rounded-3">

                                    ← Все мероприятия

                                </a>


                                <?php if ($userRole === 'user'): ?>

                                    <a href="/events/<?= (int) $event['id'] ?>/apply"
                                        class="btn btn-primary btn-lg rounded-3 flex-grow-1">

                                        Подать заявку

                                    </a>

                                <?php elseif ($userRole === 'guest'): ?>

                                    <a href="/login" class="btn btn-primary btn-lg rounded-3 flex-grow-1">

                                        Войти для подачи заявки

                                    </a>

                                <?php endif; ?>


                            </div>


                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>


    <?php require_once __DIR__ . '/../Components/footer.php'; ?>


</body>

</html>