<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <body>
        <nav id="sidebar">
            <h2>Tienda</h2>
            <hr>
            <ul>
                <li><a href="/"><img src="/images/icon-home.png" alt="Inicio">Inicio</a></li>
                <li><a href="#"><img src="/images/icon.png" alt="Opción 1">Opción Menú 1</a></li>
                <li><a href="#"><img src="/images/icon.png" alt="Opción 2">Opción Menú 2</a></li>
                <li><a href="#"><img src="/images/icon.png" alt="Opción 3">Opción Menú 3</a></li>
                <li><a href="#"><img src="/images/icon.png" alt="Opción 4">Opción Menú 4</a></li>
                <li><a href="#"><img src="/images/icon.png" alt="Opción 5">Opción Menú 5</a></li>
                <li class="submenu-toggle">
                    <img src="/images/icon-expand_circle_down.png" alt="Más">Más
                    <ul class="submenu">
                        <li><a href="#"><img src="/images/icon.png" alt="Submenú 1">Inventario</a></li>
                        <li><a href="#"><img src="/images/icon.png" alt="Submenú 2">Código de Barras</a></li>
                        <li><a href="#"><img src="/images/icon.png" alt="Submenú 3">Submenú 3</a></li>
                        <li><a href="#"><img src="/images/icon.png" alt="Submenú 4">Submenú 4</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="content">
            <header id="header">
                <div>
                    <?php
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    echo "Bienvenido, " . htmlspecialchars($_SESSION['name']);
                    ?>
                </div>
                <div>
                    <form action="/logout" method="get">
                        <button type="submit">Cerrar Sesión</button>
                    </form>
                </div>
            </header>

            <section id="welcome-section">
                <h2>Bienvenido a la Tienda</h2>
                <p>Elige una opción para comenzar</p>
                <div class="option-container">
                    <div class="option-box">
                        <a href="">
                            <img src="/images/icon-shopping-bag.png" alt="Opción 2">
                            <h4>Realizar una venta</h4>
                            <p>Hacer una venta de un producto al cliente </p>
                        </a>
                    </div>
                    <div class="option-box">
                        <a href="">
                            <img src="/images/icon-inventory.png" alt="Opción 2">
                            <h4>Inventario</h4>
                            <p>Visualizar lista de productos, Registar, Eliminar, o Actualizar detalles productos</p>
                        </a>
                    </div>
                    <div class="option-box">
                        <a href="/register">
                            <img src="/images/icon-group.png" alt="Opción 3">
                            <h4>Mis Proveedores</h4>
                            <p>Visualizar lista de productos, Registar, Eliminar, o Actualizar detalles de Proveedores</p>
                    </div>
                    </a>
                    <div class="option-box">
                        <img src="/images/icon-users.png" alt="Opción 4">
                        <h4>Mis Empleados</h4>
                        <p>Visualizar lista de productos, Registar, Eliminar, o Actualizar detalles de Empleados</p>
                    </div>
                </div>
            </section>
        </div>
    </body>
    <footer>
        <script src="/js/scripts.js"></script>
    </footer>

</html>