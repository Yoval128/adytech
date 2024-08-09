<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php require_once '..\src\Views\partials\sidebar.php' ?>
        <main class="content">
            <div class="intro-section">
                <div class="intro-title">
                    <h1>Productos en existencia</h1>
                </div>
                <div class="intro-description">
                    <p>Descripción.</p>
                </div>
            </div>

            <div class="separator"></div>
            <?php require_once '..\src\Views\partials\navTabs\navTabsInventary.php' ?>
            <div class="separator"></div>

            <div class="products-section">
                <h2>Lista de Productos</h2>
                <div class="products-list">
                    <?php if (!empty($products)) : ?>
                        <?php foreach ($products as $product) : ?>
                            <div class="product-container">
                                <div class="description-products">
                                    <div class="product-image">
                                        imagen
                                    </div>
                                    <div class="product-details">
                                        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                                        <p>Precio: <?php echo htmlspecialchars($product['price']); ?> MX$</p>
                                        <p>Stock: <?php echo htmlspecialchars($product['stock']); ?></p>
                                        <p>Categoría ID: <?php echo htmlspecialchars($product['category_id']); ?></p>
                                    </div>
                                </div>
                                <div class="product-actions">
                                    <form action="/products/delete" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este producto?');" style="display:inline-block;">
                                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                    <form action="/products/alter" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                                        <button type="submit" class="btn btn-primary">Modificar</button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No hay productos disponibles.</p>
                    <?php endif; ?>
                </div>
            </div>

        </main>
    </div>
</body>

<footer>
    <p>Hola mundo</p>
</footer>

<script src="\js\scripts.js"></script>

</html>