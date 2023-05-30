<?php
/**
 * Este script tiene definidas dos funciones que calculan el perímetro de un rectangulo y el índice de masa corporal de una persona.
 * 
 * @author Sarune Blinkaite
 * @version 1.0
 * @copyright (c) 2023, Sarune Blinkaite
 */

/**
 * Esta función calcula el perímetro de un rectángulo.
 *
 * @param float $ancho Ancho del rectángulo.
 * @param float $alto Alto del rectángulo.
 * 
 * @throws Exception si los parametros ancho y alto son inferiores a cero.
 *
 * @return float Perímetro del rectángulo.
 * 
 * @version 1.0
 */
function calcularPerimetroRectangulo($ancho, $alto) {
    if($ancho < 0 || $alto < 0){
        throw new Exception('El ancho y alto no puede ser inferior a cero.');
    }
    $perimetro = 2 * ($ancho + $alto);
    return $perimetro;
}

/**
 * Esta función calcula el índice de masa corporal (IMC).
 *
 * @param float $peso Peso de la persona en kilogramos.
 * @param float $estatura Estatura de la persona en metros.
 *
 * @return float Índice de masa corporal (IMC).
 * @version 1.0
 */
function calcularIMC($peso, $estatura) {
    $imc = ($peso / ($estatura * $estatura));
    return number_format($imc, 2);
}

// Ejemplo de uso

$perimetroRectangulo = null;
$anchoRectangulo = 5;
$altoRectangulo = 8;
try {
    $perimetroRectangulo = calcularPerimetroRectangulo($anchoRectangulo, $altoRectangulo);
} catch (Exception $exc) {
    echo $exc->getMessage();
}

$pesoPersona = 63;
$estaturaPersona = 1.65;
$imcPersona = calcularIMC($pesoPersona, $estaturaPersona);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE = edge">
        <meta name="viewport" content="width = device-width, initial-scale = 1.0">
        <title>Resultados</title>
    </head>
    <body>
        <h1>Resultados</h1>
        <p>Perímetro del rectángulo: <?=$perimetroRectangulo; ?></p>
        <p>Índice de masa corporal (IMC): <?=$imcPersona; ?></p>
    </body>
</html>


