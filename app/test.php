<?php
$filePath = ('app/services/google-service.json');

if ($filePath === false) {
    echo "File tidak ditemukan.\n";
} else {
    echo "File ditemukan di: $filePath\n";
    echo "Isi file:\n";
    echo file_get_contents($filePath);
}