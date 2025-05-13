<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionario Xuri - Venta de Vehículos</title>
    <?php include './includes/head.php'; ?>
    <style>
        .carousel-item img {
            height: 80vh;
            object-fit: cover;
            filter: brightness(0.6);
        }
        .carousel-caption {
            bottom: 30%;
        }
        .vehicle-modal-img {
            height: 300px;
            object-fit: cover;
            width: 100%;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Header -->
    <?php include './includes/header.php'; ?>
    
    <main class="flex-grow-1">
        <!-- Hero Carousel -->
        <section class="hero-section">
            <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="d-block w-100" alt="Coche deportivo">
                        <div class="carousel-caption">
                            <h1 class="display-4 fw-bold mb-4">Encuentra tu vehículo perfecto en Xuri</h1>
                            <p class="lead mb-4">Los mejores coches al mejor precio. Más de 15 años de experiencia en el sector automovilístico.</p>
                            <div class="d-flex gap-3 justify-content-center">
                                <a href="./login.php" class="btn btn-primary btn-lg px-4">Acceso clientes</a>
                                <a href="#vehiculos" class="btn btn-outline-light btn-lg px-4">Ver vehículos</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="d-block w-100" alt="Porsche 911">
                        <div class="carousel-caption">
                            <h1 class="display-4 fw-bold mb-4">Financiación a tu medida</h1>
                            <p class="lead mb-4">Te ayudamos a encontrar la mejor solución de financiación para tu nuevo vehículo.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="d-block w-100" alt="Audi A5">
                        <div class="carousel-caption">
                            <h1 class="display-4 fw-bold mb-4">Garantía de 2 años en todos nuestros vehículos</h1>
                            <p class="lead mb-4">Compra con total tranquilidad y confianza.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </section>

        <!-- Features Section (se mantiene igual) -->
        <?php include './features.php'; ?>

        <!-- Vehicle Gallery with Cart Functionality -->
        <section id="vehiculos" class="py-5">
            <div class="container py-5">
                <h2 class="text-center mb-5 display-5 fw-bold">Nuestros <span class="text-primary">Vehículos</span></h2>
                <div class="row g-4" id="vehicle-container">
                    <?php
                    // Simulación de datos - en un caso real esto vendría de una base de datos
                    $vehicles = [
                        ['id' => 1, 'marca' => 'Audi', 'modelo' => 'A5 Sportback', 'año' => 2022, 'km' => 25000, 'combustible' => 'Gasolina', 'precio' => 32900, 'imagen' => 'https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'],
                        ['id' => 2, 'marca' => 'Porsche', 'modelo' => '911 Carrera', 'año' => 2020, 'km' => 15000, 'combustible' => 'Gasolina', 'precio' => 89500, 'imagen' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'],
                        ['id' => 3, 'marca' => 'BMW', 'modelo' => 'X5 xDrive40i', 'año' => 2021, 'km' => 30000, 'combustible' => 'Híbrido', 'precio' => 45200, 'imagen' => 'https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'],
                        // Agrega más vehículos según necesites
                    ];
                    
                    foreach ($vehicles as $vehicle) {
                        echo '
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 overflow-hidden shadow-sm">
                                <img src="'.$vehicle['imagen'].'" class="card-img-top" alt="'.$vehicle['marca'].' '.$vehicle['modelo'].'">
                                <div class="card-body">
                                    <h5 class="card-title">'.$vehicle['marca'].' '.$vehicle['modelo'].'</h5>
                                    <p class="card-text text-muted">'.$vehicle['año'].' | '.number_format($vehicle['km']).' km | '.$vehicle['combustible'].'</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="h4 text-primary mb-0">€'.number_format($vehicle['precio'], 0, ',', '.').'</span>
                                        <button class="btn btn-sm btn-outline-primary view-details" data-bs-toggle="modal" data-bs-target="#vehicleModal" data-id="'.$vehicle['id'].'">Ver detalles</button>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <button class="btn btn-success w-100 add-to-cart" data-id="'.$vehicle['id'].'">
                                        <i class="bi bi-cart-plus me-2"></i>Añadir al carrito
                                    </button>
                                </div>
                            </div>
                        </div>';
                    }
                    ?>
                </div>
                <div class="text-center mt-5">
                    <button id="loadMoreBtn" class="btn btn-primary btn-lg px-4">Ver todos los vehículos</button>
                </div>
            </div>
        </section>

        <!-- Vehicle Modal -->
        <div class="modal fade" id="vehicleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalVehicleTitle"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img id="modalVehicleImage" src="" class="vehicle-modal-img mb-4 rounded" alt="">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Marca:</strong> <span id="modalVehicleBrand"></span></p>
                                <p><strong>Modelo:</strong> <span id="modalVehicleModel"></span></p>
                                <p><strong>Año:</strong> <span id="modalVehicleYear"></span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Kilometraje:</strong> <span id="modalVehicleKm"></span> km</p>
                                <p><strong>Combustible:</strong> <span id="modalVehicleFuel"></span></p>
                                <p><strong>Precio:</strong> <span id="modalVehiclePrice"></span></p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6>Características</h6>
                            <ul id="modalVehicleFeatures" class="list-group list-group-flush"></ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary add-to-cart-from-modal" data-id="">
                            <i class="bi bi-cart-plus me-2"></i>Añadir al carrito
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- All Vehicles Modal -->
        <div class="modal fade" id="allVehiclesModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Todos nuestros vehículos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="all-vehicles-container" class="row g-4"></div>
                        
                        <!-- Pagination -->
                        <nav aria-label="Page navigation" class="mt-5">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Anterior</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Siguiente</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Shopping Cart Sidebar -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="shoppingCart" aria-labelledby="shoppingCartLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="shoppingCartLabel">Mi Carrito</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div id="cart-items-container">
                    <p class="text-muted">Tu carrito está vacío</p>
                </div>
                <div class="mt-auto border-top pt-3">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Total:</h6>
                        <h6 id="cart-total">€0.00</h6>
                    </div>
                    <button id="checkout-btn" class="btn btn-primary w-100" disabled>Finalizar Compra</button>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include './includes/footer.php'; ?>

    <!-- Scripts -->
    <?php include './includes/scripts.php'; ?>
    
    <script>
        // Datos de vehículos simulados (en un caso real esto vendría de una API o base de datos)
        const allVehicles = [
            <?php
            // Generamos más vehículos para el modal
            for ($i = 4; $i <= 48; $i++) {
                $brands = ['Audi', 'BMW', 'Mercedes', 'Porsche', 'Volkswagen', 'Seat', 'Ford', 'Toyota'];
                $models = ['A4', 'A6', '320i', 'X5', 'C-Class', 'E-Class', '911', 'Cayenne', 'Golf', 'Leon', 'Focus', 'Corolla'];
                $fuels = ['Gasolina', 'Diésel', 'Híbrido', 'Eléctrico'];
                
                $brand = $brands[array_rand($brands)];
                $model = $models[array_rand($models)];
                $year = rand(2018, 2023);
                $km = rand(1000, 80000);
                $fuel = $fuels[array_rand($fuels)];
                $price = rand(15000, 120000);
                
                echo '{
                    id: '.$i.',
                    marca: "'.$brand.'",
                    modelo: "'.$model.'",
                    año: '.$year.',
                    km: '.$km.',
                    combustible: "'.$fuel.'",
                    precio: '.$price.',
                    imagen: "https://images.unsplash.com/photo-'.rand(1500000000, 1600000000).'?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80",
                    features: ["Asientos de cuero", "Sistema de navegación", "Cámara de marcha atrás", "Control crucero"]
                },';
            }
            ?>
        ];

        // Carrito de compras
        let shoppingCart = JSON.parse(localStorage.getItem('shoppingCart')) || [];
        
        // Mostrar vehículo en modal
        document.querySelectorAll('.view-details').forEach(button => {
            button.addEventListener('click', function() {
                const vehicleId = parseInt(this.getAttribute('data-id'));
                const vehicle = [...$vehicles, ...allVehicles].find(v => v.id === vehicleId);
                
                if (vehicle) {
                    document.getElementById('modalVehicleTitle').textContent = `${vehicle.marca} ${vehicle.modelo}`;
                    document.getElementById('modalVehicleImage').src = vehicle.imagen;
                    document.getElementById('modalVehicleBrand').textContent = vehicle.marca;
                    document.getElementById('modalVehicleModel').textContent = vehicle.modelo;
                    document.getElementById('modalVehicleYear').textContent = vehicle.año;
                    document.getElementById('modalVehicleKm').textContent = vehicle.km.toLocaleString();
                    document.getElementById('modalVehicleFuel').textContent = vehicle.combustible;
                    document.getElementById('modalVehiclePrice').textContent = `€${vehicle.precio.toLocaleString()}`;
                    
                    const featuresList = document.getElementById('modalVehicleFeatures');
                    featuresList.innerHTML = '';
                    vehicle.features.forEach(feature => {
                        const li = document.createElement('li');
                        li.className = 'list-group-item';
                        li.textContent = feature;
                        featuresList.appendChild(li);
                    });
                    
                    document.querySelector('.add-to-cart-from-modal').setAttribute('data-id', vehicle.id);
                }
            });
        });
        
        // Añadir al carrito
        function addToCart(vehicleId) {
            const vehicle = [...$vehicles, ...allVehicles].find(v => v.id === vehicleId);
            
            if (vehicle) {
                const existingItem = shoppingCart.find(item => item.id === vehicle.id);
                
                if (existingItem) {
                    existingItem.quantity += 1;
                } else {
                    shoppingCart.push({
                        id: vehicle.id,
                        marca: vehicle.marca,
                        modelo: vehicle.modelo,
                        precio: vehicle.precio,
                        imagen: vehicle.imagen,
                        quantity: 1
                    });
                }
                
                localStorage.setItem('shoppingCart', JSON.stringify(shoppingCart));
                updateCartUI();
                
                // Mostrar notificación
                const toast = new bootstrap.Toast(document.getElementById('addedToCartToast'));
                toast.show();
            }
        }
        
        // Actualizar interfaz del carrito
        function updateCartUI() {
            const cartContainer = document.getElementById('cart-items-container');
            const cartTotal = document.getElementById('cart-total');
            const checkoutBtn = document.getElementById('checkout-btn');
            
            if (shoppingCart.length === 0) {
                cartContainer.innerHTML = '<p class="text-muted">Tu carrito está vacío</p>';
                cartTotal.textContent = '€0.00';
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
                            <img src="${item.imagen}" class="img-fluid rounded-start" alt="${item.marca} ${item.modelo}" style="height: 80px; object-fit: cover;">
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
            
            cartContainer.innerHTML = html;
            cartTotal.textContent = `€${total.toLocaleString()}`;
            checkoutBtn.disabled = false;
            
            // Añadir eventos a los botones de eliminar
            document.querySelectorAll('.remove-from-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = parseInt(this.getAttribute('data-id'));
                    shoppingCart = shoppingCart.filter(item => item.id !== itemId);
                    localStorage.setItem('shoppingCart', JSON.stringify(shoppingCart));
                    updateCartUI();
                });
            });
        }
        
        // Cargar más vehículos
        document.getElementById('loadMoreBtn').addEventListener('click', function() {
            const modal = new bootstrap.Modal(document.getElementById('allVehiclesModal'));
            const container = document.getElementById('all-vehicles-container');
            
            // Mostrar primera página (12 vehículos)
            container.innerHTML = '';
            allVehicles.slice(0, 12).forEach(vehicle => {
                container.innerHTML += `
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100 overflow-hidden shadow-sm">
                        <img src="${vehicle.imagen}" class="card-img-top" alt="${vehicle.marca} ${vehicle.modelo}">
                        <div class="card-body">
                            <h5 class="card-title">${vehicle.marca} ${vehicle.modelo}</h5>
                            <p class="card-text text-muted">${vehicle.año} | ${vehicle.km.toLocaleString()} km | ${vehicle.combustible}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h4 text-primary mb-0">€${vehicle.precio.toLocaleString()}</span>
                                <button class="btn btn-sm btn-outline-primary view-details" data-bs-toggle="modal" data-bs-target="#vehicleModal" data-id="${vehicle.id}">Ver detalles</button>
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
            
            modal.show();
            
            // Añadir eventos a los nuevos botones
            document.querySelectorAll('#all-vehicles-container .view-details').forEach(button => {
                button.addEventListener('click', function() {
                    const vehicleId = parseInt(this.getAttribute('data-id'));
                    const vehicle = allVehicles.find(v => v.id === vehicleId);
                    
                    if (vehicle) {
                        // ... (mismo código que arriba para mostrar detalles)
                    }
                });
            });
            
            document.querySelectorAll('#all-vehicles-container .add-to-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const vehicleId = parseInt(this.getAttribute('data-id'));
                    addToCart(vehicleId);
                });
            });
        });
        
        // Eventos para añadir al carrito
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                const vehicleId = parseInt(this.getAttribute('data-id'));
                addToCart(vehicleId);
            });
        });
        
        document.querySelector('.add-to-cart-from-modal').addEventListener('click', function() {
            const vehicleId = parseInt(this.getAttribute('data-id'));
            addToCart(vehicleId);
        });
        
        // Finalizar compra
        document.getElementById('checkout-btn').addEventListener('click', function() {
            if (shoppingCart.length > 0) {
                // Enviar datos al servidor
                fetch('process_purchase.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        items: shoppingCart,
                        total: shoppingCart.reduce((sum, item) => sum + (item.precio * item.quantity), 0),
                        fecha: new Date().toISOString()
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Compra realizada con éxito!');
                        shoppingCart = [];
                        localStorage.removeItem('shoppingCart');
                        updateCartUI();
                        bootstrap.Offcanvas.getInstance(document.getElementById('shoppingCart')).hide();
                    } else {
                        alert('Error al procesar la compra: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al procesar la compra');
                });
            }
        });
        
        // Inicializar carrito al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            updateCartUI();
        });
    </script>
    
    <!-- Toast Notification -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="addedToCartToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success text-white">
                <strong class="me-auto">Carrito actualizado</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Vehículo añadido al carrito correctamente!
            </div>
        </div>
    </div>
</body>
</html>