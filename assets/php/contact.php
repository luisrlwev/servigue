<?php
// Incluir los archivos de PHPMailer
require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

// Usar los espacios de nombres de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

    // Crear una nueva instancia de PHPMailer
    $mail = new PHPMailer(true);  // 'true' para habilitar excepciones

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();  // Usar SMTP
        $mail->Host = 'mail.servigue.com';  // Servidor SMTP, reemplazar por el correcto
        $mail->SMTPAuth = true;  // Activar autenticación SMTP
        $mail->Username = 'info@servigue.com';  // Tu correo SMTP
        $mail->Password = 'Servigue-2024@.';  // Tu contraseña SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  // Encriptación TLS
        $mail->Port = 465;  // Puerto TCP para TLS

        // Configuración de los destinatarios
        $mail->setFrom($email, $name);  // El correo del remitente (de la persona que envía)
        $mail->addAddress('contacto@gservigue.com');  // Añadir destinatario principal
        $mail->addReplyTo($email, $name);  // Añadir dirección para respuestas

        // Opcional: agregar destinatarios adicionales
        $mail->addCC('daniel.villena@wisewsisolutions.com');  // Añadir CC (copia)
        $mail->addBCC('hola@luisweb.me');  // Añadir BCC (copia oculta)

        // Contenido del correo
        $mail->isHTML(true);  // Establecer el formato del correo en HTML
        $mail->Subject = "Formulario de Contacto | Servigue";
        $mail->Body    = "Nuevo mensaje del formulario de contacto.<br><br>" .
                         "Asunto: $subject<br>" .
                         "Nombre: $name<br>" .
                         "Correo: $email<br>" .
                         "Teléfono: $phone<br>" .
                         "Mensaje:<br>$message";
        $mail->AltBody = "Nuevo mensaje del formulario de contacto.\n\n" .
                         "Asunto: $subject\n" .
                         "Nombre: $name\n" .
                         "Correo: $email\n" .
                         "Teléfono: $phone\n" .
                         "Mensaje:\n$message";

        // Enviar el correo
        $mail->send();
        echo "El mensaje ha sido enviado con éxito.";
    } catch (Exception $e) {
        echo "Hubo un error al enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>