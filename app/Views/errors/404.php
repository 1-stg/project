<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Страница не найдена</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"
        defer></script>
</head>

<body class="bg-light">
    <main class="container">
        <main class="container min-vh-100 d-flex align-items-center justify-content-center py-4">

            <section class="row w-100 justify-content-center">

                <div class="col-12 col-md-10 col-lg-8 col-xl-7">

                    <div class="card border-0 shadow-sm rounded-4">

                        <div class="card-body p-4 p-md-5">

                            <header class="text-center mb-4">
                                <h1 class="h3 fw-bold mb-2">
                                    Ошибка 404
                                </h1>

                                <p class="text-body-secondary mb-0">
                                    Такой страницы нет
                                </p>
                            </header>

                            <main>
                                <div class="col-12">
                                    <span class="badge text-bg-warning w-100 p-3">
                                        Запрашиваемый адрес:
                                        <?= parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>
                                    </span>
                                </div>
                            </main>

                            <footer class="text-center mt-4 pt-3 border-top">
                                <a href="/" class="link-dark fw-medium text-decoration-none">
                                    перейти на главную
                                </a>
                            </footer>

                        </div>
                    </div>

                </div>

            </section>

        </main>
    </main>
</body>

</html>