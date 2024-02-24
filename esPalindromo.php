<?php
// Función para verificar si un texto es palíndromo o no.
function esPalindromo($texto) {
    $textoLimpio = strtolower(preg_replace('/[^A-Za-z0-9]/', '', $texto));
    return $textoLimpio === strrev($textoLimpio);
}

// Inicializar la variable de respuesta.
$respuesta = "";

// Verificar si se envió el formulario.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el texto del formulario.
    $texto = isset($_POST['texto']) ? $_POST['texto'] : '';

    // Verificar si el texto es palíndromo.
    if (esPalindromo($texto)) {
        $respuesta = "El texto es un palíndromo.";
    } else {
        $respuesta = "El texto no es un palíndromo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificar Palíndromo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container text-center mt-5">
        <div class="border border-primary border-2 rounded p-3">
            <h1 class="text-primary mb-3">Verificador de Palíndromo</h1>

            <!-- Formulario para ingresar el texto a verificar-->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="texto">Texto:</label>
                <input type="text" id="texto" name="texto" required>
                <button type="submit" class="btn btn-success" name="verificar">Verificar</button>
            </form>

            <!-- Mostrar la respuesta -->
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "<p class='fs-3 mt-2'><strong>$respuesta</strong></p>";
            }
            ?>
        </div>

        <!-- INFO -->
        <div class="text-start">
            <h2 class="text-danger mt-5">¿Qué es un palíndromo?</h2>
            <p class="fs-5">Un palíndromo es una palabra, frase o secuencia que se lee igual en ambas direcciones.</p>
            <p class="fw-bold">Ejemplos:</p>
            <p class="fw-bold text-primary">A luna ese anula</p>
            <p class="fw-bold text-primary">A la catalana banal, atácala</p>
            <p class="fw-bold text-primary">A ti no, bonita</p>
        </div>
    </div>
</body>
</html>