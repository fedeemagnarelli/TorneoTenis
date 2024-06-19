# 🎾 TorneoTenis
Modelado de como se comportaría un torneo de tenis con eliminación directa en PHP

## 🚀 Características

- Inscripción de jugadores
- Creación automática de emparejamientos
- Registro de resultados de los partidos
- Visualización del progreso del torneo
- Determinación del ganador

## 📋 Requisitos

- PHP >= 7.4
- Servidor web (Apache, Nginx, etc.)
- Base de datos MySQL
- Docker
- Composer

## ⚙️ Instalación

1. Clona este repositorio:
    ```bash
    git clone https://github.com/fedeemagnarelli/TorneoTenis.git
    ```

2. Navega al directorio del proyecto:
    ```bash
    cd TorneoTenis
    ```

3. Configura la base de datos:
    - Crea una base de datos en MySQL.
    - Importa el archivo `base-torneo.sql` en tu base de datos.
    - Configura los datos de conexión en `Conexion.php`.