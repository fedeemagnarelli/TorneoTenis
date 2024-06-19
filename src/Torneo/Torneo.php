<?php

namespace TorneoTenis\Torneo;

class Torneo {

    public function __construct(
        private $jugadores,
        private $repositorioPartidos
    ) {
        $this->jugadores = $jugadores;
        $this->repositorioPartidos = $repositorioPartidos;
    }

    public function iniciarTorneo() {
        $ronda = 1;
        $jugadores = $this->jugadores;

        while (count($jugadores) > 1) {
            echo "Iniciando ronda $ronda...\n";
            $jugadores = $this->jugarRonda($jugadores);
            $ronda++;
        }

        $ganador = $jugadores[0];
        echo "El ganador del torneo es: " . $ganador->getNombre() . "\n";

        return $ganador;
    }

    private function jugarRonda($jugadores) {
        $ganadores = [];

        for ($i = 0; $i < count($jugadores); $i += 2) {
            $jugador1 = $jugadores[$i];
            $jugador2 = $jugadores[$i + 1];
            $partido = new Partido($jugador1, $jugador2);
            $partido->jugarPartido();
            $this->repositorioPartidos->guardarPartido($partido);
            $ganadores[] = $partido->getGanador();
        }

        return $ganadores;
    }
}