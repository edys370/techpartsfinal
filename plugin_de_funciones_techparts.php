<?php
/**
 * Plugin Name: TechParts - Compatibilidad y WhatsApp Técnico
 * Description: Agrega el aviso técnico de compatibilidad, horario de atención y botón dinámico de WhatsApp por SKU en cada ficha de producto de WooCommerce.
 * Version: 1.0.0
 * Author: Equipo TechParts - Ingeniería Web UCACUE
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * 1. RETO ADICIONAL TECHPARTS + WHATSAPP EN FICHA DE PRODUCTO
 * Se ejecuta justo debajo del botón "Añadir al carrito" en cada producto.
 */
add_action( 'woocommerce_after_add_to_cart_form', 'techparts_bloque_compatibilidad_y_whatsapp', 15 );

function techparts_bloque_compatibilidad_y_whatsapp() {
    global $product;

    if ( ! $product ) {
        return;
    }

    $telefono_whatsapp = '593997586519';

    $nombre_producto = $product->get_name();
    $sku_producto    = $product->get_sku() ? $product->get_sku() : 'SIN-SKU';

    // Mensaje precargado codificado para URL
    $mensaje_texto = sprintf(
        'Hola TechParts, necesito asesoría técnica de compatibilidad para el componente: %s (SKU: %s). Mi placa base/equipo actual es: ',
        $nombre_producto,
        $sku_producto
    );
    $url_whatsapp = 'https://wa.me/' . $telefono_whatsapp . '?text=' . rawurlencode( $mensaje_texto );

    ?>
    <div style="margin-top:20px; padding:16px; background-color:#fff7ed; border:1px solid #fdba74; border-radius:8px; font-size:14px; color:#7c2d12;">
        <strong style="display:block; font-size:15px; margin-bottom:6px; color:#c2410c;">
            ⚠️ Aviso Técnico de Compatibilidad (TechParts)
        </strong>
        <p style="margin:0 0 8px 0;">
            Antes de finalizar tu compra, verifica que tu placa base (Socket AM4/AM5/LGA1700), generación de memoria (DDR4 vs DDR5), ranura M.2 PCIe y potencia de fuente (PSU) sean compatibles con <strong><?php echo esc_html( $nombre_producto ); ?></strong>.
        </p>
        <p style="margin:0; font-size:13px; color:#9a3412;">
            📌 <strong>Inventario por variación:</strong> Selecciona la capacidad o tipo de switch arriba para ver la disponibilidad exacta en tiempo real.
        </p>
    </div>

    <div style="margin-top:14px; padding:16px; background-color:#f0fdf4; border:1px solid #86efac; border-radius:8px;">
        <a href="<?php echo esc_url( $url_whatsapp ); ?>" target="_blank" rel="noopener noreferrer"
           style="display:inline-block; width:100%; text-align:center; background-color:#16a34a; color:#ffffff; font-weight:600; padding:12px 16px; border-radius:6px; text-decoration:none; font-size:15px;">
            💬 Consultar compatibilidad por WhatsApp (SKU: <?php echo esc_html( $sku_producto ); ?>)
        </a>
        <p style="margin:8px 0 0 0; font-size:12px; color:#166534; text-align:center;">
            🕒 <strong>Horario de Atención Técnica:</strong> Lunes a Sábado de 09h00 a 19h00 (Hora de Ecuador).
        </p>
    </div>
    <?php
}

/**
 * 2. BOTÓN FLOTANTE DE WHATSAPP EN TODA LA TIENDA (PIE DE PÁGINA)
 * Cumple el requisito de botón flotante + horario visible sin depender de configuraciones externas.
 */
add_action( 'wp_footer', 'techparts_boton_flotante_whatsapp' );

function techparts_boton_flotante_whatsapp() {
    $telefono_whatsapp = '593991234567'; // Cambia por tu número
    $mensaje_general   = 'Hola TechParts, estoy visitando la tienda en línea y necesito asesoría para armar o actualizar mi PC.';
    $url_flotante      = 'https://wa.me/' . $telefono_whatsapp . '?text=' . rawurlencode( $mensaje_general );
    ?>
    <div style="position:fixed; bottom:24px; right:24px; z-index:9999; text-align:right; font-family:sans-serif;">
        <div style="background:#0f172a; color:#f8fafc; font-size:11px; padding:4px 10px; border-radius:4px; margin-bottom:6px; display:inline-block;">
            🟢 Soporte Técnico: Lun–Sáb 09h00–19h00
        </div>
        <br>
        <a href="<?php echo esc_url( $url_flotante ); ?>" target="_blank" rel="noopener noreferrer"
           style="display:inline-block; background:#16a34a; color:#ffffff; padding:12px 20px; border-radius:50px; font-weight:bold; font-size:15px; text-decoration:none; box-shadow:0 4px 12px rgba(0,0,0,0.25);">
            💬 Chat Técnico TechParts
        </a>
    </div>
    <?php
}