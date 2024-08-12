<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuarios</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <?php require_once '..\src\Views\partials\sidebar.php' ?>
        <main class="content">
            <div class="intro-section">
                <div class="intro-title">
                    <h1>Modificación de Usuarios y Empleados</h1>
                </div>
                <div class="intro-description">
                    <p>Descripción.</p>
                </div>
            </div>

            <div class="separator"></div>
            <?php require_once '..\src\Views\partials\navTabs\navTabsUsers.php' ?>
            <div class="separator"></div>

            <div class="user-upadte-section">
                <section class="alter-section">
                    <div class="container">
                        <div class="section-title">
                            <h2>Ingresa los nuevos detalles de: <br> <?php echo htmlspecialchars($user['first_name']); ?></h2>
                            <h3>Id de empleado: <?php echo htmlspecialchars($user['id']); ?></h3>
                        </div>
                        <form action="/users/update" method="POST">
                            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user['id']); ?>">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" required>
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