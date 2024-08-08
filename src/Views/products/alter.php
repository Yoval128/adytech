<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <?php
    require_once '../src/Views/partials/sidebar.php'
    ?>
    
    <section class="product-section">
        <div class="section-title">
            <h2>Nuevo producto</h2>
        </div>
        <div class="section descrition">
            <p>En el módulo PRODUCTOS podrá agregar nuevos productos al sistema, actualizar datos de los productos, eliminar o actualizar la imagen de los productos, imprimir códigos de barras o SKU de cada producto, buscar productos en el sistema, ver todos los productos en almacén, ver los productos más vendido y filtrar productos por categoría.
            </p>
        </div>
        <?php require_once '../src/Views/partials/navTabs/navTabsInventary.php' ?>

        <div class="product-container">
            <h2>Modificar Producto</h2>

            <form action="/products/update" method="POST">
                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                <div class="product-form-group">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
                </div>
                <div class="product-form-group">
                    <label for="description">Descripción</label>
                    <textarea id="description" name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea>
                </div>
                <div class="product-form-group">
                    <label for="price">Precio</label>
                    <input type="number" step="0.01" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>
                </div>
                <div class="product-form-group">
                    <label for="stock">Stock</label>
                    <input type="number" id="stock" name="stock" value="<?php echo htmlspecialchars($product['stock']); ?>" required>
                </div>
                <div class="product-form-group">
                    <label for="category_id">Categoría</label>
                    <select id="category_id" name="category_id" required>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo htmlspecialchars($category['id']); ?>" <?php if ($category['id'] == $product['category_id']) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($category['name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="product-button">Guardar Cambios</button>
            </form>
        </div>
    </section>

    <footer>
        <?php
        require_once('../src/Views/footer.php'); ?>
    </footer>
</body>

</html>