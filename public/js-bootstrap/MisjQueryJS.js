
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
  


/* ------------------------------------------ */
/*       MOSTRAR DIV OCULTO
/*  Script para mostrar u ocultar el div oculto
/*
/* 
/* ------------------------------------------ */
    $(document).ready(function(){
        
        $("#mostrar").on( "click", function(event, article_id) {
            console.log(article_id);
            $('#flotante_'+ article_id).show(); //muestro mediante id
            
         });
        $("#ocultar").on( "click", function(event, article_id) {
            $('#flotante_'+ article_id).hide(); //oculto mediante id
            
        });
    });