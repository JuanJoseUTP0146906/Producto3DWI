<?php
session_start(); // Iniciar sesión
require __DIR__ . '/../modelo/modelo.php';

// Inicializa el carrito si no está definido
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Agregar un vehículo al carrito
if (isset($_GET['accion']) && $_GET['accion'] == 'agregar') {
    $id = intval($_GET['id']);
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]++;
    } else {
        $_SESSION['carrito'][$id] = 1;
    }
    header("Location: /Producto3DWI/Producto3DWI/shop.php");
    exit();
}

// Eliminar un vehículo del carrito
if (isset($_GET['accion']) && $_GET['accion'] == 'eliminar') {
    $id = intval($_GET['id']);
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]--;
        if ($_SESSION['carrito'][$id] <= 0) {
            unset($_SESSION['carrito'][$id]);
        }
    }
    header("Location: /Producto3DWI/Producto3DWI/carrito.php");
    exit();
}

// Manejar la compra después del pago con PayPal
if (isset($_POST['paypal_payment_complete']) && $_POST['paypal_payment_complete'] == '1') {
    $usuario_id = 1; // Asigna un ID de usuario según tu lógica
    guardarCompra($usuario_id);
    header("Location: /Producto3DWI/Producto3DWI/index.php");
    exit();
}

// Agregar un nuevo vehículo (desde un formulario de administración)
if (isset($_POST['accion']) && $_POST['accion'] == 'agregar_vehiculo') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $imagen = $_FILES['imagen']['name'];

    // Validación de datos
    if (empty($nombre) || empty($precio) || empty($imagen)) {
        header("Location: /Producto3DWI/Producto3DWI/admin.php?error=faltan_datos");
        exit();
    }

    // Validación del tipo de archivo
    $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
    if (!in_array($_FILES['imagen']['type'], $allowed_types)) {
        header("Location: /Producto3DWI/Producto3DWI/admin.php?error=tipo_de_archivo_invalido");
        exit();
    }

    // Subir imagen
    $target_dir = "C:/xampp/htdocs/Producto3DWI/Producto3DWI/assets/img/";
    $target_file = $target_dir . uniqid() . "_" . basename($_FILES["imagen"]["name"]);
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
        agregarVehiculo($nombre, $precio, basename($target_file)); // Guardar solo el nombre del archivo
        header("Location: /Producto3DWI/Producto3DWI/admin.php?exito=vehiculo_agregado");
    } else {
        header("Location: /Producto3DWI/Producto3DWI/admin.php?error=error_al_subir_imagen");
    }
}
?>
