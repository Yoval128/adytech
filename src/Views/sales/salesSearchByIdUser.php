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
        <?php require_once __DIR__ . '/../partials/sidebar.php'; ?>
        <main class="content">
            <div class="intro-section">
                <div class="intro-title">
                    <h1>Búsqueda de ventas por nombre de empleado</h1>
                </div>
                <div class="intro-description">
                    <p>Analiza el desempeño individual de cada vendedor</p>
                </div>
            </div>

            <div class="separator"></div>
            <?php require_once '..\src\Views\partials\navTabs\navTabsSale.php' ?>
            <div class="separator"></div>

            <div class="search-section">
                <h2>Seleccionar Empleado</h2>
                <form action="/sales/searchByIdUser" method="GET">
                    <div class="form-group">
                        <label for="employee_id">Empleado:</label>
                        <select class="form-control" id="employee_id" name="employee_id" required>
                            <option value="" disabled selected>Selecciona un empleado</option>
                            <?php foreach ($employees as $employee) : ?>
                                <option value="<?php echo htmlspecialchars($employee['id']); ?>">
                                    <?php echo htmlspecialchars($employee['first_name'] . ' ' . $employee['Last_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-buttons">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </form>
            </div>

            <div class="separator"></div>

            <div class="user-section">
                <h2>Ventas del empleado</h2>
                <div class="sales-list">
                    <?php if (!empty($sales)) : ?>
                        <?php foreach ($sales as $sale) : ?>
                            <div class="sales-container">
                                <div class="description-sales">
                                    <div class="sale-details">
                                        <p>Fecha: <?php echo htmlspecialchars($sale['date']); ?></p>
                                        <p>Vendedor: <?php echo htmlspecialchars($sale['seller_name']); ?></p>
                                        <p>Usuario ID: <?php echo htmlspecialchars($sale['user_id']); ?></p>
                                        <p>Total: <?php echo htmlspecialchars($sale['total']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No hay ventas registradas para este empleado.</p>
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
