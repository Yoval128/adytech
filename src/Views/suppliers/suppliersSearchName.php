<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proveedores</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php require_once '..\src\Views\partials\sidebar.php' ?>
        <main class="content">
            <div class="intro-section">
                <div class="intro-title">
                    <h1>Busqueda de Proveedores</h1>
                </div>
                <div class="intro-description">
                    <p>Encuentra a los proveedores con los que trabajas en tu negocio. Explora la base de datos de proveedores y filtra por nombre.</p>
                </div>
            </div>

            <div class="separator"></div>
            <?php require_once '..\src\Views\partials\navTabs\navTabsSuppliers.php' ?>
            <div class="separator"></div>

            <div class="search-section">
                <h2>Nombre del Proveedor</h2>
                <form action="/suppliers/searchByName" method="GET">
                    <div class="form-group">
                        <label for="supplier_id">Nombre:</label>
                        <select class="form-control" id="supplier_id" name="supplier_id" required>
                            <option value="" disabled selected>Selecciona un proveedor</option>
                            <?php foreach ($suppliers as $supplierOption) : ?>
                                <option value="<?php echo htmlspecialchars($supplierOption['id']); ?>">
                                    <?php echo htmlspecialchars($supplierOption['name']); ?>
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
            <div class="suppliers-section">
            <h2>Datos del proveedor: 
    <?php echo isset($supplier['name']) ? htmlspecialchars($supplier['name']) : 'No seleccionado'; ?>
</h2>

<div class="suppliers-list">
    <?php if ($supplier) : ?>
        <div class="supplier-container">
            <div class="description-suppliers">
                <div class="supplier-details">
                    <p>ID: <?php echo isset($supplier['id']) ? htmlspecialchars($supplier['id']) : 'N/A'; ?></p>
                    <p>Contacto: <?php echo isset($supplier['contact']) ? htmlspecialchars($supplier['contact']) : 'N/A'; ?></p>
                    <p>Teléfono: <?php echo isset($supplier['phone']) ? htmlspecialchars($supplier['phone']) : 'N/A'; ?></p>
                    <p>Email: <?php echo isset($supplier['email']) ? htmlspecialchars($supplier['email']) : 'N/A'; ?></p>
                    <p>Dirección: <?php echo isset($supplier['address']) ? htmlspecialchars($supplier['address']) : 'N/A'; ?></p>
                </div>
            </div>
            <div class="supplier-actions">
                <!-- Aquí el formulario de modificación y eliminación -->
            </div>
        </div>
    <?php else : ?>
        <p>No se ha seleccionado ningún proveedor o el proveedor no existe.</p>
    <?php endif; ?>
</div>

            </div>


        </main>
    </div>
</body>

<footer>
    <script src="\js\scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</footer>

</html>