<?php
    /**
    *
    */
    class Administracion
    {

        private $conn;

        function __construct()
        {
            require "../core/Conection.php";
            $conection = new Conection();
            $this->conn = $conection->Conectarse();
            return $this->conn;
        }

        public function AddRegistro($datos, $imagen)
        {
            extract($datos);
            $data  = file_get_contents('imagenes/'.$imagen);
            $image = pg_escape_bytea($data);

            $sql = "INSERT INTO imagen(nombre, rutaim, imagen, tipoim, tamima, idimag) VALUES ('$nombre', '$ruta', '{$image}', '$tipo', '$taman',$idimagen)";

            pg_query($this->conn, $sql);
            pg_close($this->conn);

            return true;
        }
    }
 ?>