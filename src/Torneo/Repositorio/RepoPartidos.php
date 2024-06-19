<?php 

namespace TorneoTenis\Torneo\Repositorio;

use TorneoTenis\Torneo\Partido;

class RepoPartidos {

    public function __construct(
        private $pdo
    ) {
        $this->pdo = $pdo;
    }

    public function guardarPartido(Partido $partido) {
        $consulta = "INSERT INTO partidos (id_jugador1, id_jugador2, id_ganador) VALUES (:jugador1_id, :jugador2_id, :ganador_id)";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([
            'jugador1_id' => $partido->getJugador1()->getId(),
            'jugador2_id' => $partido->getJugador2()->getId(),
            'ganador_id' => $partido->getGanador()->getId()
        ]);

        return $this->pdo->lastInsertId();
    }

    public function getPartidos() {
        $stmt = $this->pdo->query("SELECT * FROM partidos");

        while($row = $stmt->fetch()) {
            $id_partido = $row["id_partido"];
            $jugador1 = RepoJugadores::getJugadoresPorId($row["id_jugador"]);
            $jugador2 = RepoJugadores::getJugadoresPorId($row["id_jugador2"]);
            $ganador = $row["id_ganador"];

            $partidos[] = [$id_partido, $jugador1, $jugador2, $ganador];
        }

        return $partidos;
    }
}