<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ventas</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php require_once '..\src\Views\partials\sidebar.php' ?>
        <main class="content">
            <div class="intro-section">
                <div class="intro-title">
                    <h1>Seccion de ventas</h1>
                </div>
                <div class="intro-description">
                    <p>Descripción.</p>
                </div>
            </div>

            <div class="separator"></div>
            <?php require_once '..\src\Views\partials\navTabs\navTabsInventary.php' ?>
            <div class="separator"></div>

            <div class="sales-section">
                <h2>Lista de Productos</h2>
               
            </div>

        </main>
    </div>
</body>

<footer>
    <p>Hola mundo</p>
</footer>

<script src="\js\scripts.js"></script>

</html>