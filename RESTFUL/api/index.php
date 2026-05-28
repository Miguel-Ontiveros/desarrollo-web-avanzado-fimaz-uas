<?php
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    }

    include_once '../configuracion/Database.php';
    include_once '../clases/Productos.php';

    $database = new Database();
    $db = $database->getConnection();
    $productos = new Productos($db);

    $method = $_SERVER['REQUEST_METHOD'];

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    $basePath = '/RESTFUL/api';
    $endpoint = str_replace($basePath, '', $uri);
    $endpoint = trim($endpoint, '/');

    $segments = explode('/', $endpoint);

    if ($segments[0] !== 'productos') {
        http_response_code(404);
        echo json_encode(array("message" => "Recurso no encontrado."));
        exit();
    }

    if ($method === 'GET' && count($segments) === 1) {
        $stmt = $productos->getProductos();
        $total = $stmt->rowCount();

        if ($total > 0) {
            $productos = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $productos[] = $row;
            }

            http_response_code(200);
            echo json_encode($productos);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "No se encontraron productos."]);
        }
        exit;
    }

    if ($method === 'GET' && count($segments) === 2 && is_numeric($segments[1])) {
        $productos->idProducto = (int) $segments[1];

        if ($productos->getProducto()) {
            http_response_code(200);
            echo json_encode([
                "idProducto" => $productos->idProducto,
                "nombreProducto" => $productos->nombreProducto,
                "descripcion" => $productos->descripcion,
                "precioCompra" => $productos->precioCompra,
                "precioVenta" => $productos->precioVenta,
                "existencia" => $productos->existencia
            ]);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "Producto no encontrado."]);
        }
        exit;
    }

    if ($method === 'POST' && count($segments) === 1) {
        $data = json_decode(file_get_contents("php://input"));

        $errores = [];

        if (empty($data->nombreProducto)) {
            $errores[] = "El nombre del producto es requerido.";
        }

        if (!isset($data->precioCompra) || $data->precioCompra < 0) {
            $errores[] = "El precio de compra no puede ser negativo.";
        }

        if (!isset($data->precioVenta)  || $data->precioVenta < 0) {
            $errores[] = "El precio de venta no puede ser negativo.";
        }

        if (!isset($data->existencia) || $data->existencia < 0) {
            $errores[] = "La existencia no puede ser negativa.";
        }

        if (isset($data->precioVenta, $data->precioCompra) && $data->precioVenta < $data->precioCompra) {
            $errores[] = "El precio de venta no puede ser menor que el precio de compra.";
        }

        if (!empty($errores)) {
            http_response_code(400);
            echo json_encode(["status" => "error", "errors" => $errores]);
            exit;
        }
        
        $productos->nombreProducto = $data->nombreProducto;
        $productos->descripcion = $data->descripcion ?? '';
        $productos->precioCompra = $data->precioCompra;
        $productos->precioVenta = $data->precioVenta;
        $productos->existencia = $data->existencia;

        if ($productos->setProducto()) {
            http_response_code(201);
            echo json_encode(["status" => "success", "message" => "Producto creado exitosamente."]);
        } else {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "No se pudo crear el producto."]);
        }
        
        exit;
    }

    if ($method === 'PUT' && count($segments) === 2) {

        $data = json_decode(file_get_contents("php://input"));
        $productos->idProducto = (int) $segments[1];

        $errores = [];

        if (empty($data->nombreProducto)) {
            $errores[] = "El nombre del producto es requerido.";
        }

        if ($data->precioCompra < 0) {
            $errores[] = "Precio de compra invalido.";
        }

        if ($data->precioVenta < 0) {
            $errores[] = "Precio de venta invalido.";
        }

        if ($data->existencia < 0) {
            $errores[] = "Existencia invalida.";
        }

        if ($data->precioVenta < $data->precioCompra) {
            $errores[] = "El precio de venta no puede ser menor que el precio de compra.";
        }

        if (!empty($errores)) {
            http_response_code(400);
            echo json_encode(["status" => "error", "errors" => $errores]);
            exit;
        }

        $productos->nombreProducto = $data->nombreProducto;
        $productos->descripcion = $data->descripcion;
        $productos->precioCompra = $data->precioCompra;
        $productos->precioVenta = $data->precioVenta;
        $productos->existencia = $data->existencia;

        if ($productos->updateProducto()) {
            http_response_code(200);
            echo json_encode(["status" => "success", "message" => "Actualizado"]);
        } else {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Error al actualizar."]);
        }

        exit;
    }

    if ($method === 'DELETE' && count($segments) === 2 && is_numeric($segments[1])) {
        $productos->idProducto = (int) $segments[1];

        if ($productos->borrarProducto()) {
            http_response_code(200);
            echo json_encode(["message" => "Producto eliminado exitosamente."]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Error al eliminar el producto."]);
        }
        exit;
    }

    http_response_code(405);
    echo json_encode(["message" => "Método no permitido."]);
?>