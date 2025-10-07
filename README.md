# Sistema de Registro de Vuelos

Sistema web desarrollado con **Laravel 12** y **MariaDB**, para gestionar **Clientes**, **Vuelos** y **Reservaciones**.  
Permite registrar clientes, crear vuelos, realizar reservaciones y consultar estadísticas en un dashboard moderno.

---

## 📦 Tecnologías

- PHP 8.4
- Laravel 12.33
- MariaDB / MySQL
- Bootstrap 5
- Font Awesome 6
- Git / GitHub

---

## 🚀 Instalación

1. **Clonar el repositorio:**

```bash
git clone https://github.com/TU_USUARIO/registro-vuelos.git
cd registro-vuelos
````

2. **Instalar dependencias de Laravel:**

```bash
composer install
```

3. **Copiar archivo de entorno:**

```bash
cp .env.example .env
```

4. **Configurar la base de datos** en `.env`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=clientes_db
DB_USERNAME=root
DB_PASSWORD=
```

5. **Generar la clave de aplicación:**

```bash
php artisan key:generate
```

6. **Ejecutar migraciones:**

```bash
php artisan migrate
```

7. **Iniciar servidor local:**

```bash
php artisan serve
```

Acceder en el navegador: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 📊 Funcionalidades

* **Clientes:** Crear, editar, eliminar y listar clientes.
* **Vuelos:** Crear, editar, eliminar y listar vuelos con información de origen, destino, fecha y capacidad.
* **Reservaciones:** Asignar vuelos a clientes, controlar número de asientos y fechas de reserva.
* **Dashboard:** Vista principal con resumen de clientes, vuelos y reservaciones, con enlaces rápidos.

---

## 📝 Estructura del proyecto

```
registro-vuelos/
├── app/Models
│   ├── Cliente.php
│   ├── Vuelo.php
│   └── Reservacion.php
├── app/Http/Controllers
├── database/migrations
├── resources/views
│   ├── clientes
│   ├── vuelos
│   ├── reservaciones
│   └── layouts
├── routes/web.php
└── README.md
```

---

## 💡 Próximas mejoras

* Validación de asientos disponibles antes de reservar.
* Dashboard con estadísticas gráficas.
* Autenticación de usuarios y permisos.
* Estilo avanzado tipo panel administrativo.

---

## 📄 Licencia

Proyecto de ejemplo para fines educativos y demostrativos.