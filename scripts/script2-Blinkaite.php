<?php
/**
 * Clase que representa un producto.
 * 
 * @author Sarune Blinkaite
 * @version 1.1
 */
class Producto {

    /**
     * Código del producto.
     * 
     * @var string $cod Código del producto.
     */   
    private $cod;
    
    /**
     * Descripción del producto.
     * 
     * @var string $desc Descripción del producto.
     */
    private $desc;
    /**
     * Precio del producto.
     * 
     * @var float $precio Precio del producto.
     */
    private $precio;

    /**
     * Este método obtiene el código del producto.
     * 
     * @return string Devuelve el valor del atributo cod.
     */
    public function getCod() {
        return $this->cod;
    }
    
    /**
     * Este método establece el código del producto.
     * 
     * @param string $cod Código que desea establecer. Tiene que ser compuesto sólo por letras y números.
     * @return boolean Devuelve true si el código se ha establecido con éxito, false en caso contrario.
     */
    public function setCod($cod) {
        $resultado = false;
        if (preg_match("/^[a-zA-Z]+[0-9]+$/", $cod)) {
            $this->cod = $cod;
            $resultado = true;
        }
        return $resultado;
    }

     /**
     * Este método estático obtiene un recuento de todos los productos existentes en la base de datos.
     * 
     * @param PDO $pdo Conexión PDO a la base de datos.
     * @return int El número de productos existentes o -1 si la consulta falla o se genera una excepción.
     * @static
     */
    public static function contar(PDO $pdo) {
        $sql = 'SELECT count(id) as total from productos';
        $ret = false;
        try {
            $pdoStmt = $pdo->prepare($sql);
            if ($pdoStmt->execute()) {
                $ret = (int)$pdoStmt->fetch(PDO::FETCH_ASSOC)['total'];
            }
        } catch (PDOException $e) {
            $ret = -1;
        }
        return $ret;
    }
}
