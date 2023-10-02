<?php
/* Trabajo Práctico Final. Alumno: Nicolás A. Pannunzio
Ejercicio I : "Sistema de gestión de una biblioteca" */

class Libro {
    # Propiedades del libro
        public $titulo;
        public $autor;
        public $numeroPaginas;
        public $ejemplaresDisponibles;

    # Constructor de la clase Libro
        public function __construct($titulo, $autor, $numeroPaginas, $ejemplaresDisponibles){
            $this->titulo = $titulo;
            $this->autor = $autor;
            $this->numeroPaginas = $numeroPaginas;
            $this->ejemplaresDisponibles = $ejemplaresDisponibles;
        }
}
    
class Biblioteca {
    # Arreglo privado para almacenar objetos de la clase Libro
        private $libros = [];

    # Constructor de la clase Biblioteca
        public function __construct() {
            $this->libros = array();
        }

    # Método para agregar un libro a la biblioteca
        public function agregarLibro($libro) {
            $this->libros[] = $libro;
        }

    # Método para prestar un libro
        public function prestarLibro($titulo) {
            foreach ($this->libros as $libro) {
                if ($libro->titulo == $titulo) {
                    if ($libro->ejemplaresDisponibles > 0) {
                        $libro->ejemplaresDisponibles--;
                        echo "El libro $titulo ha sido prestado.\n";
                    } else {
                        echo "No hay ejemplares disponibles del libro $titulo.\n";
                    }
                    return;
                }
            }
            echo "El libro $titulo no se encuentra en la biblioteca.\n";
        }

    # Método para devolver un libro
        public function devolverLibro($titulo) {
            foreach ($this->libros as $libro) {
                if ($libro->titulo == $titulo) {
                    $libro->ejemplaresDisponibles++;
                    echo "El libro $titulo ha sido devuelto.\n";
                    return;
                }
            }
            echo "El libro $titulo no se encuentra en la biblioteca.\n";
        }

    # Método para listar todos los libros en la biblioteca
        public function listarLibros() {
            echo "Lista de libros en la biblioteca:\n";
            foreach ($this->libros as $libro) {
                echo "<br></br>";
                echo "Título: $libro->titulo\n";
                echo "<br></br>";
                echo "Autor: $libro->autor\n";
                echo "<br></br>";
                echo "Número de páginas: $libro->numeroPaginas\n";
                echo "<br></br>";
                echo "Ejemplares disponibles: $libro->ejemplaresDisponibles\n";
                echo "<br></br>";
                echo "-------------------------\n";
            }
        }
    }

# Crear instancias de la clase Libro
    $libro1 = new Libro ("El principito", "Antoine de Saint-Exupéry", 120, 6);
    $libro2 = new Libro ("El túnel", "Ernesto Sabato", 158, 2);
    $libro3 = new Libro ("The Pragmatic Programmer", "Andy Hunt", 352, 3);
    $libro4 = new Libro ("Don Quijote de la Mancha", "Miguel Cervantes", 462, 1);

# Crear instancia de la clase Biblioteca
    $biblioteca = new Biblioteca();

# Agregar los libros a la biblioteca
    $biblioteca->agregarLibro($libro1);
    $biblioteca->agregarLibro($libro2);
    $biblioteca->agregarLibro($libro3);
    $biblioteca->agregarLibro($libro4);

# Mostrar la lista de libros en la biblioteca
    $biblioteca->listarLibros();

# Realizar préstamos y devoluciones de libros
    echo "<br></br>";
    $biblioteca->prestarLibro("El principito");
    echo "<br></br>";
    $biblioteca->prestarLibro("El túnel");
    echo "<br></br>";
    $biblioteca->prestarLibro("The Pragmatic Programmer");
    echo "<br></br>";
    $biblioteca->devolverLibro("The Pragmatic Programmer");
    echo "<br></br>";
    $biblioteca->devolverLibro("El principito");
    echo "<br></br>";
    
?>