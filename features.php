<?php
// sections/features.php - Sección de características del concesionario
?>

<section id="features" class="py-5 bg-light">
    <div class="container py-5">
        <h2 class="text-center mb-5 display-5 fw-bold">Por qué elegir <span class="text-primary">Xuri</span></h2>
        <div class="row g-4">
            <!-- Característica 1 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-effect">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-circle p-3 mb-3 mx-auto">
                            <i class="bi bi-check-circle-fill fs-2"></i>
                        </div>
                        <h3 class="h4">Garantía Certificada</h3>
                        <p class="mb-0">Todos nuestros vehículos incluyen 2 años de garantía con cobertura total en nuestra red de talleres asociados.</p>
                    </div>
                </div>
            </div>
            
            <!-- Característica 2 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-effect">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-circle p-3 mb-3 mx-auto">
                            <i class="bi bi-currency-euro fs-2"></i>
                        </div>
                        <h3 class="h4">Financiación Flexible</h3>
                        <p class="mb-0">Opciones de pago adaptadas a tus necesidades, con las mejores condiciones del mercado y respuesta en 24h.</p>
                    </div>
                </div>
            </div>
            
            <!-- Característica 3 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-effect">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-circle p-3 mb-3 mx-auto">
                            <i class="bi bi-shield-lock fs-2"></i>
                        </div>
                        <h3 class="h4">Inspección 360°</h3>
                        <p class="mb-0">Cada vehículo pasa por nuestro exhaustivo proceso de revisión de 150 puntos antes de su venta.</p>
                    </div>
                </div>
            </div>
            
            <!-- Característica 4 -->
            <div class="col-md-4 mt-4">
                <div class="card h-100 border-0 shadow-sm hover-effect">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-circle p-3 mb-3 mx-auto">
                            <i class="bi bi-truck fs-2"></i>
                        </div>
                        <h3 class="h4">Entrega Nacional</h3>
                        <p class="mb-0">Te llevamos el vehículo a cualquier punto de la península sin costes adicionales.</p>
                    </div>
                </div>
            </div>
            
            <!-- Característica 5 -->
            <div class="col-md-4 mt-4">
                <div class="card h-100 border-0 shadow-sm hover-effect">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-circle p-3 mb-3 mx-auto">
                            <i class="bi bi-arrow-repeat fs-2"></i>
                        </div>
                        <h3 class="h4">Prueba 7 Días</h3>
                        <p class="mb-0">Periodo de prueba con devolución gratuita si no quedas satisfecho con tu compra.</p>
                    </div>
                </div>
            </div>
            
            <!-- Característica 6 -->
            <div class="col-md-4 mt-4">
                <div class="card h-100 border-0 shadow-sm hover-effect">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-circle p-3 mb-3 mx-auto">
                            <i class="bi bi-person-heart fs-2"></i>
                        </div>
                        <h3 class="h4">Asesor Personal</h3>
                        <p class="mb-0">Un experto te acompañará durante todo el proceso de compra y postventa.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .hover-effect {
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.05);
    }
    
    .hover-effect:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        border-color: var(--primary);
    }
    
    .icon-box {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .hover-effect:hover .icon-box {
        background-color: var(--primary) !important;
        color: white !important;
    }
</style>