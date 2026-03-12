-- =============================================
-- Modelo de Base de Datos: GameDev Studios UTBB
-- Base de datos: mi_app
-- =============================================

SET NAMES utf8mb4;
SET CHARACTER SET utf8mb4;

USE mi_app;

-- ----------------------------
-- Tabla: servicios
-- Almacena los servicios que ofrece el estudio
-- ----------------------------
CREATE TABLE IF NOT EXISTS servicios (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    nombre      VARCHAR(100)  NOT NULL,
    descripcion TEXT          NOT NULL,
    icono       VARCHAR(10)   NOT NULL DEFAULT '🎮',
    activo      TINYINT(1)    NOT NULL DEFAULT 1,
    creado_en   TIMESTAMP     DEFAULT CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- ----------------------------
-- Tabla: juegos
-- Catálogo de videojuegos desarrollados por el estudio
-- ----------------------------
CREATE TABLE IF NOT EXISTS juegos (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    titulo      VARCHAR(150)  NOT NULL,
    descripcion TEXT          NOT NULL,
    genero      VARCHAR(60)   NOT NULL,
    anio        YEAR          NOT NULL,
    destacado   TINYINT(1)    NOT NULL DEFAULT 0,
    creado_en   TIMESTAMP     DEFAULT CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- ----------------------------
-- Datos de ejemplo: servicios
-- ----------------------------
INSERT INTO servicios (nombre, descripcion, icono) VALUES
('Desarrollo 3D',    'Creamos experiencias visuales inmersivas con gráficos de última generación usando motores como Unreal y Unity.', '🌐'),
('Game Design',      'Diseño creativo y narrativa cautivadora que engancha a los jugadores desde el primer nivel.', '🎨'),
('Programación',     'Código optimizado y robusto en C++, C# y Python para un rendimiento excepcional en cualquier plataforma.', '💻'),
('Arte & Animación', 'Personajes y escenarios únicos con animaciones fluidas que dan vida a cada universo virtual.', '✏️'),
('Audio & Música',   'Bandas sonoras originales y efectos de sonido inmersivos que complementan cada experiencia.', '🎵'),
('QA & Testing',     'Pruebas exhaustivas para garantizar una experiencia de juego libre de errores y altamente disfrutable.', '🔍');

-- ----------------------------
-- Datos de ejemplo: juegos
-- ----------------------------
INSERT INTO juegos (titulo, descripcion, genero, anio, destacado) VALUES
('Nebula Breach',   'Shooter espacial cooperativo con mecánicas de roguelite y narrativa ramificada.', 'Shooter / Roguelite', 2024, 1),
('Shadow Realm',    'RPG de acción ambientado en un mundo oscuro con sistema de combate basado en sombras.', 'RPG de Acción',       2023, 1),
('Pixel Legends',   'Plataformero retro con pixel art moderno y más de 50 niveles generados proceduralmente.', 'Plataformero',       2023, 0),
('Racing Storm',    'Juego de carreras arcade con física realista y modo multijugador en línea.', 'Carreras',             2022, 0);
