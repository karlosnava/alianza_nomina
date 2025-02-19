Bienvenido al sistema de nómina de [Grupo Alianza](https://grupo-alianza.com/)
==============================================================================

Desarrollado por: [Carlos Rodriguez](https://github.com/karlosnava)


* * *

## El sistema incluye:

✅ Sesiones, Middlewares, CSRF, Hashing, Error Handling y validaciones.

✅ Sistema de roles (Empleado, personal de nómina y presidente).

✅ Creación, edición, eliminación y listado de puestos de trabajo.

✅ Creación, edición, eliminación y listado de países.

✅ Creación, edición, eliminación y listado de ciudades.

✅ Creación, edición, eliminación y listado de puestos de trabajo.

✅ Componentes reactivos y paginación.



## Tecnologías utilizadas:

🛠️ Laravel 8.

🛠️ SQLite.

🛠️ Livewire.

🛠️ Tailwindcss.

🛠️ Fontawesome.

🛠️ flagsapi.com


# Instalación
1. Clone el repositorio en su entorno local:
> git clone https://github.com/karlosnava/alianza_nomina.git

2. Instale dependencias npm
> npm install
3. Instale dependencias composer
> composer install
4. Cree el archivo .env (clonando el archivo .env.example)
5. Genere una llave 
> php artisan key:generate
6. Configure su entorno según corresponda, en este caso la base de datos debe ser SQLite y la ruta de la base de datos debe ser absoluta para un correcto funcionamiento.
> DB_CONNECTION=sqlite

> DB_DATABASE=C:\xampp\htdocs\\{alianza_nomina}\database\database.sqlite # Asegúrese que la ruta sea absoluta y el archivo exista.
7. Modifique la variable **FILESYSTEM_DRIVER** a **public** y corra el siguiente comando
> php artisan storage:link
8. Corra su servidor local
> php artisan serve