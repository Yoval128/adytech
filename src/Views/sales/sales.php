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
                    <h1>Consulta de Ventas</h1>
                </div>
                <div class="intro-description">
                    <p>Explora y analiza todas tus transacciones comerciales.</p>
                </div>
            </div>

            <div class="separator"></div>
            <?php require_once '..\src\Views\partials\navTabs\navTabsSale.php' ?>
            <div class="separator"></div>

            <div class="sales-section">
                <h2>Lista de Ventas</h2>
                <div class="sales-list">
                    <?php if (!empty($sales)) : ?>
                        <?php foreach ($sales as $sale) : ?>
                            <div class="sales-container">
                                <div class="description-sales">
                                    <div class="sale-details">
                                        <p>Fecha: <br> <?php echo htmlspecialchars($sale['date']); ?></p>
                                        <p>Vendedor:  <br> <?php echo htmlspecialchars($sale['seller_name']); ?></p>
                                        <p>Usuario ID:  <br> <?php echo htmlspecialchars($sale['user_id']); ?></p>
                                        <p>Total:  <br> <?php echo htmlspecialchars($sale['total']); ?></p>
                                    </div>
                                </div>
                                
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No hay ventas registradas.</p>
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
