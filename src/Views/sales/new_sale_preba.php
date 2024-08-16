<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Venta</title>
    <!-- Incluye tus estilos CSS aquí -->
</head>

<body>
    <div class="container">
        <h1>Registrar Venta</h1>
        <form action="/sales/store" method="POST">
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

            <div class="form-group">
                <label for="price">Precio</label>
                <input type="text" id="price" name="price" readonly>
            </div>

            <div class="form-group">
                <label for="quantity">Cantidad</label>
                <input type="number" id="quantity" name="quantity" required>
            </div>

            <button type="submit" class="btn btn-primary">Registrar Venta</button>
        </form>

    </div>

    <script>
        let productIndex = 1;

        function addProduct() {
            const container = document.getElementById('products-container');
            const newProduct = document.createElement('div');
            newProduct.classList.add('product-item');
            newProduct.innerHTML = `
                <label for="product">Producto:</label>
                <select name="products[${productIndex}][product_id]" required>
                    <?php foreach ($products as $product): ?>
                        <option value="<?php echo htmlspecialchars($product['id']); ?>">
                            <?php echo htmlspecialchars($product['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label for="quantity">Cantidad:</label>
                <input type="number" name="products[${productIndex}][quantity]" min="1" required>

                <label for="price">Precio:</label>
                <input type="number" step="0.01" name="products[${productIndex}][price]" required>
            `;
            container.appendChild(newProduct);
            productIndex++;
        }

        function updatePrice() {
            var productSelect = document.getElementById('product');
            var selectedOption = productSelect.options[productSelect.selectedIndex];
            var price = selectedOption.getAttribute('data-price');
            document.getElementById('price').value = price;
        }
    </script>
</body>

</html>