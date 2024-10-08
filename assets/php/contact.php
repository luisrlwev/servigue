<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $name = isset($_POST['contact-name']) ? strip_tags(trim($_POST['contact-name'])) : '';
    $email = isset($_POST['contact-email']) ? filter_var(trim($_POST['contact-email']), FILTER_SANITIZE_EMAIL) : '';
    $phone = isset($_POST['contact-phone']) ? strip_tags(trim($_POST['contact-phone'])) : '';
    $subject = isset($_POST['contact-subject']) ? strip_tags(trim($_POST['contact-subject'])) : '';
    $message = isset($_POST['contact-messgae']) ? strip_tags(trim($_POST['contact-messgae'])) : '';

    // Validar los datos
    if (empty($name) || empty($email) || empty($phone) || empty($subject) || empty($message)) {
        echo "Por favor completa todos los campos.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El correo electrónico no es válido.";
        exit;
    }

    // Asunto del correo y destinatario
    $to = "contacto@gservigue.com"; // Reemplazar con la dirección de destino
    $email_subject = "Formulario de Contacto | Servigue";

    // Formatear el cuerpo del mensaje
    $email_body = "Nuevo mensaje del formulario de contacto.\n\n" .
                  "Asunto: $subject\n" .
                  "Nombre: $name\n" .
                  "Correo: $email\n" .
                  "Teléfono: $phone\n" .
                  "Mensaje:\n$message";

    // Cabeceras del correo (remitente y reply-to)
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "CC: daniel.villena@wisewsisolutions.com\r\n";  // Copia visible
    $headers .= "BCC: hola@luisweb.me\r\n";    // Copia oculta
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";


    // Enviar el correo
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "El mensaje ha sido enviado con éxito.";
    } else {
        echo "Hubo un error al enviar el mensaje. Inténtalo de nuevo.";
    }
}
?>