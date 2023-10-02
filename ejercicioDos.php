<?php
/* Trabajo Práctico Final. Alumno: Nicolás A. Pannunzio
Ejercicio II : "Carrito de supermercado" */

class Producto {
    # Propiedades del Producto
        private $nombre;
        private $descripcion;
        private $precio;
        private $cantidadDisponible;

    # Constructor de la clase Producto
        public function __construct($nombre, $descripcion, $precio, $cantidadDisponible){
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->precio = $precio;
            $this->cantidadDisponible = $cantidadDisponible;
        }
    
    # Método Nombre
    public function getNombre() {
        return $this->nombre;
    }

    # Método Descripción
    public function getDescripcion() {
        return $this->descripcion;
    }

    # Método Cantidad disponible
    public function getCantidadDisponible() {
        return $this->cantidadDisponible;
    }

    # Método Precio
    public function getPrecio() {
        return $this->precio;
    }
}

class Carrito {
    # Propiedades del carrito
        private $productos = array();

    # Constructor de la clase carrito
        public function __construct(){
            $this->productos = array();
        }

    # Método para agregar productos al carrito
        public function agregarProducto($producto, $cantidad) {
            if (array_key_exists($producto->getNombre(), $this->productos)) {
                $this->productos[$producto->getNombre()]["cantidad"] += $cantidad;
            } else {
                $this->productos[$producto->getNombre()] = array("producto" => $producto, "cantidad" => $cantidad);
            }
        }

    # Método para quitar productos del carrito
        public function quitarProducto($producto) {
            if (array_key_exists($producto->getNombre(), $this->productos)) {
                unset($this->productos[$producto->getNombre()]);
            }
        }
        
    # Método para calcular el precio total de productos en el carrito
        public function calcularTotal() {
            $total = 0;
            foreach ($this->productos as $producto) {
                $total += $producto["producto"]->getPrecio() * $producto["cantidad"];
            }
            return $total;
    }

    # Método para listar productos
        public function listarCarrito() {
            foreach ($this->productos as $pro) {    
                echo "<br></br>";    
                echo     $pro['producto']->getNombre();
                echo "<br></br>";
                echo     $pro['producto']->getDescripcion();
                echo "<br></br>";
                echo     $pro['producto']->getPrecio();
                echo "<br></br>";
                echo     $pro['cantidad'];
                echo "<br></br>";
                echo "<br></br>";
                }
            }
}

# Crear instancias de la clase Producto
$producto1 = new Producto("Yerba", "Producto de primera necesidad", 740, 5);
$producto2 = new Producto("Arroz", "No apto en dieta", 250, 3);
$producto3 = new Producto("Lavandina", "Indispensable para limpiar", 415, 2);
$producto4 = new Producto("Frutas", "Frescas y saludables", 305, 10);

# Crear una instancia de la clase Carrito
$carrito = new Carrito();

# Agregar los productos al inventario
$carrito ->agregarProducto($producto1, 2);
$carrito ->agregarProducto($producto2, 4);
$carrito ->agregarProducto($producto3, 6);
$carrito ->agregarProducto($producto4, 3);

# Listamos los productos al carrito
echo "Lista de productos disponibles";
echo "<br>-------------------------------------</br>";
$carrito->listarCarrito();

# Eliminamos un producto 
$carrito->quitarProducto($producto4, 2);

# Agregamos un producto que ya esta en la lista
$carrito->agregarProducto($producto1, 1);

# Listamos nuevamente para verificar la modificacion del carrito
echo "<br></br>";
echo "Resumen de tu compra";
echo "<br>-------------------------------------</br>";
$carrito->listarCarrito();

echo "Total a pagar: $" . $carrito->calcularTotal();
echo "<br></br>";
echo "Gracias por tu compra";

# Modificar la cantidad de producto en el carrito
$carrito->agregarProducto($producto3, 2);

?>