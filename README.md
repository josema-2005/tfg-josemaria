# 🌐 Mundo Animal

**Mundo Animal** es el Trabajo de Fin de Grado (TFG) de José María, una plataforma web para gestionar:

- 🛒 Tienda de productos para mascotas  
- 📰 Blog de noticias y consejos  
- 🗓️ Reserva de citas en clínica veterinaria  
- 👤 Perfil de usuario  
- 🛍️ Carrito de compra  

Desarrollado con **Laravel 10**, **MySQL** (XAMPP), **Blade**, **CSS** y **JavaScript** “a pelo”.

---

## 📑 Índice

1. [Características](#características)  
2. [Tecnologías](#tecnologías)  
3. [Instalación](#instalación)  
4. [Configuración del entorno](#configuración-del-entorno)  
5. [Uso](#uso)  
6. [Estructura de carpetas](#estructura-de-carpetas)  
7. [Esquema de base de datos](#esquema-de-base-de-datos)  
8. [Rutas principales](#rutas-principales)  
9. [Contribuciones](#contribuciones)  

---

## 🚀 Características

- **Autenticación**
  - Registro y login “a mano”  
  - Middleware `auth` y `guest`
- **Blog**
  - Listado de posts ordenados por fecha  
  - Vista de detalle con fecha formateada
- **Tienda**
  - Catálogo responsive (3-2-1 columnas)  
  - Filtro por precio mínimo/máximo  
  - Página de detalle del producto
- **Carrito**
  - Añadir, actualizar y eliminar productos  
  - Sesión para almacenamiento  
  - Subtotales y total
- **Citas veterinarias**
  - Formulario con validación  
  - Listado de citas del usuario
- **Perfil de usuario**
  - Editar nombre, email y contraseña  
  - Protección CSRF y hashing
- **Responsive Design**
  - Media queries en CSS  
  - Menú hamburguesa en móvil
- **Buenas prácticas**
  - Partials en Blade  
  - Git para control de versiones  
  - Código limpio y comentado

---

## 🧰 Tecnologías

- **Lenguajes:** PHP 8, HTML5, CSS3, JavaScript (vanilla)  
- **Framework:** Laravel 10  
- **Base de datos:** MySQL (XAMPP)  
- **Servidor:** Apache  
- **Vistas:** Blade  
- **Control de versiones:** Git / GitHub  

---

## 💻 Instalación

```bash
# 1. Clonar el repositorio
git clone https://github.com/josema-2005/tfg-josemaria.git
cd tfg-josemaria

# 2. Instalar dependencias
composer install
npm install

# 3. Configurar entorno
cp .env.example .env

# 4. Generar clave de Laravel
php artisan key:generate

# 5. Ejecutar migraciones
php artisan migrate

# 6. (Opcional) Sembrar datos de prueba
# php artisan db:seed

# 7. Compilar assets
# npm run dev

# 8. Levantar servidor local
php artisan serve
```

Visita: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## ⚙️ Configuración del entorno

En el archivo `.env`, define al menos:

```env
APP_NAME="Mundo Animal"
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tfg-josemaria
DB_USERNAME=root
DB_PASSWORD=
```

✅ Asegúrate de que `.env` está en `.gitignore` y tienes un `.env.example`.

---

## ▶️ Uso

### 📥 Registro / Login
- `/registro` y `/login` — Registro e inicio de sesión  
- Inicio de sesión automático tras registro

### 🏠 Página principal
- `/` — Muestra 3 productos recomendados y un post destacado

### 📰 Blog
- `/blog` — Listado de posts  
- `/blog/{slug}` — Detalle del post

### 🛒 Tienda
- `/tienda` — Catálogo de productos con filtro por precio  
- `/tienda/{id}` — Detalle del producto + botón de añadir al carrito

### 🧺 Carrito
- `/carrito` — Visualizar, actualizar y eliminar productos (auth)

### 🗓️ Citas
- `/appointments/create` — Formulario de cita  
- `/appointments` — Listado de citas del usuario (auth)

### 👤 Perfil
- `/perfil` — Editar nombre, email y contraseña (auth)

---

## 📂 Estructura de carpetas

```text
app/
├─ Http/Controllers/
│   ├─ AuthController.php
│   ├─ BlogController.php
│   ├─ ShopController.php
│   ├─ CartController.php
│   ├─ AppointmentController.php
│   └─ ProfileController.php
├─ Models/
│   ├─ User.php
│   ├─ Post.php
│   ├─ Product.php
│   └─ Appointment.php

resources/
├─ views/
│   ├─ layouts/app.blade.php
│   ├─ partials/header.blade.php
│   ├─ home.blade.php
│   ├─ blog/index.blade.php
│   ├─ blog/show.blade.php
│   ├─ shop/index.blade.php
│   ├─ shop/show.blade.php
│   ├─ cart/index.blade.php
│   ├─ appointments/create.blade.php
│   ├─ appointments/index.blade.php
│   └─ profile/edit.blade.php

public/
├─ css/
│   ├─ header.css
│   ├─ home.css
│   ├─ tienda.css
│   ├─ cart.css
│   ├─ appointment.css
│   └─ profile.css
└─ images/
```

---

## 🗄️ Esquema de base de datos

### Tablas principales

#### `users`
- id  
- name  
- email  
- password  
- created_at  
- updated_at

#### `posts`
- id  
- titulo  
- slug  
- cuerpo  
- fecha_de_publicacion  
- id_usuario  
- created_at  
- updated_at

#### `products`
- id  
- nombre  
- descripcion  
- precio  
- imagen  
- created_at  
- updated_at

#### `appointments`
- id  
- user_id  
- fecha  
- hora  
- motivo  
- created_at  
- updated_at

### Relaciones

- `User` → hasMany → `Post`  
- `User` → hasMany → `Appointment`

---

## 🔗 Rutas principales

| Método | Ruta                   | Nombre               | Descripción                          |
|--------|------------------------|----------------------|--------------------------------------|
| GET    | /                      | home                 | Página de inicio                     |
| GET    | /registro              | registro             | Formulario de registro               |
| POST   | /registro              | —                    | Procesa registro                     |
| GET    | /login                 | login                | Formulario de login                  |
| POST   | /login                 | —                    | Procesa login                        |
| POST   | /cerrarSesion          | cerrarSesion         | Cierra sesión                        |
| GET    | /blog                  | blog.index           | Listado de posts                     |
| GET    | /blog/{slug}           | blog.show            | Detalle de post                      |
| GET    | /tienda                | tienda.index         | Catálogo de productos                |
| GET    | /tienda/{id}           | tienda.show          | Detalle de producto                  |
| GET    | /carrito               | carrito.index        | Ver carrito (auth)                   |
| POST   | /carrito/add           | carrito.add          | Añadir producto al carrito           |
| POST   | /carrito/remove        | carrito.remove       | Eliminar producto del carrito        |
| POST   | /carrito/update        | carrito.update       | Actualizar cantidad                  |
| GET    | /appointments/create   | appointments.create  | Formulario para nueva cita (auth)    |
| POST   | /appointments          | appointments.store   | Reservar cita                        |
| GET    | /appointments          | appointments.index   | Listado de citas (auth)              |
| GET    | /perfil                | perfil.edit          | Editar perfil (auth)                 |
| POST   | /perfil                | perfil.update        | Guardar cambios en perfil (auth)     |

---

## 🤝 Contribuciones

1. Haz fork del repositorio  
2. Crea una nueva rama:

```bash
git checkout -b feature/TuFeature
```

3. Realiza tus cambios y haz commit:

```bash
git commit -m "Descripción del cambio"
```

4. Sube tu rama:

```bash
git push origin feature/TuFeature
```

5. Abre un Pull Request y describe tus cambios

---
