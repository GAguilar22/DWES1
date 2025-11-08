# 🎓 DWES - Desarrollo Web en Entorno Servidor

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

Repositorio con ejercicios, proyectos y material educativo del curso de **Desarrollo Web en Entorno Servidor** utilizando PHP y Laravel.

## 📋 Tabla de Contenidos

- [Estructura del Proyecto](#-estructura-del-proyecto)
- [Ejercicios Básicos PHP](#-ejercicios-básicos-php)
- [Formularios Web](#-formularios-web)
- [Proyectos Laravel](#-proyectos-laravel)
- [Evaluaciones](#-evaluaciones)
- [Instalación](#-instalación)
- [Tecnologías](#-tecnologías)

## 🗂️ Estructura del Proyecto

```
DWES/
├── 📚 Ejercicios Básicos PHP
│   ├── Arrays/              # Manejo de arrays y estructuras de datos
│   ├── Condicionals/        # Estructuras condicionales (if, switch)
│   ├── Iteracions/          # Bucles y iteraciones (for, while, foreach)
│   └── Teoria/              # Material teórico fundamental
│
├── 📋 Formularios Web
│   ├── Formularis/          # Formularios básicos con GET/POST
│   ├── Formularis2/         # Formularios avanzados
│   ├── RepasForms/          # Ejercicios de repaso
│   └── Sessions/            # Manejo de sesiones PHP
│
├── 🎯 Evaluaciones
│   ├── Act.Eval/            # Actividades evaluables
│   ├── PrimerAEA/           # Primera actividad evaluable autónoma
│   ├── ProvaExtraordinaria/ # Prueba extraordinaria
│   ├── RepasAEA1/           # Repaso primera evaluación
│   └── RepasExamen/         # Ejercicios de repaso para examen
│
└── 🚀 Proyectos Laravel
    ├── cataleg/             # Catálogo de productos
    ├── esdeveniments/       # Gestión de eventos
    ├── school/              # Sistema de gestión escolar
    └── laravel-produccio/   # Proyecto para producción
```

## 📚 Ejercicios Básicos PHP

### Arrays
- **`botiga.php`** - Sistema de inventario de tienda
- **`capitals.php`** - Gestión de capitales de países
- **`dies semana.php`** - Trabajo con días de la semana
- **`Madrid.php`** - Información sobre Madrid
- **`mesos.php`** - Manejo de meses del año

### Condicionales
- **`empleats.php`** - Sistema de gestión de empleados
- **`notes.php`** - Calculadora de notas
- **`Parell.php`** - Verificación de números pares
- **`switch.php`** - Ejemplos de estructura switch
- **`tipus.php`** - Manejo de tipos de datos

### Iteraciones
- **`combat.php`** - Simulador de combate
- **`daus.php`** - Simulador de dados
- **`numparells.php`** - Generador de números pares
- **`taula.php`** - Generador de tablas de multiplicar
- **`while.php`** - Ejemplos de bucles while

### Teoría
- **`TeoriaArrays.php`** - Conceptos fundamentales de arrays
- **`TeoriaBucles.php`** - Teoría sobre bucles e iteraciones
- **`TeoriaCondicionals.php`** - Estructuras condicionales
- **`TeoriaDades.php`** - Tipos de datos en PHP
- **`TeoriaOperadors.php`** - Operadores en PHP

## 📋 Formularios Web

### Formularios Básicos
- Formularios con método GET y POST
- Validación de datos de entrada
- Procesamiento de formularios de contacto
- Gestión de productos mediante formularios

### Formularios Avanzados
- Formularios con validaciones complejas
- Manejo de archivos subidos
- Formularios multi-paso

### Sesiones
- Gestión de sesiones de usuario
- Persistencia de datos entre páginas
- Sistema de autenticación básico

## 🚀 Proyectos Laravel

### [Cataleg](./cataleg/) 
Catálogo de productos con funcionalidades CRUD completas.

### [Esdeveniments](./esdeveniments/)
Sistema de gestión de eventos con registro de usuarios.

### [School](./school/)
Sistema de gestión escolar con estudiantes, profesores y cursos.

### [Laravel Producción](./laravel-produccio/)
Proyecto Laravel configurado para entorno de producción.

> **Nota**: Cada proyecto Laravel tiene su propio README con instrucciones específicas de instalación y configuración.

## 🎯 Evaluaciones

### Actividades Evaluables
- **Act.Eval/** - Ejercicios de evaluación continua
- **PrimerAEA/** - Primera actividad evaluable autónoma
- **RepasExamen/** - Ejercicios de preparación para exámenes

### Pruebas Extraordinarias
- Material específico para convocatorias extraordinarias
- Ejercicios de repaso y refuerzo

## 🔧 Instalación

### Requisitos Previos
- PHP >= 8.0
- Composer
- MySQL/MariaDB
- Node.js (para proyectos Laravel)

### Ejercicios PHP Básicos
```bash
# Clonar el repositorio
git clone [URL_DEL_REPOSITORIO]

# Configurar servidor web local (XAMPP, WAMP, etc.)
# Colocar los archivos en la carpeta htdocs o www
```

### Proyectos Laravel
```bash
# Para cada proyecto Laravel
cd [nombre_proyecto]/

# Instalar dependencias PHP
composer install

# Instalar dependencias Node.js
npm install

# Configurar archivo de entorno
cp .env.example .env

# Generar clave de aplicación
php artisan key:generate

# Ejecutar migraciones
php artisan migrate

# Compilar assets (si es necesario)
npm run dev
```

## 🛠️ Tecnologías

- **Backend**: PHP 8.0+, Laravel 10
- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap
- **Base de Datos**: MySQL/MariaDB
- **Herramientas**: Composer, NPM, Artisan
- **Desarrollo**: XAMPP, VS Code

## 📝 Notas

- Los archivos `.env` no están incluidos por seguridad
- Las carpetas `vendor/` y `node_modules/` están excluidas del repositorio
- Cada proyecto Laravel requiere configuración individual de base de datos

## 📞 Contacto

Para dudas o consultas sobre el material educativo, contactar con el profesor del curso.

---

**Curso**: Desarrollo Web en Entorno Servidor  
**Año Académico**: 2024-2025  
**Tecnologías**: PHP, Laravel, MySQL