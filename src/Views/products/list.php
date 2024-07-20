<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
<nav class="navbar">
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="#" class="nav-link">Productos</a>
                <ul class="submenu">
                    <li><a href="#" class="submenu-link">Agregar producto</a></li>
                    <li><a href="#" class="submenu-link">Lista de productos</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Usuarios</a>
                <ul class="submenu">
                    <li><a href="#" class="submenu-link">Agregar usuario</a></li>
                    <li><a href="#" class="submenu-link">Lista de usuarios</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <section class="list-section">
        <div id="header">
            <h2>Lista de Productos</h2>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Categoría ID</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($products)) : ?>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($product['id']); ?></td>
                                <td><?php echo htmlspecialchars($product['name']); ?></td>
                                <td><?php echo htmlspecialchars($product['description']); ?></td>
                                <td><?php echo htmlspecialchars($product['price']); ?></td>
                                <td><?php echo htmlspecialchars($product['stock']); ?></td>
                                <td><?php echo htmlspecialchars($product['category_id']); ?></td>
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

    <footer>
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
    </footer>
</body>

</html>