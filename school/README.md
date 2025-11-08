# 🏫 School - Sistema de Gestión Escolar

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

Sistema integral de gestión escolar desarrollado con Laravel. Permite administrar estudiantes, profesores, cursos, calificaciones y toda la actividad académica de una institución educativa.

## 📋 Características

- ✅ **Gestión de Estudiantes**: Registro, edición y seguimiento de estudiantes
- ✅ **Gestión de Profesores**: Administración del personal docente
- ✅ **Cursos y Materias**: Organización académica completa
- ✅ **Calificaciones**: Sistema de notas y evaluaciones
- ✅ **Horarios**: Gestión de horarios de clases
- ✅ **Asistencia**: Control de asistencia de estudiantes
- ✅ **Reportes**: Informes académicos y estadísticas
- ✅ **Roles y Permisos**: Sistema de autenticación por roles
- ✅ **Dashboard**: Paneles personalizados por tipo de usuario

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
DB_DATABASE=school_db
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password

# Configuración de correo
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="school@example.com"
MAIL_FROM_NAME="Sistema Escolar"
```

4. **Generar clave de aplicación**
```bash
php artisan key:generate
```

5. **Crear base de datos**
```sql
CREATE DATABASE school_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
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
- **Administrador**: admin@school.com / password
- **Profesor**: teacher@school.com / password  
- **Estudiante**: student@school.com / password

## 🛠️ Tecnologías Utilizadas

- **Backend**: Laravel 10, PHP 8.0+
- **Frontend**: Blade Templates, TailwindCSS, Alpine.js
- **Base de Datos**: MySQL
- **Autenticación**: Laravel Breeze con roles
- **Build Tools**: Vite
- **Charts**: Chart.js para estadísticas
- **PDF**: Laravel-dompdf para reportes
- **Testing**: PHPUnit

## 📊 Modelos Principales

### Student (Estudiante)
- `id`: Identificador único
- `name`: Nombre completo
- `email`: Email del estudiante
- `student_id`: Número de matrícula
- `birth_date`: Fecha de nacimiento
- `phone`: Teléfono de contacto
- `address`: Dirección

### Teacher (Profesor)
- `id`: Identificador único
- `name`: Nombre completo
- `email`: Email del profesor
- `employee_id`: Número de empleado
- `department`: Departamento
- `specialization`: Especialización

### Course (Curso)
- `id`: Identificador único
- `name`: Nombre del curso
- `code`: Código del curso
- `description`: Descripción
- `credits`: Créditos académicos
- `teacher_id`: Profesor asignado

### Grade (Calificación)
- `id`: Identificador único
- `student_id`: Estudiante
- `course_id`: Curso
- `grade`: Calificación numérica
- `grade_type`: Tipo de evaluación
- `date`: Fecha de la evaluación

### Attendance (Asistencia)
- `id`: Identificador único
- `student_id`: Estudiante
- `course_id`: Curso
- `date`: Fecha de clase
- `status`: Estado (presente, ausente, tardanza)

## 🔗 Rutas Principales

```php
# Dashboard
GET  /dashboard                 # Panel principal

# Estudiantes
GET  /students                  # Lista de estudiantes
GET  /students/{id}             # Perfil de estudiante
POST /students                  # Crear estudiante
PUT  /students/{id}             # Actualizar estudiante

# Profesores
GET  /teachers                  # Lista de profesores
GET  /teachers/{id}             # Perfil de profesor
POST /teachers                  # Crear profesor

# Cursos
GET  /courses                   # Lista de cursos
GET  /courses/{id}              # Detalle de curso
POST /courses                   # Crear curso

# Calificaciones
GET  /grades                    # Gestión de calificaciones
POST /grades                    # Registrar calificación
GET  /students/{id}/grades      # Calificaciones de estudiante

# Asistencia
GET  /attendance                # Control de asistencia
POST /attendance                # Registrar asistencia
GET  /courses/{id}/attendance   # Asistencia por curso

# Reportes
GET  /reports                   # Panel de reportes
GET  /reports/grades            # Reporte de calificaciones
GET  /reports/attendance        # Reporte de asistencia
```

## 👥 Roles y Permisos

### Administrador
- Gestión completa del sistema
- Crear/editar estudiantes y profesores
- Configuración de cursos
- Acceso a todos los reportes
- Gestión de usuarios

### Profesor
- Ver sus cursos asignados
- Registrar calificaciones
- Control de asistencia
- Reportes de sus clases
- Comunicación con estudiantes

### Estudiante
- Ver sus calificaciones
- Consultar horarios
- Ver historial académico
- Acceso a materiales de curso

## 🧪 Testing

```bash
# Ejecutar todos los tests
php artisan test

# Ejecutar tests específicos
php artisan test --filter StudentTest

# Tests con coverage
php artisan test --coverage
```

## 📝 Comandos Útiles

```bash
# Limpiar cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Crear nuevo semestre académico
php artisan school:new-semester

# Generar reportes automáticos
php artisan school:generate-reports

# Backup de base de datos
php artisan school:backup-database

# Importar estudiantes desde CSV
php artisan school:import-students students.csv
```

## 📊 Reportes Disponibles

- **Calificaciones por curso**: Estadísticas de rendimiento
- **Asistencia general**: Reportes de ausentismo
- **Rendimiento académico**: Análisis por estudiante
- **Estadísticas de profesores**: Carga académica
- **Reportes financieros**: Pagos y matrículas
- **Exportación**: PDF, Excel, CSV

## 🐛 Solución de Problemas

### Error de permisos en storage
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### Error de roles y permisos
```bash
php artisan permission:create-permission-tables
php artisan db:seed --class=RolesAndPermissionsSeeder
```

### Problemas con reportes PDF
```bash
# Instalar dependencias adicionales
composer require barryvdh/laravel-dompdf
```

### Reset completo del sistema
```bash
php artisan migrate:fresh --seed
```

## 📈 Funcionalidades Avanzadas

- **API REST**: Endpoints para aplicaciones móviles
- **Notificaciones**: Sistema de alertas por email/SMS
- **Calendario académico**: Gestión de eventos escolares
- **Biblioteca**: Sistema de préstamos de libros
- **Comunicación**: Mensajería interna
- **Multitenancy**: Soporte para múltiples escuelas

## 🔄 Flujo de Trabajo Típico

1. **Administrador** crea cursos y asigna profesores
2. **Administrador** registra estudiantes y los matricula
3. **Profesor** registra asistencia diariamente
4. **Profesor** ingresa calificaciones de evaluaciones
5. **Estudiantes** consultan sus notas y asistencia
6. **Sistema** genera reportes automáticos

---
**Proyecto**: School - Sistema de Gestión Escolar  
**Framework**: Laravel 10  
**Curso**: DWES 2024-2025
