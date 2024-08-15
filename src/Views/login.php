<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <section class="login-section">
        <div class="container-form">
            <div class="container-img">
                <img src="/images/logo/Ady-Tech-Logo.jpeg" alt="Logo">
            </div>
            <div class="container-group-form">
                <h2>LOGIN</h2>
                <form action="postLogin" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-bottom">
                        <button type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <footer>
        <?php require_once __DIR__ . '/../Views/partials/footer.php'; ?>
    </footer>

</body>

</html>