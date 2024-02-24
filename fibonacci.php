<?php
// La serie de Fibonacci comienza con 0 y 1, y cada término subsiguiente es la suma de los dos anteriores.
function generarFibonacci($n) {
    $fibonacci = [0, 1];
    for ($i = 2; $i < $n; $i++) {
        $fibonacci[] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }
    return array_slice($fibonacci, 0, $n);
}

// Generar los primeros 10 términos de la serie Fibonacci.
$fibonacciNumbers = generarFibonacci(10);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Serie Fibonacci</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-5">
        <h1 class="text-danger">Primeros 10 números de la serie Fibonacci:</h1>
        <ul>
            <?php foreach ($fibonacciNumbers as $number): ?>
                <p class="text-primary"><?php echo "Número: " . "<strong>$number</strong>"; ?></p>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>