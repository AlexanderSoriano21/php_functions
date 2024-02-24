<?php
// Función para verificar si un número es primo o no.
function esPrimo($numero) {
    if ($numero <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) {
            return false;
        }
    }
    return true;
}

// Inicializar la variable de respuesta.
$respuesta = "";

// Verificar si se envió el formulario.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el número del formulario.
    $numero = isset($_POST['numero']) ? intval($_POST['numero']) : 0;

    // Verificar si el número es primo.
    if (esPrimo($numero)) {
        $respuesta = "El número $numero es primo.";
    } else {
        $respuesta = "El número $numero no es primo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificar Número Primo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container text-center mt-5">
        <h1>Verificar Número Primo</h1>

        <!-- Formulario para ingresar números por el usuario -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="numero">Número:</label>
            <input type="number" id="numero" name="numero" required>

            <button type="submit" class="btn btn-success" name="verificar">Verificar</button>
        </form>

        <!-- Mostrar respuesta -->
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "<div><strong>$respuesta</strong></div>";
            }
        ?>
    </div>
</body>
</html>