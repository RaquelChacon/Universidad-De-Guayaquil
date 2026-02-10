<?php
require_once '../app/config/database.php';

$db = new Database();
$conn = $db->connect();

if ($conn) {
    echo "CONEXIÓN A BASE DE DATOS OK";
} else {
    echo "ERROR DE CONEXIÓN";
}
