<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php require_once '..\src\Views\partials\sidebar.php' ?>
        <main class="content">
            <div class="intro-section">
                <div class="intro-title">
                    <h1>Sección de Usuarios</h1>
                </div>
                <div class="intro-description">
                    <p>Un registro completo de todos los usuarios registrados en el sistema, 
                        incluyendo información como nombre completo, correo electrónico, roles y datos de contacto.
                    </p>
                </div>
            </div>

            <div class="separator"></div>
            <?php require_once '..\src\Views\partials\navTabs\navTabsUsers.php' ?>
            <div class="separator"></div>

            <div class="user-section">
                <h2>Lista de Usuarios</h2>
                <div class="user-list">
                    <?php if (!empty($users)) : ?>
                        <?php foreach ($users as $user) : ?>
                            <div class="user-container">
                                <div class="description-user">
                                    <div class="user-image">
                                        <img src="/images/users/perfil.png" alt="Imagen de perfil">
                                    </div>
                                    <div class="user-details">
                                        <h3><?php echo htmlspecialchars($user['first_name']); ?></h3>
                                        <p>Apellido: <?php echo htmlspecialchars($user['Last_name']); ?> </p>
                                        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
                                        <p>Telefono: <?php echo htmlspecialchars($user['phone']); ?></p>
                                        <p>Dirección: <?php echo htmlspecialchars($user['Address']); ?></p>
                                        <p>Tipo de usuario: <?php echo htmlspecialchars($user['user_type_id']); ?></p>
                                    </div>
                                </div>
                                <div class="user-actions">
                                    <form action="/users/delete" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este usuario?');" style="display:inline-block;">
                                        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user['id']); ?>">
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                    <form action="/users/alter" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user['id']); ?>">
                                        <button type="submit" class="btn btn-primary">Modificar</button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No hay usuarios registrados.</p>
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