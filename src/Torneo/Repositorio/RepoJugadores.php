<?php

namespace TorneoTenis\Torneo\Repositorio;

use TorneoTenis\Torneo\Jugadores\Femenino;
use TorneoTenis\Torneo\Jugadores\Jugador;
use TorneoTenis\Torneo\Jugadores\Masculino;

class RepoJugadores {
    
    public function __construct(
        private $pdo
    ) {
        $this->pdo = $pdo;
    }

    public function guardarJugador(Jugador $jugador) {
        $tipo = $jugador instanceof Masculino ? "masculino" : "femenino";
        $parametros = $jugador->getDatos();
        $consulta = "INSERT INTO jugadores (nombre_apellido_jugador, habilidad, tipo, fuerza, velocidad, reaccion) VALUES (:nombre, :habilidad, :tipo, :fuerza, :velocidad, :reaccion)";

        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([
            'nombre' => $jugador->getJugador(),
            'habilidad' => $jugador->getHabilidad(),
            'tipo' => $tipo,
            'fuerza' => $parametros['fuerza'] ?? null,
            'velocidad' => $parametros['velocidad'] ?? null,
            'reaccion' => $parametros['reaccion'] ?? null
        ]);

        return $this->pdo->lastInsertId();
    }

    public function getAllJugadores() {
        $stmt = $this->pdo->query("SELECT * FROM jugadores");
        
        while($row = $stmt->fetch()) {
            if($row['tipo'] == 'masculino') {
                $jugadores[] = new Masculino($row['id_jugador'], $row['nombre_apellido_jugador'], $row['habilidad'], $row['fuerza'], $row['velocidad'], $row['reaccion']);
            } else {
                $jugadores[] = new Femenino($row['id_jugador'], $row['nombre_apellido_jugador'], $row['habilidad'], $row['reaccion']);
            }
        }

        return $jugadores;
    }

    public function getJugadoresPorId($id_jugador) {
        $stmt = $this->pdo->prepare("SELECT * FROM jugadores WHERE id_jugador = :id_jugador");
        $stmt->execute([
            'id_jugador' => $id_jugador
        ]);
        $row = $stmt->fetch();

        if($row['tipo'] == 'masculino') {
            return new Masculino($row['id_jugador'], $row['nombre_apellido_jugador'], $row['habilidad'], $row['fuerza'], $row['velocidad'], $row['reaccion']);
        } else {
            return new Femenino($row['id_jugador'], $row['nombre_apellido_jugador'], $row['habilidad'], $row['reaccion']);
        }
    }
}