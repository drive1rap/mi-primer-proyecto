	jQuery(document).ready(function($) {
	$('#accnavlocaliza').click(function () {
		$('#supercuerpo nav').slideToggle();
	});

	$('a[href="#comentarios"]').click(function(ev){
		scroll($('body'),'a[name="comentarios"]');
		return false;
	});

	$('.accordionH').click(function(){
		if(jQuery(this).next('.accordion').css("display") == 'none')
			jQuery(this).next('.accordion').show();
		else
			jQuery(this).next('.accordion').hide();
	});

	$('#bannerslat').load(base_dir + "/publi.php");

	if(detectmob() && $('#div-gpt-ad-1383669863967-0').attr("style") == undefined){
		// $('#div-gpt-ad-1383669863967-0').css({"width":"468px","height":"60px"});
		// googletag.display('div-gpt-ad-1383669863967-0');
	}
	publiMovil();

});

$(window).resize(function(){
	// if(detectmob()){
		publiMovil();
	// }
});

function publiMovil(){
	if( $(window).width() >= 600){
		// $('#div-gpt-ad-1383669863967-0').removeAttr("style");
		$('#div-gpt-ad-1383669863967-0').hide();
	}else{
		// if($('#div-gpt-ad-1383669863967-0').attr("style") == undefined){
			$('#div-gpt-ad-1383669863967-0').show();
			// $('#div-gpt-ad-1383669863967-0').css({"width":"468px","height":"60px"});
			// googletag.display('div-gpt-ad-1383669863967-0');
		// }
	}
}

function doSubmitPanelControl(form){
	var datas = "";
	var idForm = $(form).attr("id");
	$('#'+idForm+' input[type!="submit"][type!="radio"], #'+idForm+' select,  #'+idForm+' [type="radio"]:checked, #'+idForm+' textarea').each(function(){ datas += ($(this).attr("name")+"="+$(this).val()) + "&"; });
	$.ajax({
		type: "POST",
		dataType: "JSON",
		url: $(form).attr("action"),
		data: datas.slice(0,datas.length-1),
		beforeSend: function(){ $('#'+idForm+' #botonenvio').hide();$('#'+idForm+' #loader').show(); },
		complete: function(){ $('#'+idForm+' #botonenvio').show();$('#'+idForm+' #loader').hide(); }
	})
	.done(function( data ) {
		if(data.valido == 0){
			$('#'+idForm+' #mensajeformulario').hide().html(data.mensaje).css("color", "red").slideDown();
		}else{
			$('#'+idForm+' #mensajeformulario').hide().html(data.mensaje).css("color", "green").slideDown();
		}
	});

	return false;
}

function doSubmit(el){
	$.ajax({
		type: "POST",
		dataType: "JSON",
		url: $(el).closest('form').attr("action"),
		data: {
			id_descarga: $(el).closest('form').find('[name*="id_descarga"]').val(),
			origen: $(el).closest('form').find('[name*="origen"]').val(),
			usuario: $(el).closest('form').find('[name*="usuario"]').val(),
			clave: $(el).closest('form').find('[name*="clave"]').val(),
			guardar_clave: $(el).closest('form').find('[name*="guardar_clave"]').val()
		},
		beforeSend: function(){ $('.submitButtonWrapper').addClass("cargandocontenido"); $('.submitButtonWrapper input').hide(); },
		complete: function(){ $('.submitButtonWrapper').removeClass("cargandocontenido"); $('.submitButtonWrapper input').show(); }
	})
	.done(function( data ) {
		if(data.valido == 0){
			$('.errorLoginWrapper').hide();
			$('.errorLogin').html("");
			$('.errorLogin').append(data.mensaje);
			$('.errorLoginWrapper').slideDown();
		}else{
			location.reload(true);
		}
	});
}

function abrirSubPanelIcono(r){
	return abrirSubPanel(r, 'areacontrol2', 'icono-personal');
}
function abrirSubPanel(r, destino, nombrePanel, args, func){
	if (args == undefined)
		args = "";
	$.get('/comunidad/panel-control/'+nombrePanel+'.php'+args, function(html) {
		$('#'+destino).html(html);
		if($(r).parent().attr("id") == "opcionescontrol"){
			$('.activo').removeClass("activo");
			$(r).addClass("activo");
		}else if($(r).parent().attr("id") == "opcionescontrol2"){
			$('.activo2').removeClass("activo2");
			$(r).addClass("activo2");
		}
		if(func != undefined)
			func();
		return false;
	});
}

var crearPerfilPublico = function (){
	if($('#faltaperfil').length == 1){
		$('#faltaperfil').submit(function(){
			$.post( $('#faltaperfil').attr('action'), function( data ) {
			  var obj = JSON.parse(data);
			  $('#botonenvio').hide();
			  $('#faltaperfil_result').html(obj.mensaje).fadeIn();
			});
			return false;
		});
	}
}

function ajaxFileUpload()
{
    $("#loader")
    .ajaxStart(function(){
        $(this).show();
    })
    .ajaxComplete(function(){
        $(this).hide();
    });

    jQuery.extend({
		    handleError: function( s, xhr, status, e ) {
		        // If a local callback was specified, fire it
		        if ( s.error )
		            s.error( xhr, status, e );
		        // If we have some XML response text (e.g. from an AJAX call) then log it in the console
		        else if(xhr.responseText){
		        	var r = JSON.parse(xhr.responseText);
		        	if(r.valido == "1"){
		        		$('#capacorrecto').html(r.mensaje)
		        	}
	          }
		    }
		});

    $.ajaxFileUpload
    (
        {
            url:'upload-icono-personal.php',
            secureuri:false,
            fileElementId:'examinar_imagen',
            dataType: 'json',
            success: function (data, status)
            {
              if(data.valido == 0){
								$('#mensajeformulario').hide().html(data.mensaje).css("color", "red").slideDown();
							}else{
								$('#capacorrecto').html(decodeURIComponent(data.mensaje));
								$('#mensajeformulario').hide().html("Icono modificdo").css("color", "green").slideDown();
							}
            }
        }
    )
    return false;
}



function marcarSpam(id, tipo){
	$.ajax({
	  url: '/comentarios/marcar_como_spam.php?tipo=' + tipo + '&id_item=' + id,
	  success: function(r){
	  	$('#spamcomentario'+id).html(r);
	  },
	  dataType: 'text'
	});
}

function detectmob() {
   return(window.innerWidth <= 500);
}

function scroll(el, to){
	$(el).scrollTo(to,
		{offsetTop     : 50,
    duration      : 500,
    easing        : 'swing'}
  );
}

/*! Cookies.js - 0.4.0; Copyright (c) 2014, Scott Hamper; http://www.opensource.org/licenses/MIT */
(function(e){"use strict";var b=function(a,d,c){return 1===arguments.length?b.get(a):b.set(a,d,c)};b._document=document;b._navigator=navigator;b.defaults={path:"/"};b.get=function(a){b._cachedDocumentCookie!==b._document.cookie&&b._renewCache();return b._cache[a]};b.set=function(a,d,c){c=b._getExtendedOptions(c);c.expires=b._getExpiresDate(d===e?-1:c.expires);b._document.cookie=b._generateCookieString(a,d,c);return b};b.expire=function(a,d){return b.set(a,e,d)};b._getExtendedOptions=function(a){return{path:a&& a.path||b.defaults.path,domain:a&&a.domain||b.defaults.domain,expires:a&&a.expires||b.defaults.expires,secure:a&&a.secure!==e?a.secure:b.defaults.secure}};b._isValidDate=function(a){return"[object Date]"===Object.prototype.toString.call(a)&&!isNaN(a.getTime())};b._getExpiresDate=function(a,d){d=d||new Date;switch(typeof a){case "number":a=new Date(d.getTime()+1E3*a);break;case "string":a=new Date(a)}if(a&&!b._isValidDate(a))throw Error("`expires` parameter cannot be converted to a valid Date instance"); return a};b._generateCookieString=function(a,b,c){a=a.replace(/[^#$&+\^`|]/g,encodeURIComponent);a=a.replace(/\(/g,"%28").replace(/\)/g,"%29");b=(b+"").replace(/[^!#$&-+\--:<-\[\]-~]/g,encodeURIComponent);c=c||{};a=a+"="+b+(c.path?";path="+c.path:"");a+=c.domain?";domain="+c.domain:"";a+=c.expires?";expires="+c.expires.toUTCString():"";return a+=c.secure?";secure":""};b._getCookieObjectFromString=function(a){var d={};a=a?a.split("; "):[];for(var c=0;c<a.length;c++){var f=b._getKeyValuePairFromCookieString(a[c]); d[f.key]===e&&(d[f.key]=f.value)}return d};b._getKeyValuePairFromCookieString=function(a){var b=a.indexOf("="),b=0>b?a.length:b;return{key:decodeURIComponent(a.substr(0,b)),value:decodeURIComponent(a.substr(b+1))}};b._renewCache=function(){b._cache=b._getCookieObjectFromString(b._document.cookie);b._cachedDocumentCookie=b._document.cookie};b._areEnabled=function(){var a="1"===b.set("cookies.js",1).get("cookies.js");b.expire("cookies.js");return a};b.enabled=b._areEnabled();"function"===typeof define&& define.amd?define(function(){return b}):"undefined"!==typeof exports?("undefined"!==typeof module&&module.exports&&(exports=module.exports=b),exports.Cookies=b):window.Cookies=b})();


(function($, w) {
    $.extend({
        jsMalditasCookies: function(opciones) {

            var configuracion = {
                cookie: "aceptocookies",
                classContenedorAviso: "contcookies",
                mensaje: "Este sitio, como la mayoría, usa cookies. Si sigues navegando entendemos que aceptas la <a href=\"/datos-legales/cookies.php\">política de cookies</a>.",
                mensajeAceptar: "Aceptar",
                esperaScroll: 15000,
                expires: 3600 * 24 * 365 * 2 //segundos en 2 años
            }

            if(!Cookies.enabled){
                configuracion.mensaje = "Este sitio usa Cookies y en tu navegador están desactivadas. Actívalas por favor.";
            }

            jQuery.extend(configuracion, opciones);

            if(Cookies.get(configuracion.cookie)!="aceptadas"){

                setTimeout(function(){
                    w.on("scroll", manejadorScroll);
                }, configuracion.esperaScroll);
                
                function manejadorScroll(e){
                    cerrarAviso();
                }

                function cerrarAviso(){
                    contAviso.slideUp(1000);
                    w.off("scroll", manejadorScroll);
                }
                var contAviso = $("<div>")
                    .addClass(configuracion.classContenedorAviso)
                    .html(configuracion.mensaje + " <a href=\"#\" class=\"cookiesaceptar\">" + configuracion.mensajeAceptar + "</a>")
                    .appendTo("body");
                var enlace = contAviso.find("a.cookiesaceptar").on("click", function(e){
                    e.preventDefault();
                    cerrarAviso();
                    Cookies.set(configuracion.cookie, 'aceptadas', { expires: configuracion.expires }); // Expira en 2 años
                });
            }
            
            return this;
        }
    });
})(jQuery, jQuery(window));
$(function(){
	jQuery.jsMalditasCookies();
});

$(function(){
    $(".cuentaatras").each(function(){
        var elem = $(this);
        var ad = elem.data("cuenta").split("|");
        var f = new Date();
        f.setUTCFullYear(ad[0]);
        f.setUTCMonth(ad[1] - 1);
        f.setUTCDate(ad[2]);
        f.setUTCHours(ad[3] - 1);
        f.setUTCMinutes(ad[4]);
        var ahora = new Date();
        if (ahora.getTime() - f.getTime() > 3600000){
            elem.html("Este evento ya se emiti&oacute;. Puedes ver la grabaci&oacute;n");
        }else{
            if(ahora.getTime() > f.getTime()){
                elem.text("Estamos emitiendo en vivo!");
            }else{
            	//horario verano /invierno cambia el último parámetro de crearContador(). 1=horario invierno, 2=horario verano (ESPAÑA)
                var cont = crearContador(ad[0], ad[1], ad[2], ad[3], ad[4], 1).en("#" + elem.attr("id")).yActualizarCada(1000).milisegundos();    
            }
        }
    });
});


(function($) {
    $.fn.formularioAjaxJQ = function(opciones) {
        var conf = {
            botonenvio: '#botonenvio',
            spiner: '#spinerdw',
            quitarform: true,
            capamsg: "#mensajeformulario"
        }
        $.extend(conf, opciones);
        conf.botonenvio = $(conf.botonenvio);
        conf.capamsg = $(conf.capamsg);
        conf.spiner = $(conf.spiner);

        this.each(function(){
        	var f = $(this);
        	f.on("submit", function(e){
        		e.preventDefault();
        		conf.botonenvio.hide();
        		conf.spiner.show();
        		conf.capamsg.html("");
        		$.ajax({
        			url: f.attr("action"),
        			method: "POST",
        			data: f.serialize(),
        			dataType: 'json'
        		})
        		.done(function(data){
	        		if (data.valido){
	        			if(conf.quitarform){
	        				f.html(data.mensaje);
	        				$("html, body").animate({
						        scrollTop: 1
						    }, 1000);
	        			}
	        			conf.capamsg.css("color", "green");
	        		}else{
	        			conf.capamsg.css("color", "red");
	        			conf.botonenvio.show();
	        			conf.capamsg.html(data.mensaje);
	        		}
	        	})
	        	.always(function(){
	        		conf.spiner.hide();
	        	});
        	});
        });
        return this;
    };
})(jQuery);
