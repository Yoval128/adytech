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
        <aside class="sidebar">
            <h2>Título del Menú</h2>
            <div class="menu-item">
                <i class="icon-home"></i>
                <span>Home</span>
            </div>
            <div class="menu-item">
                <span class="menu-toggle">+ Registros</span>
                <div class="submenu">
                    <a href="#">Alta</a>
                    <a href="#">Eliminación</a>
                    <a href="#">Alterar</a>
                </div>
            </div>
            <div class="menu-item">
                <span class="menu-toggle">+ Inventario</span>
                <div class="submenu">
                    <a href="#">Alta</a>
                    <a href="#">Alterar</a>
                </div>
            </div>
            <div class="menu-item">
                <span class="menu-toggle">+ Más</span>
                <div class="submenu">
                    <a href="#">QR</a>
                    <a href="#">Estadísticas</a>
                </div>
            </div>
            <div class="menu-item">
                <span class="menu-toggle">+ Más</span>
                <div class="submenu">
                    <a href="#">QR</a>
                    <a href="#">Estadísticas</a>
                </div>
            </div>
            <div class="menu-item">
                <span class="menu-toggle">+ Más</span>
                <div class="submenu">
                    <a href="#">QR</a>
                    <a href="#">Estadísticas</a>
                </div>
            </div>
        </aside>

        <main class="content">
            <div class="greeting-box">
                <h3>¡Hola, bienvenido al sistema de ventas!</h3>
            </div>
            <div class="title-box">
                <h1>Panel de Control</h1>
            </div>
            <div class="description-box">
                <p>Aquí podrás gestionar todas las funcionalidades del sistema.</p>
            </div>
        </main>
    </div>
</body>

<footer>
    <p>Hola mundo</p>
</footer>

<script src="\js\scripts.js"></script>

</html>

<!-- <div id="header">
        <h2>Usuarios del sistema</h2>
    </div>

    <table>

        <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Id de tipo Usuario </th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user->getFullName(); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

        

    </table> -->