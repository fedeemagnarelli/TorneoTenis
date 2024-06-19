<?php

//instanciamos el autoload generado por composer
require 'vendor/autoload.php';


use TorneoTenis\Conexion\Conexion;
use TorneoTenis\Torneo\ControladorTorneo;
use TorneoTenis\Torneo\Jugadores\Femenino;
use TorneoTenis\Torneo\Jugadores\Masculino;
use TorneoTenis\Torneo\Repositorio\RepoJugadores;
use TorneoTenis\Torneo\Repositorio\RepoPartidos;

//Cfg de la BDD
$db = new Conexion();
$pdo = $db->getCon();

$repoJugadores = new RepoJugadores($pdo);
$repoPartidos = new RepoPartidos($pdo);

//Creacion de Jugadores
$jugadoresMasculinos = [
    new Masculino(null, "Pepito Perez", 85, 80, 90),
    new Masculino(null, "Mario Lopez", 80, 70, 60),
    new Masculino(null, "Leonardo Gimenez", 75, 65, 70),
    new Masculino(null, "Fernando Martinez", 90, 85, 80),
    new Masculino(null, "Juan Perez", 60, 55, 50),
];

$jugadorasFemeninas = [
    new Femenino(null, "Laurita Perez", 85, 99),
    new Femenino(null, "Marta Lopez", 80, 70),
    new Femenino(null, "Natalia Gimenez", 75, 65),
    new Femenino(null, "Soledad Martinez", 90, 85),
    new Femenino(null, "Juana Perez", 60, 55),
];

//Instanciamos el controlador y jugamos el torneo
//Torneo Masculino
$controlador = new ControladorTorneo($repoJugadores, $repoPartidos);
$ganadorMasculino = $controlador->iniciarTorneo($jugadoresMasculinos);

//Torneo Femenino
$controlador = new ControladorTorneo($repoJugadores, $repoPartidos);
$ganadoraFemenina = $controlador->iniciarTorneo($jugadorasFemeninas);

print_r('
    Ganador del torneo masculino: '.$ganadorMasculino.'
    Ganadora del torneo femenino: '.$ganadoraFemenina.'
');