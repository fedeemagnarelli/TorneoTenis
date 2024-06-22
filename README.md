# 🎾 TorneoTenis
Modelado de como se comportaría un torneo de tenis con eliminación directa en PHP

## 🚀 Características

- Inscripción de jugadores
- Creación automática de emparejamientos
- Registro de resultados de los partidos
- Visualización del progreso del torneo
- Determinación del ganador

## 📋 Requisitos

- PHP >= 8
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


## Opcion imagenes de Docker 🐋

Las imagenes tanto de apache como de mysql estan en un repositorio de Azure. 
Link del repositorio: "torneotenisphp.azurecr.io"

Una vez realizado el pull a las imagenes podemos seguir los siguientes comandos para crear y levantar las mismas 🎉


Las generamos con: 
    
    docker compose build
    

Levantamos las imagenes/contenedores y empiezan a correr:
    
    docker compose up -d

**Opcional para verificar si estan corriendo y chequear el estado de los contenedores**

    docker ps

Con este comando copiamos el script sql del contenedor de apache hacia el de mysql: 

    docker cp .\src\Base\base-torneo.sql Torneo-Tenis-SQL:/base-torneo.sql (o el nombre que quieran ponerle)


Ingresamos a la terminal de la imagen de mysql:

    docker exec -it Torneo-Tenis-SQL bash


Verificamos que el script sql se encuentre en el contenedor:

    ls la

Ejecutamos el script para la creación de las tablas:

    mysql -uuser -ppassword torneo_tenis < /base-torneo.sql