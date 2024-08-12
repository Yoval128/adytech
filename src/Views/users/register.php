<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <?php require_once '..\src\Views\partials\sidebar.php' ?>
        <main class="content">
            <div class="intro-section">
                <div class="intro-title">
                    <h1>Agregar nuevos Usuarios</h1>
                </div>
                <div class="intro-description">
                    <p>Descripción.</p>
                </div>
            </div>

            <div class="separator"></div>
            <?php require_once '..\src\Views\partials\navTabs\navTabsUsers.php' ?>
            <div class="separator"></div>

            <div class="user-products-section">
                <section class="register-section">
                    <div class="form-container">
                        <div class="form-title">
                            <h1>Registro de Usuario</h1>
                        </div>
                        <div class="form-description">
                            <p>Complete los siguientes campos para registrar un nuevo usuario.</p>
                        </div>

                        <form action="/register" method="post">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input type="email" id="correo" name="correo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
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