<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Total de Ventas por Fecha</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php require_once __DIR__ . '/../partials/sidebar.php'; ?>
        <main class="content">
            <div class="intro-section">
                <div class="intro-title">
                    <h1>Total de Ventas por Fecha</h1>
                </div>
                <div class="intro-description">
                    <p>Consulta el total de ventas agrupadas por fecha.</p>
                </div>
            </div>

            <div class="separator"></div>
            <form action="/sales/searchByDate" method="GET">
                <div class="form-group">
                    <label for="month">Seleccionar Mes y Año:</label>
                    <input type="month" id="month" name="month" class="form-control">
                </div>
                <div class="form-buttons">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                   <a href="sales/searchByDate">
                   <button type="submit" class="btn btn-danger">Limpiar Filtro</button>
                   </a>
                </div>
            </form>

            <div class="separator"></div>
            <div class="sales-section">
                <h2>Ventas por Fecha</h2>
                <div class="sales-list">
                    <?php if (!empty($salesByDate)) : ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Total Ventas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($salesByDate as $sale) : ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($sale['sale_date']); ?></td>
                                        <td><?php echo htmlspecialchars($sale['total_sales']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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