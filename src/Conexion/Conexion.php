<?php

namespace TorneoTenis\Conexion;

use PDO;

class Conexion {
    private $pdo;

    public function __construct(
        private $host = 'localhost',
        private $db = 'torneo_tenis',
        private $user = 'user',
        private $pass = 'password',
        private $charset = 'utf8',
    ) {
        $con = 'mysql:host=' . $this->host . ';dbname=' . $this->db . ';charset=' . $this->charset;
        $op = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($con, $this->user, $this->pass, $op);
        } catch (\PDOException $e) {
            throw new \PDOException('Error en la conexion '.$e->getMessage(), (int) $e->getCode());
        }
    }

    public function getCon() {
        return $this->pdo;
    }
    
}