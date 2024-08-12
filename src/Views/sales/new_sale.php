<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php session_start(); ?>
</head>

<body>
    <div class="container">
        <?php require_once '../src/Views/partials/sidebar.php'; ?>
        <main class="content">
            <div class="intro-section">
                <div class="intro-title">
                    <h1>Agregar nuevos Productos</h1>
                </div>
                <div class="intro-description">
                    <p>Descripción.</p>
                </div>
            </div>

            <div class="separator"></div>
            <?php require_once '../src/Views/partials/navTabs/navTabsSale.php'; ?>
            <div class="separator"></div>

            <div class="sale-section">
                <div class="main-content">
                    <div class="sale-container">
                        <div class="sale-details">
                            <div class="section-title">
                                <h2>Datos de Venta</h2>
                            </div>
                            <div class="sale-info">

                                <p>Fecha: <?php echo date("Y-m-d"); ?></p>
                                <p>ID Empleado: <?php echo htmlspecialchars($_SESSION['id']); ?></p>
                                <p>Nombre: <?php echo htmlspecialchars($_SESSION['name']); ?></p>
                            </div>
                            <div class="payment-calculation">
                                <div class="form-group">
                                    <label for="discount">Descuento</label>
                                    <input type="number" id="discount" name="discount" step="0.01" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="money_received">Dinero Recibido</label>
                                    <input type="number" id="money_received" name="money_received" step="0.01" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="change">Cambio</label>
                                    <input type="number" id="change" name="change" step="0.01" class="form-control" readonly>
                                </div>

                            </div>
                            <div class="sale-summary">
                                <p>Subtotal: MX$</p>
                                <p>Descuentos: MX$</p>
                                <p>Total a Pagar: MX$</p>
                            </div>
                        </div>

                        <div class="product-selection">
                            <div class="action-row">
                                <button type="submit" class="btn btn-primary">Comprar</button>
                                <form action="/cart/add" method="POST">
                                    <input type="text" id="search_input" placeholder="Buscar productos" class="search-box">
                                    <button type="submit" id="add_to_cart" class="btn btn-secondary">Agregar al Carrito</button>
                                </form>

                            </div>

                            <div class="product-list">
                                <table id="product_table">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Precio</th>
                                            <th>Categoría</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <button type="button" id="remove_selected" class="btn btn-danger">Remover Seleccionados</button>
                        </div>


                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>