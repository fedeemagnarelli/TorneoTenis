<?php

namespace TorneoTenis\Torneo\Jugadores;

class Masculino extends Jugador {
    
    public function __construct(
        $id, 
        $nombre_apellido, 
        $habilidad,
        private $fuerza,
        private $velocidad
    ) {
        parent::__construct($id, $nombre_apellido, $habilidad);
        $this->fuerza = $fuerza;
        $this->velocidad = $velocidad;
    }

    public function getDatos() {
        return ["Habilidad" => $this->habilidad, "Fuerza" => $this->fuerza, "Velocidad" => $this->velocidad];
    }
}