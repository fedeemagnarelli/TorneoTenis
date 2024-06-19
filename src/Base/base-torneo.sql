CREATE DATABASE torneo_tenis;
USE torneo_tenis;

CREATE TABLE jugadores (
    id_jugador INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_apellido_jugador VARCHAR(100) NOT NULL,
    habilidad INT NOT NULL,
    tipo VARCHAR(10) NOT NULL,
    fuerza INT,
    velocidad INT,
    reaccion INT
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE partidos (
    id_partido INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_jugador1 INT NOT NULL,
    id_jugador2 INT NOT NULL,
    id_ganador INT NOT NULL,
    FOREIGN KEY (id_jugador1) REFERENCES jugadores(id_jugador),
    FOREIGN KEY (id_jugador2) REFERENCES jugadores(id_jugador),
    FOREIGN KEY (id_ganador) REFERENCES jugadores(id_jugador)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;