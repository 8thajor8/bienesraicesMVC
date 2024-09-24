<main class="contenedor seccion contenido-centrado">
            <h1>Iniciar Sesion</h1>

            <?php
                foreach($errores as $error):
            ?>
                <div class="alerta error">
            
                <?php echo $error; ?>
            </div>
            <?php
                endforeach;
            ?>

            <form  class="formulario"  method="POST" action="/login" novalidate>
            <fieldset>
                    <legend>Email y Password</legend>
                    
                    
                    <label for="email">E-mail</label>
                    <input type="email" placeholder="Tu E-mail" id="email" name="login[email]" >

                    <label for="password">Password</label>
                    <input type="password" placeholder="Tu Password" id="password" name="login[password]">

                </fieldset>

                <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
            </form>
        </main>