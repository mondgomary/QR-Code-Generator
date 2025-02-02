<?php
function qr_code_generator_shortcode($atts) {
    $default_size = get_option('qr_generator_size', '200');  // Načítanie predvolenej veľkosti
    $default_iban = get_option('qr_generator_iban', '');  // Načítanie predvoleného IBAN

    $atts = shortcode_atts(array(
        'data' => 'Platba',
        'size' => $default_size,
        'iban' => $default_iban,
        'vs' => ''  // Variabilný symbol môže byť prázdny
    ), $atts);

    $data = esc_attr($atts['data']);
    $size = esc_attr($atts['size']);
    $iban = esc_attr($atts['iban']);
    $vs = esc_attr($atts['vs']);

    // Dynamické pripojenie údajov do QR kódu (vrátane variabilného symbolu, ak je dostupný)
    $qr_data = "SPD*1.0*ACC:{$iban}*AM:0.00*MSG:{$data}";
    if (!empty($vs)) {
        $qr_data .= "*X-VS:{$vs}";
    }

    return "<img src='https://api.qrserver.com/v1/create-qr-code/?size={$size}x{$size}&data=" . urlencode($qr_data) . "' alt='QR Kód' style='border:1px solid #ccc; padding:5px;'>";
}

add_shortcode('qr_code_generator', 'qr_code_generator_shortcode');

