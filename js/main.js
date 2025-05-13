document.addEventListener('DOMContentLoaded', function() {
    // Inicialización general
    initCarousel();
    loadFeaturedVehicles();
    setupEventListeners();
});

function initCarousel() {
    const carousel = new bootstrap.Carousel('#mainCarousel', {
        interval: 5000,
        ride: 'carousel'
    });
}

async function loadFeaturedVehicles() {
    try {
        const response = await fetch('php/get_vehicles.php?limit=3');
        const vehicles = await response.json();
        renderVehicles(vehicles, '#vehicle-container');
    } catch (error) {
        console.error('Error loading vehicles:', error);
    }
}

function renderVehicles(vehicles, containerSelector) {
    const container = document.querySelector(containerSelector);
    container.innerHTML = '';
    
    vehicles.forEach(vehicle => {
        container.innerHTML += `
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 overflow-hidden shadow-sm">
                <img src="${vehicle.imagen}" class="card-img-top" alt="${vehicle.marca} ${vehicle.modelo}">
                <div class="card-body">
                    <h5 class="card-title">${vehicle.marca} ${vehicle.modelo}</h5>
                    <p class="card-text text-muted">${vehicle.año} | ${vehicle.km.toLocaleString()} km | ${vehicle.combustible}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="h4 text-primary mb-0">€${vehicle.precio.toLocaleString()}</span>
                        <button class="btn btn-sm btn-outline-primary view-details" 
                                data-bs-toggle="modal" 
                                data-bs-target="#vehicleModal" 
                                data-id="${vehicle.id}">
                            Ver detalles
                        </button>
                    </div>
                </div>
                <div class="card-footer bg-transparent">
                    <button class="btn btn-success w-100 add-to-cart" data-id="${vehicle.id}">
                        <i class="bi bi-cart-plus me-2"></i>Añadir al carrito
                    </button>
                </div>
            </div>
        </div>`;
    });
}

function setupEventListeners() {
    // Eventos de los vehículos
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('view-details')) {
            const vehicleId = parseInt(e.target.getAttribute('data-id'));
            showVehicleDetails(vehicleId);
        }
        
        if (e.target.classList.contains('add-to-cart')) {
            const vehicleId = parseInt(e.target.getAttribute('data-id'));
            addToCart(vehicleId);
        }
    });
    
    // Cargar más vehículos
    document.getElementById('loadMoreBtn')?.addEventListener('click', loadAllVehicles);
}

async function showVehicleDetails(vehicleId) {
    try {
        const response = await fetch(`php/get_vehicles.php?id=${vehicleId}`);
        const vehicle = await response.json();
        
        // Rellenar modal con los datos
        document.getElementById('modalVehicleTitle').textContent = `${vehicle.marca} ${vehicle.modelo}`;
        document.getElementById('modalVehicleImage').src = vehicle.imagen;
        // ... resto de campos
        
        // Configurar botón de añadir al carrito
        document.querySelector('.add-to-cart-from-modal').setAttribute('data-id', vehicle.id);
        
    } catch (error) {
        console.error('Error loading vehicle details:', error);
    }
}

async function loadAllVehicles() {
    try {
        const response = await fetch('php/get_vehicles.php');
        const vehicles = await response.json();
        
        const modal = new bootstrap.Modal('#allVehiclesModal');
        renderVehicles(vehicles, '#all-vehicles-container');
        modal.show();
        
    } catch (error) {
        console.error('Error loading all vehicles:', error);
    }
}