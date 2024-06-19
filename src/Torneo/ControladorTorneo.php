<?php

namespace TorneoTenis\Torneo;

class ControladorTorneo { 

    public function __construct(
        private $repositorioJugadores,
        private $repositorioPartidos
    ) {
        $this->repositorioJugadores = $repositorioJugadores;
        $this->repositorioPartidos = $repositorioPartidos;
    }

    public function iniciarTorneo($jugadores) {
        foreach ($jugadores as $jugador) {
            $this->repositorioJugadores->guardarJugador($jugador);
        }

        $torneo = new Torneo($jugadores, $this->repositorioPartidos);
        return $torneo->iniciarTorneo();
    }
}