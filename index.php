<?php
include_once "arrays_a_usar.php";
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <title>Primer Ejercicio PHP Web</title>
</head>
<body>
<h1 class="titulo">CINEPSUM</h1>
<main>
    <section class="peliculas">
        <?php if (count($peliculas) > 0): ?>
            <?php foreach ($peliculas as $peli): ?>
                <section class="card">
                    <div class="card-img-container">
                        <img src="<?= $peli["imagen"]; ?>" alt="<?= $peli["titulo"]; ?>">
                    </div>

                    <div class="card-content">
                        <span class="universo">Universo: <?= $peli["universo"]; ?></span>

                        <p class="director">
                            <strong>Director:</strong> <?= $peli["director"]; ?>
                        </p>

                        <p class="info">
                            <strong>Año:</strong> <?= $peli["anyo"]; ?> •
                            <strong>Duración:</strong> <?= $peli["duracion"]; ?> min
                        </p>

                        <p class="puntuacion">
                            <strong>Puntuación:</strong> ⭐<?= $peli["puntuacion"]; ?> / 10
                        </p>

                        <p class="estado">
                            <strong>Estado:</strong>
                            <span class="<?= $peli["disponible"] ? "texto-verde" : "texto-rojo"; ?>">
                                <?= $peli["disponible"] ? "Disponible" : "No disponible"; ?>
                             </span>
                        </p>
                    </div>
                </section>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no_movies">
                <p>No hay películas disponibles para mostrar.</p>
            </div>
        <?php endif; ?>
    </section>


    <section class="seccion-universo">
        <?php $filtroUniverso = "DC"; ?>
        <h2>UNIVERSO <?= $filtroUniverso; ?></h2>

        <div class="peliculas">
            <?php foreach ($peliculas as $peli): ?>
                <?php if ($peli["universo"] === $filtroUniverso): ?>
                    <section class="card">
                        <div class="card-img-container">
                            <img src="<?= $peli["imagen"]; ?>" alt="<?= $peli["titulo"]; ?>">
                        </div>

                        <div class="card-content">
                            <span class="universo">Universo: <?= $peli["universo"]; ?></span>

                            <p class="director">
                                <strong>Director:</strong> <?= $peli["director"]; ?>
                            </p>

                            <p class="info">
                                <strong>Año:</strong> <?= $peli["anyo"]; ?> •
                                <strong>Duración:</strong> <?= $peli["duracion"]; ?> min
                            </p>

                            <p class="puntuacion">
                                <strong>Puntuación:</strong> ⭐<?= $peli["puntuacion"]; ?> / 10
                            </p>

                            <p class="estado">
                                <strong>Estado:</strong>
                                <span class="<?= $peli["disponible"] ? "texto-verde" : "texto-rojo"; ?>">
                                <?= $peli["disponible"] ? "Disponible" : "No disponible"; ?>
                             </span>
                            </p>
                        </div>
                    </section>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>


    <section class="seccion-bestresult">
        <h2 class="titulo-puntuacion">MEJORES PELICULAS </h2>

        <div class="peliculas">
            <?php foreach ($peliculas as $peli): ?>
                <?php if ($peli["puntuacion"] > 8): ?>
                    <section class="card">
                        <div class="card-img-container">
                            <img src="<?= $peli["imagen"]; ?>" alt="<?= $peli["titulo"]; ?>">
                        </div>

                        <div class="card-content">
                            <span class="universo">Universo: <?= $peli["universo"]; ?></span>

                            <p class="director">
                                <strong>Director:</strong> <?= $peli["director"]; ?>
                            </p>

                            <p class="info">
                                <strong>Año:</strong> <?= $peli["anyo"]; ?> •
                                <strong>Duración:</strong> <?= $peli["duracion"]; ?> min
                            </p>

                            <p class="puntuacion">
                                <strong>Puntuación:</strong> ⭐<?= $peli["puntuacion"]; ?> / 10
                            </p>

                            <p class="estado">
                                <strong>Estado:</strong>
                                <span class="<?= $peli["disponible"] ? "texto-verde" : "texto-rojo"; ?>">
                                    <?= $peli["disponible"] ? "Disponible" : "No disponible"; ?>
                                 </span>
                            </p>
                        </div>
                    </section>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="seccion-lista">
        <h2 class="titulo-lista">LISTA DE DESEOS </h2>

        <div class="peliculas">
            <?php foreach ($watchlist as $item): ?>
                <?php
                $peliEncontrada = null;
                foreach ($peliculas as $peli) {
                    if ($peli["id"] === $item["pelicula_id"]) {
                        $peliEncontrada = $peli;
                    }
                }

                if ($peliEncontrada !== null):
                    ?>
                    <section class="card">
                        <div class="card-img-container">
                            <img src="<?= $peliEncontrada["imagen"]; ?>" alt="<?= $peliEncontrada["titulo"]; ?>">
                        </div>

                        <div class="card-content">
                            <h3><?= $peliEncontrada["titulo"]; ?></h3>

                            <p class="info">
                                <strong>Año:</strong> <?= $peliEncontrada["anyo"]; ?>
                            </p>

                            <p class="estado">
                                <strong>Vista:</strong>
                                <span class="<?= $item["vista"] ? "texto-verde" : "texto-rojo"; ?>">
                                <?= $item["vista"] ? "Sí" : "No"; ?>
                            </span>
                            </p>
                        </div>
                    </section>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>


    <section class="form-container">
        <h2>Añadir Nueva Película</h2>

        <form class="film-form">

            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Ej: Iron Man">
            </div>

            <div class="form-group">
                <label for="universo">Universo:</label>
                <select id="universo" name="universo">
                    <option value="" disabled selected>Selecciona un universo</option>
                    <option value="Marvel">Marvel</option>
                    <option value="DC">DC</option>
                </select>
            </div>

            <div class="form-group">
                <label for="director">Director:</label>
                <input type="text" id="director" name="director" placeholder="Ej: Jon Favreau">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="anyo">Año:</label>
                    <input type="number" id="anyo" name="anyo" placeholder="2008">
                </div>

                <div class="form-group">
                    <label for="duracion">Duración (minutos):</label>
                    <input type="number" id="duracion" name="duracion" placeholder="126">
                </div>

                <div class="form-group">
                    <label for="puntuacion">Puntuación (0-10):</label>
                    <input type="number" id="puntuacion" name="puntuacion" placeholder="7.9">
                </div>
            </div>

            <div class="form-group">
                <label for="imagen">Imagen del póster:</label>
                <input type="file" id="imagen" name="imagen">
            </div>

            <div class="form-group checkbox-group">
                <input type="checkbox" id="disponible" name="disponible" checked>
                <label for="disponible">Disponible en catálogo</label>
            </div>

            <div class="form-button">
            <button class="btn-submit">Añadir Película</button>
            </div>

        </form>
    </section>
</main>

</body>
</html>
