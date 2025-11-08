# 🎉 Esdeveniments - Sistema de Gestión de Eventos

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

Sistema completo de gestión de eventos desarrollado con Laravel. Permite crear, gestionar y participar en eventos con sistema de registro de usuarios.

## 📋 Características

- ✅ **Gestión de Eventos**: Crear, editar y eliminar eventos
- ✅ **Registro de Usuarios**: Sistema de autenticación completo
- ✅ **Inscripciones**: Los usuarios pueden inscribirse a eventos
- ✅ **Categorías de Eventos**: Organización por tipos de eventos
- ✅ **Búsqueda y Filtros**: Filtrar eventos por fecha, categoría, ubicación
- ✅ **Panel de Administración**: Gestión completa para administradores
- ✅ **Notificaciones**: Sistema de alertas por email
- ✅ **Calendar View**: Vista de calendario de eventos

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
DB_DATABASE=esdeveniments_db
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password

# Configuración de correo (opcional)
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

4. **Generar clave de aplicación**
```bash
php artisan key:generate
```

5. **Crear base de datos**
```sql
CREATE DATABASE esdeveniments_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

6. **Ejecutar migraciones**
```bash
php artisan migrate
```

7. **Poblar base de datos con datos de ejemplo**
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

### Cuentas de Prueba
Después de ejecutar los seeders:
- **Admin**: admin@esdeveniments.com / password
- **Usuario**: user@esdeveniments.com / password

## 🛠️ Tecnologías Utilizadas

- **Backend**: Laravel 10, PHP 8.0+
- **Frontend**: Blade Templates, TailwindCSS, Alpine.js
- **Base de Datos**: MySQL
- **Autenticación**: Laravel Breeze
- **Build Tools**: Vite
- **Email**: Laravel Mail
- **Testing**: PHPUnit

## 📊 Modelos Principales

### Event
- `id`: Identificador único
- `title`: Título del evento
- `description`: Descripción detallada
- `start_date`: Fecha y hora de inicio
- `end_date`: Fecha y hora de fin
- `location`: Ubicación del evento
- `max_participants`: Máximo de participantes
- `category_id`: Relación con categoría
- `user_id`: Organizador del evento

### Registration
- `id`: Identificador único
- `user_id`: Usuario registrado
- `event_id`: Evento al que se registra
- `registration_date`: Fecha de registro
- `status`: Estado de la inscripción

### Category
- `id`: Identificador único
- `name`: Nombre de la categoría
- `description`: Descripción
- `color`: Color para la interfaz

## 🔗 Rutas Principales

```php
GET  /                          # Página principal
GET  /events                    # Lista de eventos
GET  /events/{id}               # Detalle de evento
POST /events/{id}/register      # Inscribirse a evento
GET  /my-events                 # Mis eventos registrados
GET  /admin                     # Panel de administración
GET  /admin/events              # Gestión de eventos
POST /admin/events              # Crear evento
PUT  /admin/events/{id}         # Actualizar evento
DELETE /admin/events/{id}       # Eliminar evento
```

## 🧪 Testing

```bash
# Ejecutar todos los tests
php artisan test

# Ejecutar tests específicos
php artisan test --filter EventTest
```

## 📝 Comandos Útiles

```bash
# Limpiar cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Crear nuevo evento (comando personalizado)
php artisan make:event

# Enviar recordatorios de eventos
php artisan events:send-reminders

# Limpiar eventos pasados
php artisan events:cleanup
```

## 📧 Configuración de Email

Para habilitar las notificaciones por email:

1. **Configurar SMTP en .env**
```env
MAIL_MAILER=smtp
MAIL_HOST=tu-servidor-smtp.com
MAIL_PORT=587
MAIL_USERNAME=tu-email@dominio.com
MAIL_PASSWORD=tu-password
MAIL_ENCRYPTION=tls
```

2. **Para desarrollo local con Mailpit**
```bash
# Instalar Mailpit
npm install -g mailpit

# Ejecutar Mailpit
mailpit
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

### Problemas con migraciones
```bash
php artisan migrate:fresh --seed
```

### Problemas con assets
```bash
npm run dev
# o
npm run build
```

## 📈 Funcionalidades Avanzadas

- **Notificaciones Push**: Sistema de notificaciones en tiempo real
- **Export/Import**: Exportar eventos a CSV/PDF
- **Estadísticas**: Panel de analytics para organizadores
- **API REST**: Endpoints para integración con apps móviles
- **Multiidioma**: Soporte para múltiples idiomas

---
**Proyecto**: Esdeveniments - Sistema de Gestión de Eventos  
**Framework**: Laravel 10  
**Curso**: DWES 2024-2025

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
