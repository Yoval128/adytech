
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
    const productSelect = document.getElementById('product');
    const priceInput = document.getElementById('price');
    
    const selectedOption = productSelect.options[productSelect.selectedIndex];
    const price = selectedOption ? selectedOption.getAttribute('data-price') : '';

    priceInput.value = price;
}

document.addEventListener('DOMContentLoaded', () => {
    const addToListButton = document.getElementById('addToList');
    const cartTableBody = document.querySelector('#cartTable tbody');
    const totalInput = document.getElementById('total');
    const cartDataInput = document.getElementById('cart_data');

    let cart = [];

    addToListButton.addEventListener('click', () => {
        const productSelect = document.getElementById('product');
        const productId = productSelect.value;
        const productName = productSelect.options[productSelect.selectedIndex].text;
        const productPrice = parseFloat(productSelect.options[productSelect.selectedIndex].dataset.price);
        const quantityInput = document.getElementById('quantity');
        const quantity = parseInt(quantityInput.value);

        if (productId && quantity > 0) {
            const existingProductIndex = cart.findIndex(p => p.id === productId);
            if (existingProductIndex > -1) {
                cart[existingProductIndex].quantity += quantity;
            } else {
                cart.push({ id: productId, name: productName, price: productPrice, quantity });
            }

            updateCartTable();
            updateTotal();
        } else {
            alert('Por favor, seleccione un producto y cantidad válida.');
        }
    });

    function updateCartTable() {
        cartTableBody.innerHTML = '';
        cart.forEach(product => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${product.name}</td>
                <td>${product.price.toFixed(2)}</td>
                <td>
                    <input type="number" value="${product.quantity}" min="1" data-id="${product.id}" class="quantity-input">
                </td>
                <td>${(product.price * product.quantity).toFixed(2)}</td>
                <td><button class="btn btn-danger btn-sm" data-id="${product.id}">Eliminar</button></td>
            `;
            cartTableBody.appendChild(row);
        });

        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', (event) => {
                const productId = event.target.dataset.id;
                const quantity = parseInt(event.target.value);
                const productIndex = cart.findIndex(p => p.id === productId);
                if (productIndex > -1) {
                    cart[productIndex].quantity = quantity;
                    updateCartTable();
                    updateTotal();
                }
            });
        });

        document.querySelectorAll('.btn-danger').forEach(button => {
            button.addEventListener('click', (event) => {
                const productId = event.target.dataset.id;
                cart = cart.filter(p => p.id !== productId);
                updateCartTable();
                updateTotal();
            });
        });
    }

    function updateTotal() {
        const total = cart.reduce((sum, product) => sum + (product.price * product.quantity), 0);
        totalInput.value = total.toFixed(2);

        cartDataInput.value = JSON.stringify(cart);
    }
});


document.addEventListener('DOMContentLoaded', () => {
    const productSelect = document.getElementById('product');
    const priceInput = document.getElementById('price');

    productSelect.addEventListener('change', () => {
        const selectedOption = productSelect.options[productSelect.selectedIndex];
        const price = selectedOption.getAttribute('data-price');
        priceInput.value = price ? parseFloat(price).toFixed(2) : '';
    });
});