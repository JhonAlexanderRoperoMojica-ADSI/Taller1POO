<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=utf-8');
    $_DATA = json_decode(file_get_contents("php://input"),true);

    class galeria{
        public $codigo;
        public $cantidad;

        public function __construct(int $codigo, int $cantidad){
            $this->codigo = $codigo;
            $this->cantidad = $cantidad;
        }

        public function codigos(){
            $codigo = match($this->codigo){
                1 => $codigo = 200,
                2 => $codigo = 100,
                3 => $codigo = 80,
                
            };
            return $codigo;
        }

        public function pagar():string{
            $codigo = $this->codigos();
            $pagar = $codigo*$this->cantidad;
            return $pagar;
        }
    }

    $lista = new galeria(codigo:$_DATA['codigo'],cantidad:$_DATA['cantidad']);
    echo($lista->pagar());

?>