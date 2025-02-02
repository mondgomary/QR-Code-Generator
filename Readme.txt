QR Code Generator

Štruktúra priečinka plug-inu:
qr-code-generator/
├── qr-code-generator.php
├── includes/
│   └── qr-shortcode.php
├── assets/
│   └── styles.css (ak je potrebný)

Použitie shortcodu
Shortcode môžete použiť na akejkoľvek stránke alebo v akejkoľvek časti WordPressu:

Príklad použitia:
[qr_code_generator data="Platba pre: OZ alebo Firmu"]

Ak chcete dynamicky upraviť veľkosť priamo v shortcode, môžete to urobiť napríklad takto:
[qr_code_generator data="Platba pre: OZ alebo Firmu" size="300"]

[qr_code_generator data="Platba pre: Firma" iban="SK1234567890123456789012" vs="12345"]


