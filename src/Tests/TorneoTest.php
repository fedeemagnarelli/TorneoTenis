<?php

use PHPUnit\Framework\TestCase;
use TorneoTenis\Torneo\ControladorTorneo;
use TorneoTenis\Torneo\Jugadores\Masculino;

class TorneoTest extends TestCase {

    private $pdo;
    private $repoJugadores;
    private $repoPartidos;

    protected function up() : void {
        //Aca voy a levantar una bdd en memoria para el test
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->exec("
            CREATE TABLE jugadores (
            id_jugador INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            nombre_apellido_jugador VARCHAR(100) NOT NULL,
            habilidad INT NOT NULL,
            tipo VARCHAR(10) NOT NULL,
            fuerza INT,
            velocidad INT,
            reaccion INT
            );
        ");

        $this->pdo->exec("
            CREATE TABLE partidos (
            id_partido INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            id_jugador1 INT NOT NULL,
            id_jugador2 INT NOT NULL,
            id_ganador INT NOT NULL,
            FOREIGN KEY (id_jugador1) REFERENCES jugadores(id_jugador),
            FOREIGN KEY (id_jugador2) REFERENCES jugadores(id_jugador),
            FOREIGN KEY (id_ganador) REFERENCES jugadores(id_jugador)
            )
        ");
    }

    public function testFuncTorneo() : void {
        //Creacion de Jugadores
        $jugadores = [
            new Masculino(null, "Jugador 1", 85, 80, 90),
            new Masculino(null, "Jugador 2", 80, 70, 60),
            new Masculino(null, "Jugador 3", 75, 65, 70),
            new Masculino(null, "Jugador 4", 90, 85, 80),
            new Masculino(null, "Jugador 6", 60, 55, 50),
        ];

        //Instancia del controlador y Torneo
        $controlador = new ControladorTorneo($this->repoJugadores, $this->repoPartidos);
        $ganador = $controlador->iniciarTorneo($jugadores);
        
        $this->assertInstanceOf(Masculino::class, $ganador);
        $this->assertNotEmpty($ganador->getJugador());
        $this->assertContainsEquals($ganador->getJugador(), $jugadores);
    }
    
}