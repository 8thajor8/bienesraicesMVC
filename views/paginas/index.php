<main class="contenedor seccion">
        <h2>Mas Sobre Nosotros</h2>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="./build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur reprehenderit adipisci recusandae perspiciatis itaque nulla doloribus dolorum et deleniti, quam voluptatum modi obcaecati, reiciendis hic magni suscipit distinctio? Laboriosam, culpa.</p>
            </div>
            <div class="icono">
                <img src="./build/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur reprehenderit adipisci recusandae perspiciatis itaque nulla doloribus dolorum et deleniti, quam voluptatum modi obcaecati, reiciendis hic magni suscipit distinctio? Laboriosam, culpa.</p>
            </div>
            <div class="icono">
                <img src="./build/img/icono3.svg" alt="icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur reprehenderit adipisci recusandae perspiciatis itaque nulla doloribus dolorum et deleniti, quam voluptatum modi obcaecati, reiciendis hic magni suscipit distinctio? Laboriosam, culpa.</p>
            </div>
        </div>
    </main>

    <section class="seccion contenedor">

        <h2>Casas y Depas en Venta</h2>

        <?php
           
            include 'listado.php';
        ?>

        <div class="alinear-derecha">
            <a href="/propiedades" class="boton-verde">Ver Todas</a>
        </div>
    </section>


    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad!</p>
        <a href="/contacto" class="boton-amarillo">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="./build/img/blog1.webp" type="image/webp">
                        <source srcset="./build/img/blog1.jpg" type="image/jpg">
                            <img loading="lazy" src="./build/img/blog1.jpg" alt="texto entrada blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2014</span> por: <span>Admin</span> </p>
                        
                        <p>
                            Consejos para construir la terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.
                        </p>
                    </a>
                </div>

            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="./build/img/blog2.webp" type="image/webp">
                        <source srcset="./build/img/blog2.jpg" type="image/jpg">
                            <img loading="lazy" src="./build/img/blog2.jpg" alt="texto entrada blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2014</span> por: <span>Admin</span> </p>
                        
                        <p>
                            Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio.
                        </p>
                    </a>
                </div>

            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            
            <div class="testimonial">
                <blockquote>El personal se comporto de una excelente forma, una muy buena atencion y la casa que me ofrecieron cumple con todas mis expectativas.</blockquote>
                <p>Juan De La Torre</p>
            </div>

        </section>

    </div>