<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $name = isset($_POST['nombre']) ? strip_tags(trim($_POST['nombre'])) : '';
    $phone = isset($_POST['telefono']) ? strip_tags(trim($_POST['telefono'])) : '';
    $email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
    $t_inmueble = isset($_POST['t-inmueble']) ? strip_tags(trim($_POST['t-inmueble'])) : '';
    $ubicacion = isset($_POST['ubicacion']) ? strip_tags(trim($_POST['ubicacion'])) : '';
    $medida = isset($_POST['medida']) ? strip_tags(trim($_POST['medida'])) : '';
    $t_servicio = isset($_POST['t-servicio']) ? strip_tags(trim($_POST['t-servicio'])) : '';

    // Validar los datos
    if (empty($name) || empty($phone) || empty($email) || empty($t_inmueble) || empty($ubicacion) || empty($medida) || empty($t_servicio)) {
        echo "Por favor completa todos los campos.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El correo electrónico no es válido.";
        exit;
    }

    // Asunto del correo y destinatario
    $to = "contacto@gservigue.com"; // Reemplazar con la dirección de destino
    $email_subject = "Formulario de Cotización | Servigue";

    // Formatear el cuerpo del mensaje
    $email_body = "Nuevo mensaje del formulario de cotización.\n\n" .
                  "Nombre: $name\n" .
                  "Teléfono: $phone\n" .
                  "Correo: $email\n" .
                  "Tipo de Inmueble: $t_inmueble\n" .
                  "Ubicación: $ubicacion\n" .
                  "Metros Cuadrados: $medida\n" .
                  "Tipo de Servicio: $t_servicio\n" .

    // Cabeceras del correo (remitente y reply-to)
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    //$headers .= "CC: rlwev@hotmail.com\r\n";  // Copia visible
    $headers .= "CC: daniel.villena@wisewsisolutions.com\r\n";  // Copia visible
    $headers .= "BCC: hola@luisweb.me\r\n";    // Copia oculta
    //$headers .= "BCC: luis.rlwev@gmail.com\r\n";    // Copia oculta
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";


    // Enviar el correo
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "El mensaje ha sido enviado con éxito.";
    } else {
        echo "Hubo un error al enviar el mensaje. Inténtalo de nuevo.";
    }
}
?>