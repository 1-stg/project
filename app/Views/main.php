<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Главная</title>

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

        <!-- Hero -->
        <section class="container py-5">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4 p-md-5">

                    <h1 class="display-5 fw-bold mb-3">
                        Участвуйте в интересных мероприятиях
                    </h1>

                    <p class="fs-5 text-body-secondary mb-4">
                        Находите подходящие мероприятия,
                        подавайте заявки и принимайте участие
                        в событиях.
                    </p>

                    <a href="/events" class="btn btn-primary btn-lg rounded-3">
                        Смотреть мероприятия
                    </a>

                </div>

            </div>

        </section>


        <!-- Ближайшие мероприятия -->
        <section class="container pb-5">

            <div class="d-flex justify-content-between
                        align-items-center mb-4">

                <div>

                    <h2 class="h3 fw-bold mb-1">
                        Ближайшие мероприятия
                    </h2>

                    <p class="text-body-secondary mb-0">
                        Выберите мероприятие и подайте заявку
                    </p>

                </div>

                <a href="/events" class="text-decoration-none link-dark fw-medium">
                    Все мероприятия →
                </a>

            </div>


            <div class="row g-4">

                <!-- Мероприятие -->
                <?php foreach ($events as $event): ?>

                    <div class="col-12 col-md-6 col-lg-4">

                        <div class="card border-0 shadow-sm rounded-4 h-100">

                            <div class="card-body p-4 d-flex flex-column">

                                <h3 class="h5 fw-bold">
                                    <?= htmlspecialchars($event['title']) ?>
                                </h3>

                                <p class="text-body-secondary">
                                    <?= htmlspecialchars($event['description']) ?>
                                </p>

                                <div class="small text-body-secondary mb-3">

                                    <div class="mb-2">
                                        📅 <?= htmlspecialchars($event['date']) ?>
                                    </div>

                                    <div>
                                        📍 <?= htmlspecialchars($event['place']) ?>
                                    </div>

                                </div>

                                <a href="/events/<?= (int) $event['id'] ?>"
                                    class="btn btn-outline-primary rounded-3 w-100 mt-auto">

                                    Подробнее

                                </a>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </section>

    </main>


    <?php require_once __DIR__ . '/../Components/footer.php'; ?>


</body>

</html>