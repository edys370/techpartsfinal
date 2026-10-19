# TechParts - Configuración Core y Backend (Rama de Andrés)

Este directorio contiene los archivos de configuración técnica, la base de datos y la arquitectura central de la tienda en línea **TechParts**, desarrollada con WordPress y WooCommerce para la asignatura de Ingeniería Web.

## 📂 Archivos en esta rama

Al trabajar en un entorno CMS (WordPress), la configuración no reside en código plano, sino en la base de datos relacional y la integración de plugins. Por ello, mi constancia de trabajo técnico se respalda en los siguientes archivos:

1. **`*.wpress` (Clon del Sitio):** Archivo de exportación completo del entorno local. Contiene la base de datos (con las zonas de envío, impuestos, configuraciones de FluentSMTP), el catálogo de productos, el tema Storefront y las personalizaciones visuales.
2. **`techparts-funciones.php` (Código a Medida):** Plugin personalizado desarrollado en PHP para cumplir con el reto de la rúbrica. Incluye la lógica para mostrar alertas de compatibilidad de componentes, políticas debajo del botón de compra y la integración dinámica del botón flotante de WhatsApp (precargando el nombre y SKU del producto).
3. **`catalogo_techparts.csv` (Datos Base):** Archivo utilizado para la importación inicial masiva de las 4 categorías, atributos (Switch, Capacidad) y los 10 productos variables/simples de la tienda.

## ⚙️ Arquitectura y Decisiones Técnicas

*   **Entorno de Desarrollo:** LocalWP (Nginx, PHP 8.2, MySQL 8.4). Se eligió por su rapidez para levantar servidores aislados.
*   **Gestor de Correos (SMTP):** `FluentSMTP` conectado mediante API a Gmail (Contraseñas de Aplicación). Se descartó la función `mail()` de PHP por seguridad y entregabilidad. *(Nota: Por seguridad, las credenciales SMTP no se exponen en este repositorio).*
*   **Tema Frontend:** `Storefront`. Se utilizó por ser el tema oficial y más ligero de WooCommerce, garantizando 100% de compatibilidad y diseño responsivo sin sobrecargar el servidor.
*   **Facturación:** `PDF Invoices & Packing Slips for WooCommerce`. Seleccionado para automatizar el envío de facturas en PDF adjuntas en el correo de confirmación del cliente.

## 🚀 Guía de Despliegue (Cómo evaluar la tienda)

Para restaurar la tienda exacta y evaluar la configuración técnica, siga estos pasos:

1. Instale una instancia limpia de WordPress (puede usar LocalWP, XAMPP o un hosting).
2. En el panel de WordPress, vaya a **Plugins > Añadir nuevo** e instale el plugin gratuito **All-in-One WP Migration**.
3. Active el plugin, vaya a su menú en la barra lateral y seleccione **Importar**.
4. Arrastre y suelte el archivo `.wpress` incluido en esta rama.
5. Espere a que finalice el proceso, guarde los enlaces permanentes (Ajustes > Enlaces permanentes) y la tienda TechParts estará 100% operativa.

## 🧪 Estado de Pruebas

Durante el desarrollo local se verificó satisfactoriamente:
*   Flujo de compra completo (Añadir al carrito -> Checkout -> Transferencia Bancaria/Contra Reembolso).
*   Recepción del correo de confirmación de pedido (cliente) y aviso de nuevo pedido (administrador).
*   Enrutamiento del botón dinámico de WhatsApp hacia la aplicación/web con el SKU correspondiente.