<?php
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json; charset=utf-8');
    $_DATA = json_decode(file_get_contents("php://input"),true);

    class promedio{
        public $sumaA;
        public $cantidadA;
        public $sumaB;
        public $cantidadB;
        public $sumaC;
        public $cantidadC;

        public function __construct(int $sumaA,int $cantidadA,int $sumaB,int $cantidadB, int $sumaC,int $cantidadC){
            $this->sumaA = $sumaA;
            $this->cantidadA = $cantidadA;
            $this->sumaB = $sumaB;
            $this->cantidadB = $cantidadB;
            $this->sumaC = $sumaC;
            $this->cantidadC = $cantidadC;
        }

        public function promedioF():string{

            $sumaA = $this->sumaA;
            $cantidadA = $this->cantidadA;
            $sumaB = $this->sumaB;
            $cantidadB = $this->cantidadB;
            $sumaC = $this->sumaC;
            $cantidadC = $this->cantidadC;

            $cantidadA<1?$proA=0:$proA = $sumaA/$cantidadA;
            $cantidadB<1?$proB=0:$proB = $sumaB/$cantidadB;
            $cantidadC<1?$proC=0:$proC = $sumaC/$cantidadC;

            if($proA>$proB && $proA>$proC){
                if($proB>$proC){
                    return "C";
                } else{
                    return "B";
                }
            } else if($proB>$proA && $proB>$proC){
                if($proA>$proC){
                    return "C";
                } else{
                    return "A";
                }
            } else if($proC>$proA && $proC>$proB){
                if($proA>$proB){
                    return "B";
                } else{
                    return "A";
                }
            } else{
                return "A, B, C";
            }
        }
    }
    $lista = new promedio(sumaA:$_DATA[0],cantidadA:$_DATA[1],sumaB:$_DATA[2],cantidadB:$_DATA[3],sumaC:$_DATA[4],cantidadC:$_DATA[5]);
    echo($lista->promedioF());
?>