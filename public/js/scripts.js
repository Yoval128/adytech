// Animacion del menu lateral
document.querySelectorAll('.menu-toggle').forEach(item => {
    item.addEventListener('click', () => {
        const submenu = item.nextElementSibling;

        submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
    });
});

// Funcion para calcula el carrito
document.addEventListener("DOMContentLoaded", function() {
    const moneyReceivedInput = document.getElementById('money_received');
    const totalToPay = <?php echo json_encode($total); ?>; 
    const changeInput = document.getElementById('change');

    moneyReceivedInput.addEventListener('input', function() {
        const moneyReceived = parseFloat(moneyReceivedInput.value) || 0;
        const change = moneyReceived - totalToPay;
        changeInput.value = change.toFixed(2); 
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('search_input');
    const addToCartButton = document.getElementById('add_to_cart');
    const productTableBody = document.getElementById('product_table').querySelector('tbody');
    const removeSelectedButton = document.getElementById('remove_selected');

    // Función para buscar productos
    searchInput.addEventListener('input', function() {
        const query = searchInput.value;
        if (query.length > 2) { // Realiza la búsqueda solo si el texto tiene más de 2 caracteres
            fetch(`/products/search?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(products => {
                    productTableBody.innerHTML = ''; // Limpiar resultados anteriores
                    products.forEach(product => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${product.name}</td>
                            <td>${product.description}</td>
                            <td>${product.price} MX$</td>
                            <td>${product.category_id}</td>
                            <td><button type="button" class="btn btn-primary add-to-cart" data-id="${product.id}">Agregar</button></td>
                        `;
                        productTableBody.appendChild(row);
                    });
                });
        } else {
            productTableBody.innerHTML = ''; // Limpiar resultados si la consulta es corta
        }
    });

    // Agregar productos al carrito
    productTableBody.addEventListener('click', function(event) {
        if (event.target.classList.contains('add-to-cart')) {
            const productId = event.target.getAttribute('data-id');
            // Aquí deberías enviar el ID del producto al servidor para agregarlo al carrito
            console.log('Agregar al carrito:', productId);
        }
    });

    // Eliminar productos seleccionados
    removeSelectedButton.addEventListener('click', function() {
        // Lógica para remover productos seleccionados del carrito
        console.log('Eliminar productos seleccionados');
    });
});

// Agregar productos al carrito
productTableBody.addEventListener('click', function(event) {
    if (event.target.classList.contains('add-to-cart')) {
        const productId = event.target.getAttribute('data-id');
        fetch('/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ product_id: productId }),
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                // Actualizar la interfaz o mostrar mensaje de éxito
                console.log('Producto agregado al carrito:', productId);
            } else {
                // Mostrar mensaje de error
                console.log('Error al agregar al carrito');
            }
        });
    }
});


