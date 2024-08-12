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
                    <h1>Registrar Proveedor</h1>
                </div>
                <div class="intro-description">
                    <p>Llena los detalles a continuación para agregar un nuevo proveedor.</p>
                </div>
            </div>

            <div class="separator"></div>
            <?php require_once '..\src\Views\partials\navTabs\navTabsSuppliers.php'; ?>
            <div class="separator"></div>

            <div class="providers-section">
                <section class="create-section">
                    <div class="container">
                        <div class="section-title">
                            <h2>Nuevo Proveedor</h2>
                        </div>
                        <form action="/suppliers/store" method="POST">
                            <div class="form-group">
                                <label for="name">Nombre del Proveedor</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Persona de Contacto</label>
                                <input type="text" class="form-control" id="contact" name="contact" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Teléfono</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="address ">Dirección</label>
                                <input type="text" class="form-control" id="address" name="address" required>

                            </div>
                            <div class="form-buttons">
                                <button type="submit" class="btn btn-primary">Registrar Proveedor</button>
                                
                                <button type="reset" class="btn btn-secondary">Limpiar</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </main>
    </div>


</body>

</html>
