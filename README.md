# docker-class

Demo de uso de Docker para proyectos de desarrollo colaborativo.

## Descripcion

Este repositorio es un ejemplo practico pensado para equipos de desarrollo que quieren estandarizar sus entornos de trabajo usando Docker. El objetivo es eliminar el clasico problema de "en mi maquina funciona" garantizando que todos los integrantes del equipo corran exactamente el mismo entorno, sin importar el sistema operativo o la configuracion local de cada uno.

El proyecto levanta un stack LAMP (Linux, Apache, MySQL, PHP) completo usando Docker Compose, simulando un entorno de desarrollo web real. Incluye una pagina de ejemplo lista para ser modificada por el equipo.

## Stack incluido

| Servicio    | Imagen             | Puerto local |
|-------------|--------------------|--------------|
| PHP + Apache | `php:8.2-apache`  | 8080         |
| MySQL        | `mysql:8`         | 3306         |
| phpMyAdmin   | `phpmyadmin`      | 8081         |

## Como usarlo

### Requisitos

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) instalado y corriendo

### Iniciar el entorno

```bash
docker compose up -d
```

### Acceder a los servicios

- Aplicacion web: http://localhost:8080
- phpMyAdmin: http://localhost:8081

### Detener el entorno

```bash
docker compose down
```

## Estructura del proyecto

```
docker-class/
├── docker-compose.yml   # Definicion de servicios Docker
└── src/
    └── index.html       # Codigo fuente de la aplicacion
```

El directorio `src/` esta montado como volumen en el contenedor Apache, por lo que cualquier cambio en los archivos se refleja de inmediato sin necesidad de reiniciar.
