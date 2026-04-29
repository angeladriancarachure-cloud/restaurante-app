<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Categorías de Platillos
        DB::table('categorias_platillos')->insert([
            ['nombre_categoria' => 'Entradas', 'descripcion' => 'Platillos de entrada'],
            ['nombre_categoria' => 'Sopas', 'descripcion' => 'Sopas y caldos'],
            ['nombre_categoria' => 'Platos Fuertes', 'descripcion' => 'Platos principales'],
            ['nombre_categoria' => 'Postres', 'descripcion' => 'Postres y dulces'],
            ['nombre_categoria' => 'Bebidas', 'descripcion' => 'Bebidas frías y calientes'],
        ]);

        // Categorías de Productos
        DB::table('categorias_productos')->insert([
            ['nombre_categoria' => 'Carnes', 'descripcion' => 'Carnes y embutidos'],
            ['nombre_categoria' => 'Verduras', 'descripcion' => 'Verduras y hortalizas'],
            ['nombre_categoria' => 'Lácteos', 'descripcion' => 'Leche, queso, crema'],
            ['nombre_categoria' => 'Abarrotes', 'descripcion' => 'Productos secos'],
            ['nombre_categoria' => 'Bebidas', 'descripcion' => 'Bebidas e insumos'],
        ]);

        // Clientes
        DB::table('clientes')->insert([
            ['nombre' => 'María', 'apellido' => 'González', 'telefono' => '7271234567', 'email' => 'maria@gmail.com'],
            ['nombre' => 'Carlos', 'apellido' => 'Ramírez', 'telefono' => '7279876543', 'email' => 'carlos@gmail.com'],
            ['nombre' => 'Ana', 'apellido' => 'López', 'telefono' => '7271112233', 'email' => 'ana@gmail.com'],
        ]);

        // Mesas
        DB::table('mesas')->insert([
            ['numero_mesa' => 1, 'capacidad' => 4, 'ubicacion' => 'Interior', 'estado' => 'Libre'],
            ['numero_mesa' => 2, 'capacidad' => 2, 'ubicacion' => 'Terraza', 'estado' => 'Libre'],
            ['numero_mesa' => 3, 'capacidad' => 6, 'ubicacion' => 'VIP', 'estado' => 'Libre'],
            ['numero_mesa' => 4, 'capacidad' => 4, 'ubicacion' => 'Interior', 'estado' => 'Libre'],
        ]);

        // Proveedores
        DB::table('proveedores')->insert([
            ['nombre_empresa' => 'Carnes del Norte', 'contacto' => 'Juan Pérez', 'telefono' => '7271234500', 'email' => 'carnes@norte.com', 'activo' => 1],
            ['nombre_empresa' => 'Verduras Frescas SA', 'contacto' => 'Rosa Méndez', 'telefono' => '7279876500', 'email' => 'verduras@frescas.com', 'activo' => 1],
            ['nombre_empresa' => 'Lácteos Premium', 'contacto' => 'Luis Torres', 'telefono' => '7271112200', 'email' => 'lacteos@premium.com', 'activo' => 1],
        ]);

        // Platillos
        DB::table('platillos')->insert([
            ['nombre_platillo' => 'Sopa de Lima', 'descripcion' => 'Sopa yucateca tradicional', 'id_categoria_platillo' => 2, 'precio' => 85.00, 'tiempo_preparacion' => 15, 'disponible' => 1],
            ['nombre_platillo' => 'Tacos de Carnitas', 'descripcion' => '3 tacos con carnitas', 'id_categoria_platillo' => 3, 'precio' => 120.00, 'tiempo_preparacion' => 10, 'disponible' => 1],
            ['nombre_platillo' => 'Flan Napolitano', 'descripcion' => 'Flan casero', 'id_categoria_platillo' => 4, 'precio' => 55.00, 'tiempo_preparacion' => 5, 'disponible' => 1],
            ['nombre_platillo' => 'Agua de Jamaica', 'descripcion' => 'Agua fresca 500ml', 'id_categoria_platillo' => 5, 'precio' => 30.00, 'tiempo_preparacion' => 2, 'disponible' => 1],
        ]);

        // Productos
        DB::table('productos')->insert([
            ['nombre_producto' => 'Carne de Res', 'id_categoria' => 1, 'unidad_medida' => 'kg', 'stock_actual' => 20, 'stock_minimo' => 5, 'precio_unitario' => 180.00, 'id_proveedor' => 1],
            ['nombre_producto' => 'Tomate', 'id_categoria' => 2, 'unidad_medida' => 'kg', 'stock_actual' => 15, 'stock_minimo' => 3, 'precio_unitario' => 25.00, 'id_proveedor' => 2],
            ['nombre_producto' => 'Queso Fresco', 'id_categoria' => 3, 'unidad_medida' => 'kg', 'stock_actual' => 8, 'stock_minimo' => 2, 'precio_unitario' => 120.00, 'id_proveedor' => 3],
        ]);
    }
}
