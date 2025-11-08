# 🚀 Laravel Producción - Template de Despliegue

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-2CA5E0?style=for-the-badge&logo=docker&logoColor=white)

Template de Laravel configurado específicamente para entornos de producción con optimizaciones de rendimiento, seguridad y despliegue automatizado.

## 📋 Características de Producción

- ✅ **Optimización de Performance**: Cache optimizado, lazy loading
- ✅ **Seguridad Avanzada**: Headers de seguridad, rate limiting
- ✅ **Monitorización**: Logging avanzado, health checks
- ✅ **CI/CD**: Pipeline de despliegue automatizado
- ✅ **Docker**: Containerización completa
- ✅ **SSL/HTTPS**: Configuración de certificados
- ✅ **CDN Ready**: Preparado para CDN
- ✅ **Database Optimization**: Configuración optimizada de BD

## 🚀 Instalación para Producción

### Requisitos del Servidor
- PHP >= 8.1
- Composer 2.x
- MySQL 8.0+ / PostgreSQL 13+
- Redis 6.0+
- Nginx 1.20+
- SSL Certificate
- Node.js 18+ (para build de assets)

### Despliegue Básico

1. **Clonar repositorio en servidor**
```bash
git clone [URL_REPOSITORIO] /var/www/laravel-app
cd /var/www/laravel-app
```

2. **Instalar dependencias (solo producción)**
```bash
composer install --optimize-autoloader --no-dev
```

3. **Configurar archivo de entorno**
```bash
cp .env.production .env
```

4. **Configurar variables de entorno de producción**
```env
APP_NAME="Laravel Production"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tu-dominio.com

# Base de datos
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_prod
DB_USERNAME=laravel_user
DB_PASSWORD=secure_password

# Cache
CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis

# Redis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

# Mail
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailgun.org
MAIL_PORT=587
MAIL_USERNAME=postmaster@mg.tu-dominio.com
MAIL_PASSWORD=tu-api-key

# Filesystem
FILESYSTEM_DISK=s3
AWS_ACCESS_KEY_ID=tu-access-key
AWS_SECRET_ACCESS_KEY=tu-secret-key
AWS_DEFAULT_REGION=us-west-2
AWS_BUCKET=tu-bucket
```

5. **Generar clave de aplicación**
```bash
php artisan key:generate
```

6. **Optimizar aplicación**
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
```

7. **Ejecutar migraciones**
```bash
php artisan migrate --force
```

8. **Compilar assets para producción**
```bash
npm ci
npm run build
```

9. **Configurar permisos**
```bash
chown -R www-data:www-data /var/www/laravel-app
chmod -R 755 /var/www/laravel-app
chmod -R 775 /var/www/laravel-app/storage
chmod -R 775 /var/www/laravel-app/bootstrap/cache
```

## 🐳 Despliegue con Docker

### Docker Compose para Producción

```yaml
# docker-compose.prod.yml
version: '3.8'

services:
  app:
    build:
      context: .
      dockerfile: Dockerfile.prod
    container_name: laravel-app
    restart: unless-stopped
    environment:
      - APP_ENV=production
      - APP_DEBUG=false
    volumes:
      - ./storage:/var/www/storage
    networks:
      - laravel-network

  nginx:
    image: nginx:alpine
    container_name: laravel-nginx
    restart: unless-stopped
    ports:
      - "80:80"
      - "443:443"
    volumes:
      - ./:/var/www
      - ./docker/nginx/nginx.conf:/etc/nginx/nginx.conf
      - ./docker/ssl:/etc/nginx/ssl
    depends_on:
      - app
    networks:
      - laravel-network

  mysql:
    image: mysql:8.0
    container_name: laravel-mysql
    restart: unless-stopped
    environment:
      MYSQL_DATABASE: laravel_prod
      MYSQL_USER: laravel_user
      MYSQL_PASSWORD: secure_password
      MYSQL_ROOT_PASSWORD: root_password
    volumes:
      - mysql_data:/var/lib/mysql
    networks:
      - laravel-network

  redis:
    image: redis:7-alpine
    container_name: laravel-redis
    restart: unless-stopped
    command: redis-server --appendonly yes
    volumes:
      - redis_data:/data
    networks:
      - laravel-network

volumes:
  mysql_data:
  redis_data:

networks:
  laravel-network:
    driver: bridge
```

### Comandos Docker

```bash
# Construir y levantar servicios
docker-compose -f docker-compose.prod.yml up -d --build

# Ver logs
docker-compose -f docker-compose.prod.yml logs -f app

# Ejecutar comandos Artisan
docker-compose -f docker-compose.prod.yml exec app php artisan migrate

# Backup de base de datos
docker-compose -f docker-compose.prod.yml exec mysql mysqldump -u root -p laravel_prod > backup.sql
```

## ⚙️ Configuración de Nginx

```nginx
# /etc/nginx/sites-available/laravel-app
server {
    listen 80;
    listen [::]:80;
    server_name tu-dominio.com www.tu-dominio.com;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    server_name tu-dominio.com www.tu-dominio.com;
    root /var/www/laravel-app/public;

    # SSL Configuration
    ssl_certificate /path/to/certificate.crt;
    ssl_certificate_key /path/to/private.key;
    ssl_protocols TLSv1.2 TLSv1.3;
    ssl_ciphers HIGH:!aNULL:!MD5;

    # Security Headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-XSS-Protection "1; mode=block" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header Referrer-Policy "no-referrer-when-downgrade" always;
    add_header Content-Security-Policy "default-src 'self' http: https: data: blob: 'unsafe-inline'" always;

    index index.php;

    charset utf-8;

    # Gzip Compression
    gzip on;
    gzip_vary on;
    gzip_min_length 1024;
    gzip_types text/plain text/css text/xml text/javascript application/x-javascript application/xml+rss;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

## 📊 Monitorización y Logs

### Configuración de Logs
```php
// config/logging.php
'channels' => [
    'stack' => [
        'driver' => 'stack',
        'channels' => ['single', 'slack'],
    ],
    
    'slack' => [
        'driver' => 'slack',
        'url' => env('LOG_SLACK_WEBHOOK_URL'),
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'critical',
    ],
],
```

### Health Check Endpoint
```php
// routes/web.php
Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now(),
        'uptime' => uptime(),
        'database' => DB::connection()->getPdo() ? 'connected' : 'disconnected',
        'cache' => Cache::store()->getRedis()->ping() ? 'connected' : 'disconnected',
    ]);
});
```

## 🔒 Configuración de Seguridad

### Rate Limiting
```php
// app/Http/Kernel.php
protected $middlewareGroups = [
    'api' => [
        'throttle:api',
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],
];

protected $routeMiddleware = [
    'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
];
```

### Configuración CORS
```php
// config/cors.php
return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'],
    'allowed_origins' => [env('FRONTEND_URL', 'http://localhost:3000')],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];
```

## 📈 Optimizaciones de Performance

### Cache de Consultas
```php
// Habilitar query cache
'redis' => [
    'client' => env('REDIS_CLIENT', 'phpredis'),
    'options' => [
        'cluster' => env('REDIS_CLUSTER', 'redis'),
        'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
    ],
],
```

### Optimización de Assets
```javascript
// vite.config.js
export default defineConfig({
    plugins: [laravel({
        input: ['resources/css/app.css', 'resources/js/app.js'],
        refresh: true,
    })],
    build: {
        rollupOptions: {
            output: {
                manualChunks: {
                    vendor: ['lodash', 'axios'],
                },
            },
        },
    },
});
```

## 🚀 CI/CD Pipeline

### GitHub Actions
```yaml
# .github/workflows/deploy.yml
name: Deploy to Production

on:
  push:
    branches: [ main ]

jobs:
  deploy:
    runs-on: ubuntu-latest
    
    steps:
    - uses: actions/checkout@v3
    
    - name: Setup PHP
      uses: shivammathur/setup-php@v2
      with:
        php-version: '8.1'
        
    - name: Install dependencies
      run: composer install --no-dev --optimize-autoloader
      
    - name: Run tests
      run: php artisan test
      
    - name: Deploy to server
      uses: appleboy/ssh-action@v0.1.5
      with:
        host: ${{ secrets.HOST }}
        username: ${{ secrets.USERNAME }}
        key: ${{ secrets.KEY }}
        script: |
          cd /var/www/laravel-app
          git pull origin main
          composer install --no-dev --optimize-autoloader
          php artisan migrate --force
          php artisan config:cache
          php artisan route:cache
          php artisan view:cache
          npm run build
```

## 🐛 Solución de Problemas Comunes

### Error 500 después del despliegue
```bash
# Verificar logs
tail -f /var/log/nginx/error.log
tail -f storage/logs/laravel.log

# Limpiar cache
php artisan cache:clear
php artisan config:clear
```

### Problemas de permisos
```bash
# Corregir permisos
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

### Base de datos no conecta
```bash
# Verificar conexión
php artisan tinker
>>> DB::connection()->getPdo();
```

## 📋 Checklist de Despliegue

- [ ] Configurar variables de entorno de producción
- [ ] Habilitar HTTPS/SSL
- [ ] Configurar cache (Redis)
- [ ] Optimizar base de datos
- [ ] Configurar backup automático
- [ ] Establecer monitorización
- [ ] Configurar logs
- [ ] Implementar rate limiting
- [ ] Verificar health checks
- [ ] Configurar CDN
- [ ] Establecer CI/CD pipeline

---
**Proyecto**: Laravel Producción - Template de Despliegue  
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
