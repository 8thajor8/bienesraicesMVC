document.addEventListener('DOMContentLoaded', function() {

    eventListeners();

    darkMode();

});

function darkMode(){

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    if(prefiereDarkMode.matches){
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function(){

        if(prefiereDarkMode.matches){
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode');
        }

    })

    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionMobile);

    //Metodo de contacto
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    
    metodoContacto.forEach( input => input.addEventListener('click', mostrarMetodosContacto));

    }

function navegacionMobile(){
    const navegacion = document.querySelector('.navegacion');
    
    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar');

        }else{
                navegacion.classList.add('mostrar');
            }
    
}

function mostrarMetodosContacto(e){
    
    const contactoDiv = document.querySelector('#contacto');
    console.log(e.target.value);
    if(e.target.value === 'telefono'){

        contactoDiv.innerHTML = `
        <br>
        <label for="telefono">Numero</label>
        <input type="tel" placeholder="Tu Telefono" id="telefono" name="contacto[telefono]"></input>

        <p>Eliga la fecha y la hora para ser contactado: </p>

        <label for="fecha">Fecha</label>
        <input type="date" id="fecha" name="contacto[fecha]"></input>

        <label for="hora">Hora</label>
        <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]"></input>
        
        `
    } else{

        contactoDiv.innerHTML = `
        <br>
        <label for="email">E-mail</label>
        <input type="email" placeholder="Tu E-mail" id="email" name="contacto[email]" required></input>

        `
    }
        
    

}