<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <section class="register-section">
        <div class="register-container">
            <div class="register-form-wrapper">
                <h2>Registro</h2>
                <form action="/register" method="post">
                    <div class="register-form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="register-form-group">
                        <label for="correo">Correo</label>
                        <input type="email" id="correo" name="correo" required>
                    </div>
                    <div class="register-form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit" class="register-button">Guardar</button>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <h3>AdyTech</h3>
            <ul class="socials">
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Instagram</a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy; <a href="#">AdyTech</a> </p>
            <div class="footer-menu">
                <ul class="f-menu">
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>