<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Venta</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <?php require_once '../src/Views/partials/sidebar.php'; ?>
        <main class="content">
            <div class="intro-section">
                <div class="intro-title">
                    <h1>Registrar Venta</h1>
                </div>
                <div class="intro-description">
                    <p>Ingrese los detalles de la venta y los productos.</p>
                </div>
            </div>

            <div class="separator"></div>
            <?php require_once '../src/Views/partials/navTabs/navTabsSale.php'; ?>
            <div class="separator"></div>

            <div class="sale-section">
                <div class="main-content">
                    <div class="buy-container">
                        <div class="buy-details">
                            <div class="section-title">
                                <h2>Datos de Venta</h2>
                            </div>
                            <div class="sale-info">
                                <p>Fecha: <?php echo date("Y-m-d"); ?></p>
                                <p>ID Empleado: <?php echo htmlspecialchars($_SESSION['id']); ?></p>
                                <p>Nombre: <?php echo htmlspecialchars($_SESSION['name']); ?></p>
                            </div>
                        </div>
                        <div class="sale-container">
                            <div class="buy-selection">
                                <form id="saleForm" action="/sales/store" method="POST">
                                    <div class="form-group">
                                        <label for="product">Producto</label>
                                        <select name="product_id" id="product" onchange="updatePrice()" required>
                                            <option value="" disabled selected>Seleccione un producto</option>
                                            <?php foreach ($products as $product): ?>
                                                <option value="<?php echo htmlspecialchars($product['id']); ?>" data-price="<?php echo htmlspecialchars($product['price']); ?>">
                                                    <?php echo htmlspecialchars($product['name']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>

                                    <div class="form-group-buy">
                                        <label for="price">Precio</label>
                                        <input type="text" id="price" name="price" readonly>
                                    </div>

                                    <div class="form-group-buy">
                                        <label for="quantity">Cantidad</label>
                                        <input type="number" id="quantity" name="quantity" required>
                                    </div>

                                    <button type="button" id="addToList" class="btn btn-primary">Agregar al Carrito</button>

                                    <input type="hidden" id="cart_data" name="cart_data" value="">
                                    <input type="hidden" id="date" name="date" value="<?php echo date("Y-m-d"); ?>">
                                    <input type="hidden" id="user_id" name="user_id" value="<?php echo htmlspecialchars($_SESSION['id']); ?>">

                                    <button type="submit" class="btn btn-success">Registrar Venta</button>
                                </form>
                            </div>
                            <div class="cart-summary">
                                <h3>Carrito</h3>
                                <table class="table" id="cartTable">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Total</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <div class="form-group-buy">
                                    <label for="total">Total</label>
                                    <input type="text" id="total" name="total" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <footer>
        <script src="/js/scripts.js"></script>
        <script src="/js/sales.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </footer>
</body>

</html>