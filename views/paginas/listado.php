<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad): ?>
    <div class="anuncio">
        <picture>
            
            <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio">
        </picture>
        
        <div class="contenido-anuncio">
            <h3><?php echo $propiedad->titulo; ?></h3>
            <p>C<?php echo $propiedad->descripcion; ?></p>
            <p class="precio">$<?php echo $propiedad->precio; ?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="./build/img/icono_wc.svg" alt="icono wc"> 
                    <p><?php echo $propiedad->wc; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="./build/img/icono_estacionamiento.svg" alt="icono estacionamiento"> 
                    <p><?php echo $propiedad->estacionamiento; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="./build/img/icono_dormitorio.svg" alt="icono habitaciones"> 
                    <p><?php echo $propiedad->habitaciones; ?></p>
                </li>

            </ul>
            <a href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Ver Propiedad</a>
        </div>
    </div>
    <?php endforeach; ?>
s</div>