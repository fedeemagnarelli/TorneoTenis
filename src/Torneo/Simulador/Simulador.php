<?php

namespace TorneoTenis\Torneo\Simulador;

use TorneoTenis\Torneo\Jugadores\Femenino;
use TorneoTenis\Torneo\Jugadores\Jugador;
use TorneoTenis\Torneo\Jugadores\Masculino;

class Simulador {
    public static function elegirGanador(Jugador $jugador1, Jugador $jugador2) {
        //Como inicio se va a determinar las probabilidades
        $probabilidad_jugador_1 = $jugador1->getHabilidad();
        $probabilidad_jugador_2 = $jugador2->getHabilidad();

        //Considero los factores en base al genero
        switch ($jugador1 && $jugador2) {
            case $jugador1 instanceof Masculino && $jugador2 instanceof Masculino:
                $datos_jugador_1 = $jugador1->getDatos();
                $probabilidad_jugador_1 += ($datos_jugador_1["Fuerza"] + $datos_jugador_1["Velocidad"]) / 2;

                $datos_jugador_2 = $jugador2->getDatos();
                $probabilidad_jugador_2 += ($datos_jugador_2["Fuerza"] + $datos_jugador_2["Velocidad"]) / 2;
            break;

            case $jugador1 instanceof Femenino && $jugador2 instanceof Femenino:
                $datos_jugador_1 = $jugador1->getDatos();
                $probabilidad_jugador_1 += $datos_jugador_1["Resistencia"];

                $datos_jugador_2 = $jugador2->getDatos();
                $probabilidad_jugador_2 += $datos_jugador_2["Resistencia"];
            break;

            case $jugador1 instanceof Masculino && $jugador2 instanceof Femenino:
                $datos_jugador_1 = $jugador1->getDatos();
                $probabilidad_jugador_1 += ($datos_jugador_1["Fuerza"] + $datos_jugador_1["Velocidad"]) / 2;

                $datos_jugador_2 = $jugador2->getDatos();
                $probabilidad_jugador_2 += $datos_jugador_2["Resistencia"];
            break;

            case $jugador1 instanceof Femenino && $jugador2 instanceof Masculino:
                $datos_jugador_1 = $jugador1->getDatos();
                $probabilidad_jugador_1 += $datos_jugador_1["Resistencia"];

                $datos_jugador_2 = $jugador2->getDatos();
                $probabilidad_jugador_2 += ($datos_jugador_2["Fuerza"] + $datos_jugador_2["Velocidad"]) / 2;
            break;
        }

        //Simulacion de la suerte
        $suerte_jugador_1 = rand(0, 29);
        $suerte_jugador_2 = rand(0, 29);


        $probabilidad_jugador_1 += $suerte_jugador_1;
        $probabilidad_jugador_2 += $suerte_jugador_2;

        //Devolvemos el ganador
        return ($probabilidad_jugador_1 >= $probabilidad_jugador_2) ? $jugador1 : $jugador2;
    }
}