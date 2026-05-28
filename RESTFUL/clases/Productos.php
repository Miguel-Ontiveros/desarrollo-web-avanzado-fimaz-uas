<?php
    class Productos {

    private $conn;

    private $tabla = "productos";

    public $idProducto;
    public $nombreProducto;
    public $descripcion;
    public $precioCompra;
    public $precioVenta;
    public $existencia;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getProductos() {
        $consultarSQL = "SELECT idProducto, nombreProducto, descripcion, precioCompra, precioVenta, existencia FROM " . $this->tabla;
        $stmt = $this->conn->prepare($consultarSQL);
        $stmt->execute();
        return $stmt;
    }

    public function getProducto() {
        $consultarSQL = "SELECT idProducto, nombreProducto, descripcion, precioCompra, precioVenta, existencia FROM " . $this->tabla . " WHERE idProducto = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($consultarSQL);
        $stmt->bindParam(1, $this->idProducto);
        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$dataRow) {
            $this->nombreProducto = $dataRow['nombreProducto'];
            $this->descripcion = $dataRow['descripcion'];
            $this->precioCompra = $dataRow['precioCompra'];
            $this->precioVenta = $dataRow['precioVenta'];
            $this->existencia = $dataRow['existencia'];
            return true;
        }

        return false;
        
    }

    public function setProducto() {
        $consultarSQL = "INSERT INTO " . $this->tabla . " SET nombreProducto=:nombreProducto, descripcion=:descripcion, precioCompra=:precioCompra, precioVenta=:precioVenta, existencia=:existencia";
        $stmt = $this->conn->prepare($consultarSQL);

        $this->nombreProducto = htmlspecialchars(strip_tags($this->nombreProducto));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->precioCompra = htmlspecialchars(strip_tags($this->precioCompra));
        $this->precioVenta = htmlspecialchars(strip_tags($this->precioVenta));
        $this->existencia = htmlspecialchars(strip_tags($this->existencia));

        $stmt->bindParam(":nombreProducto", $this->nombreProducto);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":precioCompra", $this->precioCompra);
        $stmt->bindParam(":precioVenta", $this->precioVenta);
        $stmt->bindParam(":existencia", $this->existencia);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function borrarProducto() {
        $consultarSQL = "DELETE FROM " . $this->tabla . " WHERE idProducto = ?";
        $stmt = $this->conn->prepare($consultarSQL);

        $this->idProducto = htmlspecialchars(strip_tags($this->idProducto));
        $stmt->bindParam(1, $this->idProducto);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function updateProducto() {
        $consultarSQL = "UPDATE " . $this->tabla . " SET nombreProducto=:nombreProducto, descripcion=:descripcion, precioCompra=:precioCompra, precioVenta=:precioVenta, existencia=:existencia WHERE idProducto = :idProducto";
        $stmt = $this->conn->prepare($consultarSQL);

        $this->idProducto = htmlspecialchars(strip_tags($this->idProducto));
        $this->nombreProducto = htmlspecialchars(strip_tags($this->nombreProducto));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->precioCompra = htmlspecialchars(strip_tags($this->precioCompra));
        $this->precioVenta = htmlspecialchars(strip_tags($this->precioVenta));
        $this->existencia = htmlspecialchars(strip_tags($this->existencia));

        $stmt->bindParam(":idProducto", $this->idProducto);
        $stmt->bindParam(":nombreProducto", $this->nombreProducto);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":precioCompra", $this->precioCompra);
        $stmt->bindParam(":precioVenta", $this->precioVenta);
        $stmt->bindParam(":existencia", $this->existencia);

        return $stmt->execute();
    }
}
?>