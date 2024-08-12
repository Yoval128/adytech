<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Proveedor</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <?php require_once '..\src\Views\partials\sidebar.php'; ?>
        <main class="content">
            <div class="intro-section">
                <div class="intro-title">
                    <h1>Alterar Informaciòn del Proveedor</h1>
                </div>
                <div class="intro-description">
                    <p>Llena los detalles a continuación para actualizar un proveedor.</p>
                </div>
            </div>

            <div class="separator"></div>
            <?php require_once '..\src\Views\partials\navTabs\navTabsSuppliers.php'; ?>
            <div class="separator"></div>

            <div class="supplier-section">
                <section class="alter-section">
                    <div class="container">
                        <div class="section-title">
                            <h2>Ingresa los nuevos detalles del proveedor: <br> <?php echo htmlspecialchars($supplier['name']); ?></h2>
                            <h3>Provedor con el Id: </h3>
                        </div>
                        <form action="/suppliers/update" method="POST">
                            <input type="hidden" name="supplier_id" value="<?php echo htmlspecialchars($supplier['id']); ?>">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($supplier['name']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contacto</label>
                                <input type="text" class="form-control" id="contact" name="contact" value="<?php echo htmlspecialchars($supplier['contact']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Teléfono</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($supplier['phone']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($supplier['email']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Dirección</label>
                                <textarea class="form-control" id="address" name="address" required><?php echo htmlspecialchars($supplier['address']); ?></textarea>
                            </div>
                            <div class="form-buttons">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </main>
    </div>


</body>

</html>