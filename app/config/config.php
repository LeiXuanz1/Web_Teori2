<?php
define("APP_NAME", "SIM Barang");

// BASE URL (htdocs)
define("BASE_URL", "http://localhost/sim-barang/public");

date_default_timezone_set('Asia/Jakarta');

// Get the correct upload directory path
define("UPLOAD_DIR", dirname(dirname(dirname(__FILE__))) . "/public/uploads/");  

define("UPLOAD_URL", BASE_URL . "/uploads/");

define("ALLOWED_TYPES", ['image/jpeg', 'image/png', 'image/jpg']);

define("MAX_UPLOAD_SIZE", 2 * 1024 * 1024);

define("RENAME_FILE_ON_UPLOAD", true);

?>