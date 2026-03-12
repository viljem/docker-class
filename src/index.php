<?php
// ── Conexión a la base de datos ──────────────────────────────────────────────
$host   = 'mysql';      // nombre del servicio en docker-compose
$db     = 'mi_app';
$user   = 'dev';
$pass   = 'devpass';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('<p style="color:red;padding:2rem;">Error de conexión: ' . $conn->connect_error . '</p>');
}

$conn->set_charset('utf8mb4');

// ── Consultas ────────────────────────────────────────────────────────────────
$servicios = $conn->query("SELECT * FROM servicios WHERE activo = 1 ORDER BY id");
$juegos    = $conn->query("SELECT * FROM juegos WHERE destacado = 1 ORDER BY anio DESC");

$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameDev Studios - Desarrollo de Videojuegos</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        header {
            background: linear-gradient(135deg, #0a1e3e 0%, #1a3a6f 100%);
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 { font-size: 1.8rem; }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 2rem;
            transition: color 0.3s;
        }
        nav a:hover { color: #64b5f6; }

        .hero {
            background: linear-gradient(135deg, #1a3a6f 0%, #2e5da6 100%);
            color: white;
            padding: 6rem 2rem;
            text-align: center;
        }
        .hero h2 { font-size: 3rem; margin-bottom: 1rem; }
        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn {
            background-color: #64b5f6;
            color: white;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover { background-color: #42a5f5; }

        /* ── Servicios ── */
        .services {
            padding: 4rem 2rem;
            background-color: #f5f9ff;
        }
        .services h3 {
            text-align: center;
            font-size: 2.5rem;
            color: #0a1e3e;
            margin-bottom: 3rem;
        }

        .service-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .service-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(10, 30, 62, 0.1);
            border-top: 4px solid #2e5da6;
            transition: transform 0.3s;
        }
        .service-card:hover { transform: translateY(-5px); }

        .service-card .icono { font-size: 2rem; margin-bottom: 0.8rem; }
        .service-card h4 { color: #1a3a6f; margin-bottom: 0.6rem; }

        /* ── Juegos destacados ── */
        .games {
            padding: 4rem 2rem;
            background-color: #0d1f40;
            color: white;
        }
        .games h3 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
        }

        .games-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .game-card {
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(100, 181, 246, 0.3);
            border-radius: 10px;
            padding: 2rem;
            transition: background 0.3s;
        }
        .game-card:hover { background: rgba(255,255,255,0.14); }
        .game-card h4 { color: #64b5f6; margin-bottom: 0.5rem; font-size: 1.3rem; }
        .game-card .meta { font-size: 0.85rem; color: #90caf9; margin-bottom: 0.8rem; }

        footer {
            background: #0a1e3e;
            color: white;
            text-align: center;
            padding: 2rem;
        }
    </style>
</head>
<body>

<header>
    <h1>🎮 GameDev Studios de la UTBB</h1>
    <nav>
        <a href="#inicio">Inicio</a>
        <a href="#servicios">Servicios</a>
        <a href="#juegos">Juegos</a>
        <a href="#contacto">Contacto</a>
    </nav>
</header>

<!-- Hero -->
<section class="hero" id="inicio">
    <h2>Creamos Mundos Increíbles</h2>
    <p>Desarrollo de videojuegos de última generación con tecnología punta y creatividad sin límites.</p>
    <button class="btn">Comienza tu Proyecto</button>
</section>

<!-- Servicios (datos desde MySQL) -->
<section class="services" id="servicios">
    <h3>Nuestros Servicios</h3>
    <div class="service-grid">
        <?php while ($s = $servicios->fetch_assoc()): ?>
        <div class="service-card">
            <div class="icono"><?= htmlspecialchars($s['icono']) ?></div>
            <h4><?= htmlspecialchars($s['nombre']) ?></h4>
            <p><?= htmlspecialchars($s['descripcion']) ?></p>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<!-- Juegos destacados (datos desde MySQL) -->
<section class="games" id="juegos">
    <h3>🕹️ Juegos Destacados</h3>
    <div class="games-grid">
        <?php while ($j = $juegos->fetch_assoc()): ?>
        <div class="game-card">
            <h4><?= htmlspecialchars($j['titulo']) ?></h4>
            <div class="meta"><?= htmlspecialchars($j['genero']) ?> · <?= $j['anio'] ?></div>
            <p><?= htmlspecialchars($j['descripcion']) ?></p>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<footer id="contacto">
    <p>&copy; <?= date('Y') ?> GameDev Studios UTBB. Todos los derechos reservados.</p>
</footer>

</body>
</html>
