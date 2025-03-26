<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-semibold text-gray-800">Catálogo de Productos para Mascotas</h2>
            <a href="/" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Inicio</a>
        </div>

        <!-- Nuevo Producto: Chaleco con Chip para Rastrear tu Mascota -->
        <h3 class="text-2xl font-semibold text-blue-600 border-b-2 border-blue-600 pb-2 mb-6">Nuevo Producto</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-2xl transform transition-all hover:scale-105">
                <img src="../assets/imgs/pecho.png" alt="Chaleco con chip" class="w-full h-64 object-contain rounded-md mb-4">
                <h5 class="text-xl font-bold text-gray-800">Chaleco con Chip para Rastrear tu Mascota</h5>
                <p class="text-gray-600 mb-4">Chaleco de alta tecnología con un chip integrado para rastrear la ubicación de tu mascota en todo momento. Podrás rastrearla fácilmente desde nuestra app Furryss.</p>
                <p class="text-lg font-semibold text-gray-800"><strong>Precio: </strong>$60.000</p>
            </div>
        </div>

        <!-- Alimentos -->
        <h3 class="text-2xl font-semibold text-blue-600 border-b-2 border-blue-600 pb-2 mb-6">Alimentos</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-2xl transform transition-all hover:scale-105">
                <img src="https://images.unsplash.com/photo-1589924691995-400dc9ecc119" alt="Comida Premium" class="w-full h-48 object-cover rounded-md mb-4">
                <h5 class="text-xl font-bold text-gray-800">Comida Premium para Perros</h5>
                <p class="text-gray-600 mb-4">Alimento balanceado de alta calidad para todas las razas.</p>
                <p class="text-lg font-semibold text-gray-800"><strong>Precio: </strong>$45.000</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-2xl transform transition-all hover:scale-105">
                <img src="https://images.unsplash.com/photo-1568640347023-a616a30bc3bd" alt="Snacks Naturales" class="w-full h-48 object-cover rounded-md mb-4">
                <h5 class="text-xl font-bold text-gray-800">Snacks Naturales</h5>
                <p class="text-gray-600 mb-4">Premios saludables hechos con ingredientes naturales.</p>
                <p class="text-lg font-semibold text-gray-800"><strong>Precio: </strong>$15.000</p>
            </div>
        </div>

        <!-- Juguetes -->
        <h3 class="text-2xl font-semibold text-blue-600 border-b-2 border-blue-600 pb-2 mt-8 mb-6">Juguetes</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-2xl transform transition-all hover:scale-105">
                <img src="https://images.unsplash.com/photo-1576201836106-db1758fd1c97" alt="Pelota Resistente" class="w-full h-48 object-cover rounded-md mb-4">
                <h5 class="text-xl font-bold text-gray-800">Pelota Ultra Resistente</h5>
                <p class="text-gray-600 mb-4">Juguete duradero para masticadores intensos.</p>
                <p class="text-lg font-semibold text-gray-800"><strong>Precio: </strong>$25.000</p>
            </div>x|
        </div>

        <!-- Accesorios -->
        <h3 class="text-2xl font-semibold text-blue-600 border-b-2 border-blue-600 pb-2 mt-8 mb-6">Accesorios</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-2xl transform transition-all hover:scale-105">
                <img src="https://images.unsplash.com/photo-1583511655857-d19b40a7a54e" alt="Cama Mascota" class="w-full h-48 object-cover rounded-md mb-4">
                <h5 class="text-xl font-bold text-gray-800">Cama Ortopédica</h5>
                <p class="text-gray-600 mb-4">Cama memory foam para máximo confort.</p>
                <p class="text-lg font-semibold text-gray-800"><strong>Precio: </strong>$85.000</p>
            </div>
        </div>
    </div>

</body>
</html>
