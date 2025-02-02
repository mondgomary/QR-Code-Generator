<?php
add_action('admin_menu', 'qr_generator_add_settings_page');

function qr_generator_add_settings_page() {
    add_options_page(
        'Nastavenia QR Code Generator',
        'QR Code Generator',
        'manage_options',
        'qr-generator-settings',
        'qr_generator_render_settings_page'
    );
}

function qr_generator_render_settings_page() {
    // Uloženie veľkosti QR kódu a IBAN
    if (isset($_POST['qr_generator_save'])) {
        $size = sanitize_text_field($_POST['qr_generator_size']);
        $iban = sanitize_text_field($_POST['qr_generator_iban']);
        update_option('qr_generator_size', $size);
        update_option('qr_generator_iban', $iban);

        echo '<div class="updated"><p>Nastavenia boli uložené.</p></div>';
    }

    // Načítanie aktuálnych nastavení
    $current_size = get_option('qr_generator_size', '200');
    $current_iban = get_option('qr_generator_iban', '');

    ?>

    <div class="wrap">
        <h1>Nastavenia QR Code Generator</h1>
        <form method="POST">
            <label for="qr_generator_size">Veľkosť QR kódu (v pixeloch):</label><br>
            <input type="number" id="qr_generator_size" name="qr_generator_size" value="<?php echo esc_attr($current_size); ?>" min="100" max="1000" step="50" required>
            <p class="description">Zadajte veľkosť QR kódu. Štandardná veľkosť je 200px.</p>

            <br>
            <label for="qr_generator_iban">IBAN:</label><br>
            <input type="text" id="qr_generator_iban" name="qr_generator_iban" value="<?php echo esc_attr($current_iban); ?>" pattern="[A-Z0-9]{15,34}" title="Zadajte platný IBAN">
            <p class="description">Zadajte predvolený IBAN, ktorý sa použije, ak nebude zadaný pri volaní shortcodu.</p>

            <br><br>
            <input type="submit" name="qr_generator_save" value="Uložiť nastavenia" class="button-primary">
        </form>
    </div>
    <?php
}
