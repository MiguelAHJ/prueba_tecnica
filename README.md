Concesionario de Carros

Este proyecto es un sistema de gestión de carros para un concesionario, desarrollado con Laravel y Livewire. Permite a los usuarios no registrados visualizar los carros disponibles, mientras que los usuarios registrados pueden gestionar los carros mediante operaciones CRUD, incluyendo la carga de imágenes.

Características

Visualización de Carros: Los usuarios no registrados pueden ver los carros disponibles.
Gestión de Carros (CRUD): Los usuarios registrados pueden crear, leer, actualizar y eliminar carros.
Carga de Imágenes: Los usuarios pueden subir imágenes de los carros.
Autenticación y Autorización: El sistema utiliza la autenticación y autorización de Laravel para controlar el acceso a las funcionalidades.

Requisitos
PHP 8.1 o superior
Laravel 10.x
Livewire 2.x
Base de datos Postgres

Instalación
Clonar el Repositorio:

git clone https://github.com/MiguelAHJ/prueba_tecnica.git

Instalar Dependencias:

composer install
npm install

Configurar Variables de Entorno:

Copia el archivo .env.example a .env y configura las variables de entorno según sea necesario.

Generar Clave de Aplicación:

php artisan key:generate

Generar link de la carpeta storage

php artisan storage:link

Migrar Base de Datos:

php artisan migrate

Ejecutar seeders

php artisan db:seed

Iniciar Servidor de Desarrollo:

php artisan serve

