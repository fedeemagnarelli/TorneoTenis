<?php

namespace TorneoTenis\Torneo\Jugadores;

abstract class Jugador {
    
    public function __construct(
        protected $id,
        protected $nombre_apellido,
        protected $habilidad
    ) {	
        $this->id = $id;
        $this->nombre_apellido = $nombre_apellido;
        $this->habilidad = $habilidad;
    }

    public function getId() {
        return $this->id;
    }

    public function getJugador() {
        return $this->nombre_apellido;
    }

    public function getHabilidad() {
        return $this->habilidad;
    }

    abstract public function getDatos();
}