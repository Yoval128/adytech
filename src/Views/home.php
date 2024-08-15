<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <?php require_once '..\src\Views\partials\sidebar.php' ?>

        <main class="content">
            <div class="greeting-box">
                <h3>¡Hola, bienvenido al sistema de ventas, <?php
                                                            if (session_status() === PHP_SESSION_NONE) {
                                                                session_start();
                                                            }
                                                            echo htmlspecialchars($_SESSION['name']);
                                                            ?>!</h3>
                <div class="greeting-actions">
                    <form action="/logout" method="get">
                        <button type="submit">Cerrar Sesión</button>
                    </form>
                </div>
            </div>

            <div class="title-box">
                <h1>Panel de Control</h1>
            </div>
            <div class="description-box">
                <div class="menu-container">
                    <div class="menu-container">

                        <div class="menu-box">
                            <a href="/sales/create">
                                <div class="menu-icon">
                                    <img src="/images/icons/icon-shopping-bag.png" alt="Opción 2">
                                </div>
                                <div class="menu-title">
                                    <h2>Realizar una venta</h2>
                                </div>
                                <div class="menu-description">
                                    <p>Hacer una venta de un producto al cliente </p>
                                </div>
                            </a>
                        </div>

                        <div class="menu-box">
                            <a href="/products/list">
                                <div class="menu-icon">
                                    <img src="/images/icons/icon-inventory.png" alt="Opción 2">
                                </div>
                                <div class="menu-title">
                                    <h2>Inventario</h2>
                                </div>
                                <div class="menu-description">
                                    <p>Visualizar lista de productos, Registar, Eliminar, o Actualizar detalles productos</p>
                                </div>
                            </a>
                        </div>

                        <div class="menu-box">
                            <a href="/users/list">
                                <div class="menu-icon">
                                    <img src="/images/icons/icon-users.png" alt="Opción 4">
                                </div>
                                <div class="menu-title">
                                    <h2>Mis Empleados</h2>
                                </div>
                                <div class="menu-description">
                                    <p>Visualizar lista de productos, Registar, Eliminar, o Actualizar detalles de Empleados</p>
                                </div>
                            </a>
                        </div>
                        <div class="menu-box">
                            <a href="/suppliers/list">
                                <div class="menu-icon">
                                    <img src="/images/icons/icon-groups.png" alt="Opción 4">
                                </div>
                                <div class="menu-title">
                                    <h2>Mis Proveedores</h2>
                                </div>
                                <div class="menu-description">
                                    <p>Visualizar lista de Proveedores, Registar, Eliminar, o Actualizar detalles de los proveedores</p>
                                </div>
                            </a>
                        </div>

                        <div class="menu-box">
                            <a href="/category/list">
                                <div class="menu-icon">
                                    <img src="/images/icons/icon-category.png" alt="Opccion 5">
                                </div>
                                <div class="menu-title">
                                    <h2>Categorias</h2>
                                </div>
                                <div class="menu-description">
                                <p>Visualizar lista de Proveedores, Registar, Eliminar, o Actualizar detalles de las categorias</p>
                             
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <footer>
        <?php require_once __DIR__ . '/../Views/partials/footer.php';?>
    </footer>
</body>

</html>