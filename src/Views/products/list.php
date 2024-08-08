<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <?php
    require_once '../src/Views/partials/sidebar.php'
    ?>

    <div id="content">
        <section id="welcome-section">
            <div class="section-title">
                <h2>Productos en almacen</h2>
            </div>
            <div class="section descrition">
                <p>En el módulo PRODUCTOS podrá agregar nuevos productos al sistema, actualizar datos de los productos, eliminar o actualizar la imagen de los productos, imprimir códigos de barras o SKU de cada producto, buscar productos en el sistema, ver todos los productos en almacén, ver los productos más vendido y filtrar productos por categoría.
                </p>
            </div>
            <?php require_once '../src/Views/partials/navTabs/navTabsInventary.php' ?>
            <section class="list-section">
             
                <div class="table-container">
                    <table>
                        <!-- <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Categoría ID</th>
                                <th>Acciones</th>
                            </tr>
                        </thead> -->
                        <tbody>
                            <?php if (!empty($products)) : ?>
                                <?php foreach ($products as $product) : ?>
                                 
                                    <tr class="section-list-products">
                                        <td> <?php echo htmlspecialchars($product['id']); ?></td>
                                       
                                       
                                        <td>Descripción: <?php echo htmlspecialchars($product['description']); ?></td>
                                        <td>Precio: <?php echo htmlspecialchars($product['price']); ?> MX$ </td>
                                        <td>Stock<?php echo htmlspecialchars($product['stock']); ?></td>
                                        <td>Categoría ID:<?php echo htmlspecialchars($product['category_id']); ?></td>
                                        <td>
                                            <form action="/products/delete" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este producto?');" style="display:inline-block;">
                                                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                            <form action="/products/alter" method="POST" style="display:inline-block;">
                                                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                                                <button type="submit" class="btn btn-primary">Modificar</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="7">No hay productos disponibles.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
    </div>



    <footer>
        <?php
        require_once('../src/Views/footer.php');
        ?>
    </footer>
    <!-- <footer>
        <div class="footer-content">
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook">Facebook</i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy; <a href="#">AdyTech</a> </p>
            <div class="footer-menu">
                <ul class="f-menu">
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </div>
        </div>
    </footer> -->
</body>

</html>