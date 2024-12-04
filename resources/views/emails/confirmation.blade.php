<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Registro</title>
</head>
<body>
    <h1>¡Hola, {{ $name }}!</h1>
    <p>Gracias por registrarte. Para confirmar tu cuenta, haz clic en el siguiente enlace:</p>
    <a href="{{ url('confirm/'.$email) }}">Confirmar mi correo</a>
</body>
</html>
