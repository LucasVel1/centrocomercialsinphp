<?php

// Configuración de la conexión a la base de datos
$host = "localhost";
$user = "Lucas";
$pass = "Lukitas123";
$db = "parking_app";

// Conexión a la base de datos
$conn = mysqli_connect($host, $user, $pass, $db);

// Verificación de la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificación del formulario enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $placa = $_POST["placa"];

    // Verificación de la existencia del vehículo en la base de datos
    $query = "SELECT * FROM vehiculos WHERE placa = '$placa'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Si el vehículo existe en la base de datos, se obtiene su información
        $vehiculo = mysqli_fetch_assoc($result);
        
        $hora_entrada = strtotime($vehiculo["hora_entrada"]);
        $hora_salida = time();
        $diferencia = $hora_salida - $hora_entrada;
        $minutos = round($diferencia / 60);

        $valor_por_minuto = 100; // Valor en pesos colombianos
        $valor


