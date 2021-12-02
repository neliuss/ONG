//$(document).ready(selectorTema) 
window.addEventListener('load', selectorTema, false);


function selectorTema() {
 //   $('#fondo1').on('click', fondo1)
    document.getElementById('fondo1').addEventListener('click', fondo1)
 //   $('#fondo2').on('click', fondo2)
    document.getElementById('fondo2').addEventListener('click', fondo2)
}
function fondo1() {
//    $('#tema').attr('href', 'fondo1.css')
    document.getElementById('tema').setAttribute('href', './css/fondo1.css')
}
function fondo2() {
 //   $('#tema').attr('href', 'fondo2.css')
    document.getElementById('tema').setAttribute('href', './css/fondo2.css')
}

