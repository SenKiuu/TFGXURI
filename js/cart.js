let shoppingCart = JSON.parse(localStorage.getItem('shoppingCart')) || [];

function addToCart(vehicleId, quantity = 1) {
    fetch(`php/get_vehicles.php?id=${vehicleId}`)
        .then(response => response.json())
        .then(vehicle => {
            const existingItem = shoppingCart.find(item => item.id === vehicle.id);
            
            if (existingItem) {
                existingItem.quantity += quantity;
            } else {
                shoppingCart.push({
                    id: vehicle.id,
                    marca: vehicle.marca,
                    modelo: vehicle.modelo,
                    precio: vehicle.precio,
                    imagen: vehicle.imagen,
                    quantity: quantity
                });
            }
            
            saveCart();
            updateCartUI();
            showToast('Vehículo añadido al carrito');
        });
}

function removeFromCart(vehicleId) {
    shoppingCart = shoppingCart.filter(item => item.id !== vehicleId);
    saveCart();
    updateCartUI();
}

function saveCart() {
    localStorage.setItem('shoppingCart', JSON.stringify(shoppingCart));
    updateCartBadge();
}

function updateCartUI() {
    const container = document.getElementById('cart-items-container');
    const totalElement = document.getElementById('cart-total');
    const checkoutBtn = document.getElementById('checkout-btn');
    
    if (shoppingCart.length === 0) {
        container.innerHTML = '<p class="text-muted">Tu carrito está vacío</p>';
        totalElement.textContent = '€0.00';
        checkoutBtn.disabled = true;
        return;
    }
    
    let html = '';
    let total = 0;
    
    shoppingCart.forEach(item => {
        total += item.precio * item.quantity;
        
        html += `
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="${item.imagen}" class="img-fluid rounded-start" alt="${item.marca} ${item.modelo}">
                </div>
                <div class="col-md-8">
                    <div class="card-body py-2">
                        <h6 class="card-title">${item.marca} ${item.modelo}</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-primary">€${item.precio.toLocaleString()}</span>
                                <small class="text-muted"> x ${item.quantity}</small>
                            </div>
                            <button class="btn btn-sm btn-outline-danger remove-from-cart" data-id="${item.id}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;
    });
    
    container.innerHTML = html;
    totalElement.textContent = `€${total.toLocaleString()}`;
    checkoutBtn.disabled = false;
    
    // Añadir eventos a los botones de eliminar
    document.querySelectorAll('.remove-from-cart').forEach(btn => {
        btn.addEventListener('click', (e) => {
            removeFromCart(parseInt(e.target.closest('button').getAttribute('data-id')));
        });
    });
}

function updateCartBadge() {
    const badge = document.getElementById('cart-badge');
    const count = shoppingCart.reduce((sum, item) => sum + item.quantity, 0);
    badge.textContent = count;
    badge.style.display = count > 0 ? 'block' : 'none';
}

function checkout() {
    fetch('php/process_purchase.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            items: shoppingCart,
            total: calculateTotal()
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            shoppingCart = [];
            saveCart();
            showToast('Compra realizada con éxito', 'success');
        } else {
            showToast('Error al procesar la compra', 'danger');
        }
    });
}

function calculateTotal() {
    return shoppingCart.reduce((total, item) => total + (item.precio * item.quantity), 0);
}

function showToast(message, type = 'success') {
    const toast = new bootstrap.Toast(document.getElementById('toastNotification'));
    const toastBody = document.querySelector('#toastNotification .toast-body');
    
    toastBody.textContent = message;
    document.getElementById('toastNotification').querySelector('.toast').className = 
        `toast align-items-center text-white bg-${type} border-0`;
    
    toast.show();
}

// Inicialización
document.addEventListener('DOMContentLoaded', function() {
    updateCartBadge();
    
    document.getElementById('checkout-btn')?.addEventListener('click', checkout);
});