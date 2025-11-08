# 🛍️ Cataleg - Catálogo de Productos Laravel

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

Sistema de catálogo de productos desarrollado con Laravel, que permite gestionar un inventario completo con funcionalidades CRUD.

## 📋 Características

- ✅ **Gestión de Productos**: Crear, leer, actualizar y eliminar productos
- ✅ **Categorías**: Organización por categorías de productos
- ✅ **Búsqueda y Filtros**: Sistema de búsqueda avanzada
- ✅ **Imágenes**: Subida y gestión de imágenes de productos
- ✅ **Panel de Administración**: Interface administrativa completa
- ✅ **Responsive Design**: Compatible con dispositivos móviles

## 🚀 Instalación

### Requisitos Previos
- PHP >= 8.0
- Composer
- MySQL/MariaDB
- Node.js >= 16.x
- NPM

### Pasos de Instalación

1. **Instalar dependencias PHP**
```bash
composer install
```

2. **Configurar archivo de entorno**
```bash
cp .env.example .env
```

3. **Configurar base de datos en .env**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cataleg_db
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password
```

4. **Generar clave de aplicación**
```bash
php artisan key:generate
```

5. **Crear base de datos**
```sql
CREATE DATABASE cataleg_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

6. **Ejecutar migraciones**
```bash
php artisan migrate
```

7. **Poblar base de datos (opcional)**
```bash
php artisan db:seed
```

8. **Instalar dependencias frontend**
```bash
npm install
```

9. **Compilar assets**
```bash
npm run dev
```

10. **Crear enlace simbólico para storage**
```bash
php artisan storage:link
```

## 🏃‍♂️ Ejecución

### Servidor de Desarrollo
```bash
php artisan serve
```
La aplicación estará disponible en: `http://localhost:8000`

### Compilación de Assets en Desarrollo
```bash
npm run dev
```

### Compilación para Producción
```bash
npm run build
```

## 🛠️ Tecnologías Utilizadas

- **Backend**: Laravel 10, PHP 8.0+
- **Frontend**: Blade Templates, TailwindCSS, Alpine.js
- **Base de Datos**: MySQL
- **Build Tools**: Vite
- **Testing**: PHPUnit

## 🧪 Testing

```bash
# Ejecutar todos los tests
php artisan test

# Ejecutar tests específicos
php artisan test --filter ProductTest
```

## 📝 Comandos Útiles

```bash
# Limpiar cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Crear nuevo controlador
php artisan make:controller ProductController

# Crear nueva migración
php artisan make:migration create_products_table

# Crear nuevo modelo
php artisan make:model Product -m
```

## 🐛 Solución de Problemas

### Error de permisos en storage
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### Error de clave de aplicación
```bash
php artisan key:generate
```

### Problemas con assets
```bash
npm run dev
# o
npm run build
```

---
**Proyecto**: Cataleg - Sistema de Catálogo  
**Framework**: Laravel 10  
**Curso**: DWES 2024-2025
