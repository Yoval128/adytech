<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php require_once __DIR__ . '/../partials/sidebar.php'; ?>
        <main class="content">
            <div class="intro-section">
                <div class="intro-title">
                    <h1>Busqueda de productos por Id</h1>
                </div>
                <div class="intro-description">
                    <p> Encuentra el calzado que buscas de forma instantánea. Introduce el ID del producto en el campo correspondiente y accede a toda la información relevante, como detalles, tallas disponibles y precio.
                    </p>
                </div>
            </div>

            <div class="separator"></div>
            <?php require_once '..\src\Views\partials\navTabs\navTabsInventary.php' ?>
            <div class="separator"></div>

            <div class="search-section">
                <h2>Buscar Producto por ID</h2>
                <form action="/products/search" method="GET">
                    <div class="form-group">
                        <label for="product_id">ID del Producto:</label>
                        <input type="text" class="form-control" id="product_id" name="product_id" placeholder="Ingresa el ID del producto" required>
                    </div>
                    <div class="form-buttons">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </form>
            </div>

            <div class="separator"></div>

            <div class="products-section">
                <h2>Lista de Productos</h2>
                <div class="products-list">
                    <?php if (!empty($products)) : ?>
                        <?php foreach ($products as $product) : ?>
                            <div class="product-container">
                            <div class="description-products">
                                    <div class="product-image">
                                        <?php if (!empty($product['image_path'])) : ?>
                                            <img src="<?php echo htmlspecialchars($product['image_path']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                                        <?php else : ?>
                                            <img src="/images/products/default.png" alt="Imagen no disponible">
                                        <?php endif; ?>
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
                        <p>No se encontró el producto con el ID: <?php echo htmlspecialchars($id); ?>.</p>
                    <?php endif; ?>
                </div>
            </div>

        </main>
    </div>

    <footer>
        <script src="\js\scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </footer>

</body>



</html>