<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario y los sanitiza para evitar ataques de inyección
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $correo = htmlspecialchars(trim($_POST['correo']));
    $telefono = htmlspecialchars(trim($_POST['telefono']));
    $mensaje = htmlspecialchars(trim($_POST['mensaje']));

    // Valida que los campos no estén vacíos
    if (!empty($nombre) && !empty($correo) && !empty($telefono) && !empty($mensaje)) {
        // Configura los detalles del correo
        $to = "javierc06montoya@gmail.com"; // Reemplaza con tu dirección de correo
        $subject = "Nuevo mensaje de contacto de $nombre";
        $body = "Nombre: $nombre\nCorreo: $correo\nTeléfono: $telefono\n\nMensaje:\n$mensaje";
        $headers = "From: $correo";

        // Envia el correo
        if (mail($to, $subject, $body, $headers)) {
            echo "Mensaje enviado correctamente.";
        } else {
            echo "Hubo un error al enviar tu mensaje. Por favor, intenta de nuevo.";
        }
    } else {
        echo "Por favor, completa todos los campos.";
    }
}
?>
