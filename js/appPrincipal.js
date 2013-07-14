/*
    1.- GLOBAL
    2.- MODELOS
    3.- COLLECCIONES
    4.- VISTAS
    5.- ROUTERS
	6.- LOAD
    7.- FUNCIONE GLOBALES
    8.- TEMPLATES
*/

/*------------------------------------- 1.-GLOBAL -------------------------------------*/
var app = app || {};
//Determina el menu seleccionado
//1: Inicio
//2: Eventos
//3: Nosotros
//4: Mas
//5: Concato
app.iMenu = 1;
var tempo;
/*------------------------------------- 2.-MODELOS -------------------------------------*/
/*------------------------------------- 3.-COLLECCIONES -------------------------------------*/
/*------------------------------------- 4.-VISTAS -------------------------------------*/
/*------------------------------------- 5.-ROUTERS -------------------------------------*/
app.RouterFn = Backbone.Router.extend({
    routes: {
        'inicio'    : 'inicio',
        'eventos'   : 'eventos',
        'nosotros'  : 'nosotros',
        'mas'    	: 'mas',
        'contacto'  : 'contacto'
    },
    inicio: function() {
        app.iMenu = 1;
		load('principal.html', carga_principal);
    },
    eventos: function() {
        app.iMenu = 2;
		load('eventos.html');
    },
    nosotros: function() {
        app.iMenu = 3;
		load('nosotros.html');
    },
    mas: function() {
        app.iMenu = 4;
		load('mas.html');
    },
    contacto: function() {
        app.iMenu = 5;
		load('contacto.html');
    }
});
/*------------------------------------- 6.-LOAD -------------------------------------*/
$(document).on('ready', inicio);
/*------------------------------------- 7.-FUNCIONES -------------------------------------*/
function inicio() {
	$(document).on({ ajaxStart: onAStart });
	
	app.Router = new app.RouterFn();
    Backbone.history.start();

    $('#slider').nivoSlider();
}

function onAStart() {
	$('#load_content').html('<img class="isLoadding" src="./img/loader.gif"/>');
}

function carga_principal() {
	$('#slider').nivoSlider();
}

function load(p_sUrl, p_fFuncion, p_sPeticion, p_bCache, p_sDataType, p_jContext) {
	var fFuncion = p_fFuncion || function vaia() {};
	var sPeticion = p_sPeticion || 'GET';
	var bCache = p_bCache || false;
	var sDataType = p_sDataType || 'html';
	var jContext = p_jContext || $('#load_content');
	var _data = '';
	
	$.ajax({
		type: sPeticion,
		url: p_sUrl,
		cache: bCache,
		dataType: sDataType
	})
	.done(ajaxDone)
	.error(ajaxError);
	
	function ajaxDone(data) {
		_data = data;
		jContext.fadeOut('slow', finishLoad);
	}
	
	function ajaxError(err) {
		console.log(err.responseText);
	}
	
	function finishLoad() {
		$('#load_content').html(_data).fadeIn(fFuncion());
		delete _data;
	}
}
/*------------------------------------- 8.-TEMPLATES -------------------------------------*/