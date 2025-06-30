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

1. [🚀 Características](#-características)  
2. [🧰 Tecnologías](#-tecnologías)  
3. [💻 Instalación](#-instalación)  
4. [⚙️ Configuración del entorno](#-configuración-del-entorno)  
5. [▶️ Uso](#-uso)  
6. [📂 Estructura de carpetas](#-estructura-de-carpetas)  
7. [🗄️ Esquema de base de datos](#-esquema-de-base-de-datos)  
8. [🔗 Rutas principales](#-rutas-principales)  
9. [🤝 Contribuciones](#-contribuciones)  
10. [📄 Licencia](#-licencia)  

---

## 🚀 Características

1. **Autenticación**  
   - Registro y login “a mano”  
   - Protección de rutas con middleware `auth` y `guest`

2. **Blog**  
   - Listado de posts ordenados por fecha  
   - Detalle de artículo con fecha formateada

3. **Tienda**  
   - Catálogo responsive (3-2-1 columnas)  
   - Filtro por precio mínimo/máximo  
   - PDP (página de detalle)

4. **Carrito**  
   - Añadir, actualizar cantidad y eliminar  
   - Almacenamiento en sesión  
   - Subtotales y total calculados

5. **Citas veterinarias**  
   - Formulario de fecha/hora con validación  
   - Listado “Mis citas” del usuario

6. **Perfil de usuario**  
   - Edición de nombre, email y contraseña  
   - CSRF y hashing de contraseña

7. **Responsive design**  
   - Media queries en CSS  
   - Menú hamburguesa en móvil

8. **Buenas prácticas**  
   - Partials Blade  
   - Git para control de versiones  
   - Código organizado y comentado

---

## 🧰 Tecnologías

- **Lenguajes**: PHP 8, HTML5, CSS3, JavaScript (vanilla)  
- **Framework**: Laravel 10  
- **Base de datos**: MySQL (XAMPP)  
- **Servidor**: Apache  
- **Vistas**: Blade  
- **Control de versiones**: Git / GitHub  

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
# Rellena .env con tus datos de BD, APP_URL, etc.

# 4. Generar clave de Laravel
php artisan key:generate

# 5. Ejecutar migraciones
php artisan migrate

# 6. (Opcional) Sembrar datos de prueba
# php artisan db:seed

# 7. Compilar assets (si usas Vite/Mix)
# npm run dev

# 8. Levantar servidor local
php artisan serve
Visita http://127.0.0.1:8000.

⚙️ Configuración del entorno
En tu .env define al menos:

env
Copiar
Editar
APP_NAME="Mundo Animal"
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tfg-josemaria
DB_USERNAME=root
DB_PASSWORD=
Asegúrate de que .env está en .gitignore y dispones de un .env.example.

▶️ Uso
Registro / Login
/registro y /login

Tras registro, inicio de sesión automático.

Home
/ — 3 productos recomendados + post destacado.

Blog
/blog — listado

/blog/{slug} — detalle

Tienda
/tienda — catálogo + filtro precio

/tienda/{id} — detalle + “Añadir al carrito”

Carrito
/carrito — ver/gestionar ítems (auth)

Citas
/appointments/create — formulario

/appointments — listado de citas (auth)

Perfil
/perfil — editar datos (auth)

📂 Estructura de carpetas
pgsql
Copiar
Editar
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
🗄️ Esquema de base de datos
Tablas:
users:
id

name

email

password

created_at

updated_at

posts:
id

titulo

slug

cuerpo

fecha_de_publicacion

id_usuario

created_at

updated_at

products:
id

nombre

descripcion

precio

imagen

created_at

updated_at

appointments:
id

user_id

fecha

hora

motivo

created_at

updated_at

Relaciones:
User → hasMany → Post

User → hasMany → Appointment

🔗 Rutas principales
Método	Ruta	Nombre	Descripción
GET	/	home	Página de inicio
GET	/registro	registro	Formulario de registro
POST	/registro	—	Procesa registro
GET	/login	login	Formulario de login
POST	/login	—	Procesa login
POST	/cerrarSesion	cerrarSesion	Cierra sesión
GET	/blog	blog.index	Listado de posts
GET	/blog/{slug}	blog.show	Detalle de post
GET	/tienda	tienda.index	Catálogo de productos
GET	/tienda/{id}	tienda.show	Detalle de producto
GET	/carrito	carrito.index	Ver carrito (auth)
POST	/carrito/add	carrito.add	Añadir al carrito
POST	/carrito/remove	carrito.remove	Eliminar del carrito
POST	/carrito/update	carrito.update	Actualizar cantidad
GET	/appointments/create	appointments.create	Formulario de cita (auth)
POST	/appointments	appointments.store	Reservar cita
GET	/appointments	appointments.index	Listado de citas (auth)
GET	/perfil	perfil.edit	Formulario editar perfil (auth)
POST	/perfil	perfil.update	Guardar cambios de perfil

🤝 Contribuciones
Haz fork de este repositorio.

Crea una rama: git checkout -b feature/TuFeature.

Haz tus cambios y commitea: git commit -m "Describe tu cambio".

Sube tu rama: git push origin feature/TuFeature.

Abre un Pull Request describiendo tus cambios.
