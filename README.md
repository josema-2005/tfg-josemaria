# 🌐 Mundo Animal

**Mundo Animal** es el Trabajo de Fin de Grado (TFG) de José María, una plataforma web para gestionar:

- 🛒 Tienda de productos para mascotas  
- 📰 Blog de noticias y consejos  
- 🗓️ Reserva de citas en clínica veterinaria  
- 👤 Perfil de usuario  
- 🛍️ Carrito de compra  

El proyecto está desarrollado con **Laravel 10**, **MySQL (XAMPP)**, **Blade**, **CSS** y **JavaScript** “a pelo”.  

---

## 📑 Índice

- [Características](#-características)  
- [Tecnologías](#-tecnologías)  
- [Instalación](#-instalación)  
- [Configuración del entorno](#-configuración-del-entorno)  
- [Uso](#-uso)  
- [Estructura de carpetas](#-estructura-de-carpetas)  
- [Esquema de base de datos](#-esquema-de-base-de-datos)  
- [Rutas principales](#-rutas-principales)  
- [Contribuciones](#-contribuciones)  
- [Licencia](#-licencia)  

---

## 🚀 Características

1. **Autenticación**  
   - Registro y login “a pelo” sin paquetes adicionales  
   - Middleware `auth`/`guest` para proteger rutas  

2. **Blog**  
   - Listado paginado de posts  
   - Detalle de artículo con fecha formateada  
   - Cast de fechas con Eloquent  

3. **Tienda**  
   - Página de productos en grid responsive (3-2-1 columnas según pantalla)  
   - Filtro por precio mínimo/máximo  
   - Vista de detalle de producto (PDP)  

4. **Carrito de compra**  
   - Añadir, actualizar cantidad y eliminar productos  
   - Almacenamiento en sesión  
   - Cálculo de subtotal y total  

5. **Citas veterinarias**  
   - Formulario con selector de fecha/hora y validaciones (`after_or_equal:today`)  
   - Listado de “Mis citas” del usuario  
   - Asociación `appointments → user_id`  

6. **Perfil de usuario**  
   - Edición de nombre, email y contraseña  
   - Validaciones y hashing de contraseña  

7. **Responsive design**  
   - Media queries en CSS para todos los módulos  
   - Menú hamburguesa en móvil con toggle JS  

8. **Buenas prácticas**  
   - Uso de partials Blade (`@include('partials.header')`)  
   - Control de versiones con Git  
   - Código limpio y comentado  

---

## 🧰 Tecnologías

- **Backend**: PHP 8, Laravel 10  
- **Base de datos**: MySQL (XAMPP)  
- **Frontend**: Blade, CSS3, JavaScript (vanilla)  
- **Servidor web**: Apache  
- **Control de versiones**: Git / GitHub  

---

## 💻 Instalación

Clona este repositorio y prepara tu entorno:

```bash
# 1. Clonar
git clone https://github.com/josema-2005/tfg-josemaria.git
cd tfg-josemaria

# 2. Dependencias PHP y JS
composer install
npm install

# 3. Variables de entorno
cp .env.example .env
# Rellena en .env tu configuración de DB, APP_URL, etc.

# 4. Generar clave de aplicación
php artisan key:generate

# 5. Migraciones
php artisan migrate

# 6. (Opcional) Seeders
# php artisan db:seed

# 7. Compilar assets (si usas Vite o Laravel Mix)
# npm run dev

# 8. Levantar servidor
php artisan serve
