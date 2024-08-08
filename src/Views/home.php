<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <body>
        <?php
        require_once '../src/Views/partials/sidebar.php'
        ?>
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
                <h2>Panel de control</h2>
                <p>Elige una opción para comenzar</p>
                <div class="option-container">
                    <div class="option-box">
                        <a href="">
                            <img src="/images/icons/icon-shopping-bag.png" alt="Opción 2">
                            <h4>Realizar una venta</h4>
                            <p>Hacer una venta de un producto al cliente </p>
                        </a>
                    </div>
                    <div class="option-box">
                        <a href="/products/list">
                            <img src="/images/icons/icon-inventory.png" alt="Opción 2">
                            <h4>Inventario</h4>
                            <p>Visualizar lista de productos, Registar, Eliminar, o Actualizar detalles productos</p>
                        </a>
                    </div>
                    <div class="option-box">
                        <a href="/register">
                            <img src="/images/icons/icon-group.png" alt="Opción 3">
                            <h4>Mis Proveedores</h4>
                            <p>Visualizar lista de productos, Registar, Eliminar, o Actualizar detalles de Proveedores</p>
                    </div>
                    </a>
                    <div class="option-box">
                        <a href="/register">
                            <img src="/images/icons/icon-users.png" alt="Opción 4">
                            <h4>Mis Empleados</h4>
                            <p>Visualizar lista de productos, Registar, Eliminar, o Actualizar detalles de Empleados</p>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </body>
    <footer>
        <script src="/js/scripts.js"></script>

        <!-- <?php
                require_once '..\src\Views\partials\footer.php'
                ?> -->
    </footer>

</html>