<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categorias</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php require_once '..\src\Views\partials\sidebar.php' ?>
        <main class="content">
            <div class="intro-section">
                <div class="intro-title">
                    <h1>Sección de Categorias</h1>
                </div>
                <div class="intro-description">
                    <p>Un registro completo de todas las Categorias registradas en el sistema,
                        incluyendo información como el Id por el cual se indentifican y nombre completo.
                    </p>
                </div>
            </div>

            <div class="separator"></div>
            <?php require_once '..\src\Views\partials\navTabs\navTabsCategory.php' ?>
            <div class="separator"></div>

            <div class="category-section">
                <h2>Lista de Categorias</h2>
                <div class="category-list">
                    <?php if (!empty($categories)) : ?>
                        <?php foreach ($categories as $category) : ?>
                            <div class="category-container">
                                <div class="description-category">
                                    <div class="category-image">
                                        <img src="/images/image.png" alt="Imagen de categoría">
                                    </div>
                                    <div class="category-details">
                                        <h3><?php echo htmlspecialchars($category['name']); ?></h3>
                                        <p>ID: <?php echo htmlspecialchars($category['id']); ?></p>

                                    </div>
                                </div>
                                <div class="category-actions">
                                    <form action="/category/delete" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta categoría?');" style="display:inline-block;">
                                        <input type="hidden" name="category_id" value="<?php echo htmlspecialchars($category['id']); ?>">
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                    <form action="/category/alter" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="category_id" value="<?php echo htmlspecialchars($category['id']); ?>">
                                        <button type="submit" class="btn btn-primary">Modificar</button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No hay categorías registradas.</p>
                    <?php endif; ?>
                </div>

            </div>

        </main>
    </div>
</body>

<footer>
    <script src="\js\scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</footer>

</html>