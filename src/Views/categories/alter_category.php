<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categorías</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php require_once '..\src\Views\partials\sidebar.php' ?>
        <main class="content">
            <div class="intro-section">
                <div class="intro-title">
                    <h1>Registro de Categorías</h1>
                </div>
                <div class="intro-description">
                    <p>Un registro completo de todas las categorías registradas en el sistema,
                        incluyendo información como el ID por el cual se identifican y el nombre completo.
                    </p>
                </div>
            </div>

            <div class="separator"></div>
            <?php require_once '..\src\Views\partials\navTabs\navTabsCategory.php' ?>
            <div class="separator"></div>

            <div class="category-section">
                <section class="alter-section">
                    <div class="form-container">
                        <div class="section-title">
                            <h2>Ingresa los nuevos detalles de: <br>
                                <?php echo htmlspecialchars($category['name']); ?></h2>
                        </div>
                        <div class="form-description">
                            Completa los siguientes campos para actualizar la categoría.
                        </div>
                        <form action="/category/update" method="POST">
                            <input type="hidden" name="category_id" value="<?php echo htmlspecialchars($category['id']); ?>">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($category['name']); ?>" required>
                            </div>
                            <div class="form-buttons">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>

<footer>
    <script src="/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</footer>

</html>
