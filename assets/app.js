/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';
import $ from 'jquery'

var $formContenedor

var $agregarForm = $('<a href="#" class="btn btn-info" > agregar oferta</a>')

$(function(){
  //obtener contenedor del form
  $formContenedor = $('#ofertasLaborales_list');


  //se agrega boton de agregar forn
  $formContenedor.append($agregarForm);
  
  //agrego in index
  $formContenedor.data('index',$formContenedor.find('.panel').length)


  $agregarForm.on('click',function(e){
    e.preventDefault();
    //agrego el un form nuevo
    agregarNuevoPanel()
  });
})

function agregarNuevoPanel(){
  // buscar el prototypo
  var prototype = $formContenedor.data('prototype');
  // crear la form
  var newForm = prototype;
  //busco el index li inserto y le agrego 1
  var index = $formContenedor.data('index')
  newForm = newForm.replace(/__name__/g,index)
  index++
  $formContenedor.data('index',index)

  //new panel body
  var $panel = $('<div class="panel panel-warning"><div class="panel-heading"></div></div>');

  //agregar el form a un body
  var $formBody = $('<div class="panel-body"></div>').append(newForm)
  // agregar el bodyform al panel new
  $panel.append($formBody)

  //agregar boton de borrar
  agregarBotonBorrar($panel)

  //se agrega el panel al contenedor de form
  $agregarForm.before($panel)
}

function agregarBotonBorrar($panel) {

  //footer para panel con boton de borrar fornOferta
  var $botonDeBorrar = $('<a hret="#" class="btn btn-danger" > borrar</a>')
  var $footer = $('<div class="panel-footer" ></div>').append($botonDeBorrar)

  //se hacer funcionalidad de borrar 
  $botonDeBorrar.on('click',function (e){
    $(e.target).parents('.panel').slideUp(1000,'swing',function(){
      e.preventDefault();
      $(this).remove();
    });
  })

  //agregar el footer al panel
  $panel.append($footer)
}