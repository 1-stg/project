<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Подача заявки</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"
        defer>
        </script>

</head>


<body class="bg-light">

    <?php require_once __DIR__ . '/../Components/header.php'; ?>


    <main class="container min-vh-100 d-flex align-items-center justify-content-center py-4">

        <section class="row w-100 justify-content-center">

            <div class="col-12 col-md-10 col-lg-8 col-xl-7">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4 p-md-5">


                        <!-- Заголовок -->

                        <header class="text-center mb-4">

                            <h1 class="h3 fw-bold mb-2">
                                Подача заявки
                            </h1>

                            <p class="text-body-secondary mb-0">
                                Заявка на участие в мероприятии
                            </p>

                        </header>


                        <!-- Информация о мероприятии -->

                        <div class="bg-light border rounded-4 p-4 mb-4">

                            <div class="small text-body-secondary mb-1">
                                Мероприятие
                            </div>

                            <h2 class="h5 fw-bold mb-3">
                                <?= htmlspecialchars($event['title']) ?>
                            </h2>


                            <div class="small text-body-secondary mb-2">

                                📅
                                <?= htmlspecialchars($event['date']) ?>

                            </div>


                            <div class="small text-body-secondary">

                                📍
                                <?= htmlspecialchars($event['place']) ?>

                            </div>

                        </div>


                        <?php if (!empty($_SESSION['error'])): ?>

                            <div class="alert alert-danger rounded-3">

                                <?= htmlspecialchars($_SESSION['error']) ?>

                            </div>

                        <?php endif; ?>


                        <!-- Форма -->

                        <form action="/events/<?= (int) $event['id'] ?>/apply" method="POST">

                            <div class="row g-3">


                                <!-- Тип оплаты -->

                                <div class="col-12">

                                    <label for="pay_type" class="form-label fw-medium">

                                        Тип оплаты

                                    </label>


                                    <select class="form-select form-select-lg rounded-3" id="pay_type" name="pay_type"
                                        required>

                                        <option value="" selected disabled>
                                            Выберите тип оплаты
                                        </option>

                                        <?php foreach ($payMethods as $method): ?>
                                            <option value="<?= $method['id'] ?>">
                                                <?= $method['pay_type'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>


                                <!-- Кнопка -->

                                <div class="col-12 pt-2">

                                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-3">

                                        Подать заявку

                                    </button>

                                </div>

                            </div>

                        </form>


                        <!-- Назад -->

                        <footer class="text-center mt-4 pt-3 border-top">

                            <a href="/events/<?= (int) $event['id'] ?>"
                                class="link-dark fw-medium text-decoration-none">

                                ← Вернуться к мероприятию

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