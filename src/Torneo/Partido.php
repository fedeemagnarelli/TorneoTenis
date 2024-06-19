<?php

namespace TorneoTenis\Torneo;

use TorneoTenis\Torneo\Simulador\Simulador;

class Partido {
    

    public function __construct(
        private $jugador1,
        private $jugador2,
        private $ganador = null
    ) {
        $this->jugador1 = $jugador1;
        $this->jugador2 = $jugador2;
        $this->ganador = $ganador;
    }

    public function getGanador() { 
        return $this->ganador;
    }

    public function getJugador1() {
        return $this->jugador1;
    }

    public function getJugador2() {
        return $this->jugador2;
    }

    public function jugarPartido() {
        $this->ganador = Simulador::elegirGanador($this->jugador1, $this->jugador2);
    }
}