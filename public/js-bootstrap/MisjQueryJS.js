
/* ------------------------------------------ */
/*       CLASE ACTIVA MENU NAVEGACIÓN
/* Basicamente selecciona la clase activa según 
/*el href donde estemos. Por defecto pone el primer 
/* <a> como clase activa.
/* ------------------------------------------ */
$(document).ready(function(){
        var cambio = false;
        $('.nav li a').each(function(index) {
            if(this.href.trim() == window.location){
                $(this).addClass("active");
                cambio = true;
            }
        });
        if(!cambio){
            $('.nav a:first').addClass("active");
        }
    });
  


