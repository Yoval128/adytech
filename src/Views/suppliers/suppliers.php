<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Proveedores</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php require_once '..\src\Views\partials\sidebar.php' ?>
        <main class="content">
            <div class="intro-section">
                <div class="intro-title">
                    <h1>Proveedores Registrados</h1>
                </div>
                <div class="intro-description">
                    <p>Lista de todos los proveedores registrados en el sistema.</p>
                </div>
            </div>

            <div class="separator"></div>
            <?php require_once '..\src\Views\partials\navTabs\navTabsSuppliers.php' ?>
            <div class="separator"></div>

            <div class="suppliers-section">
                <h2>Lista de Proveedores</h2>
                <div class="suppliers-list">
                    <?php if (!empty($suppliers)) : ?>
                        <?php foreach ($suppliers as $supplier) : ?>
                            <div class="supplier-container">
                                <div class="description-suppliers">
                                    <div class="supplier-details">
                                        <h3><?php echo htmlspecialchars($supplier['name']); ?></h3>       
                                                                 
                                        <p>ID: <?php echo htmlspecialchars($supplier['id']); ?></p>                              
                                        <p>Contacto: <?php echo htmlspecialchars($supplier['contact']); ?></p>
                                        <p>Teléfono: <?php echo htmlspecialchars($supplier['phone']); ?></p>
                                        <p>Email: <?php echo htmlspecialchars($supplier['email']); ?></p>
                                        <p>Dirección: <?php echo htmlspecialchars($supplier['address']); ?></p>

                                    </div>
                                </div>
                                <div class="supplier-actions">
                                    <form action="/suppliers/alter" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="supplier_id" value="<?php echo htmlspecialchars($supplier['id']); ?>">
                                        <button type="submit" class="btn btn-primary">Modificar</button>
                                    </form>
                                    <form action="/suppliers/delete" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este proveedor?');" style="display:inline-block;">
                                        <input type="hidden" name="supplier_id" value="<?php echo htmlspecialchars($supplier['id']); ?>">
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No hay proveedores registrados.</p>
                    <?php endif; ?>
                </div>
            </div>

        </main>
    </div>
</body>

<footer>
    <p>Hola mundo</p>
</footer>

<script src="\js\scripts.js"></script>

</html>