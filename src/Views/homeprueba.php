<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        #sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        #sidebar h2 {
            margin-bottom: 20px;
        }

        #sidebar ul {
            list-style: none;
            padding: 0;
        }

        #sidebar ul li {
            margin: 10px 0;
        }

        #sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        #sidebar ul li a img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        #sidebar .submenu {
            margin-left: 20px;
            display: none;
        }

        #sidebar .submenu li {
            margin: 5px 0;
        }

        #sidebar .submenu-toggle {
            cursor: pointer;
        }

        #content {
            flex: 1;
            padding: 20px;
            background-color: #fff;
            color: #333;
        }

        #header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f2f2f2;
            border-bottom: 1px solid #ccc;
        }

        #welcome-section {
            margin-top: 20px;
        }

        .option-box {
            width: 18%;
            padding: 20px;
            margin: 1%;
            background-color: #fff;
            border: 1px solid #ccc;
            text-align: center;
            display: inline-block;
            vertical-align: top;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .option-box img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }

        .option-box h4 {
            margin-bottom: 10px;
        }

        .option-box p {
            color: #666;
        }
    </style>
</head>

<body>
    <div id="sidebar">
        <h2>Tienda</h2>
        <hr style="border: 1px solid #555;">
        <ul>
            <li><a href="/"><img src="path/to/icon.png" alt="Inicio">Inicio</a></li>
            <li><a href="#"><img src="path/to/icon.png" alt="Opción 1">Opción Menú 1</a></li>
            <li><a href="#"><img src="path/to/icon.png" alt="Opción 2">Opción Menú 2</a></li>
            <li><a href="#"><img src="path/to/icon.png" alt="Opción 3">Opción Menú 3</a></li>
            <li><a href="#"><img src="path/to/icon.png" alt="Opción 4">Opción Menú 4</a></li>
            <li><a href="#"><img src="path/to/icon.png" alt="Opción 5">Opción Menú 5</a></li>
            <li class="submenu-toggle"><img src="path/to/icon.png" alt="Más">Más <span>+</span></li>
            <ul class="submenu">
                <li><a href="#">Inventario</a></li>
                <li><a href="#">Código de Barras</a></li>
                <li><a href="#">Opción Menú 6</a></li>
                <li><a href="#">Opción Menú 7</a></li>
            </ul>
        </ul>
    </div>

    <div id="content">
        <div id="header">
            <h1>Adytech</h1>
            <span>Usuario: [Nombre Usuario]</span>
        </div>
        <div id="welcome-section">
            <h2>Bienvenido, elija una opción</h2>
            <div class="option-box">
                <img src="path/to/icon.png" alt="Icono 1">
                <h4>Realizar una venta</h4>
                <p>Haz clic para realizar la venta</p>
            </div>
            <div class="option-box">
                <img src="path/to/icon.png" alt="Icono 2">
                <h4>Opción 2</h4>
                <p>Descripción de la opción 2</p>
            </div>
            <div class="option-box">
                <img src="path/to/icon.png" alt="Icono 3">
                <h4>Opción 3</h4>
                <p>Descripción de la opción 3</p>
            </div>
            <div class="option-box">
                <img src="path/to/icon.png" alt="Icono 4">
                <h4>Opción 4</h4>
                <p>Descripción de la opción 4</p>
            </div>
            <div class="option-box">
                <img src="path/to/icon.png" alt="Icono 5">
                <h4>Opción 5</h4>
                <p>Descripción de la opción 5</p>
            </div>
            <div class="option-box">
                <img src="path/to/icon.png" alt="Icono 6">
                <h4>Opción 6</h4>
                <p>Descripción de la opción 6</p>
            </div>
            <div class="option-box">
                <img src="path/to/icon.png" alt="Icono 7">
                <h4>Opción 7</h4>
                <p>Descripción de la opción 7</p>
            </div>
            <div class="option-box">
                <img src="path/to/icon.png" alt="Icono 8">
                <h4>Opción 8</h4>
                <p>Descripción de la opción 8</p>
            </div>
            <div class="option-box">
                <img src="path/to/icon.png" alt="Icono 9">
                <h4>Opción 9</h4>
                <p>Descripción de la opción 9</p>
            </div>
            <div class="option-box">
                <img src="path/to/icon.png" alt="Icono 10">
                <h4>Opción 10</h4>
                <p>Descripción de la opción 10</p>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.submenu-toggle').addEventListener('click', function() {
            const submenu = document.querySelector('.submenu');
            submenu.style.display = submenu.style.display === 'none' || submenu.style.display === '' ? 'block' : 'none';
        });
    </script>
</body>

</html>
