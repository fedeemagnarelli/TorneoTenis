<?php

namespace TorneoTenis\Torneo\Jugadores;

class Femenino extends Jugador {
    
    public function __construct(
        $id, 
        $nombre_apellido, 
        $habilidad,
        private $reaccion
    ) {
        parent::__construct($id, $nombre_apellido, $habilidad);
        $this->reaccion = $reaccion;
    }
    
    public function getDatos() {
        return ["Habilidad" => $this->habilidad, "Reacción" => $this->reaccion];
    }

}