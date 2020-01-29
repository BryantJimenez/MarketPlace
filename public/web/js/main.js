 AOS.init({
 	duration: 800,
 	easing: 'slide'
 });

 (function($) {

 	"use strict";

 	$('[data-toggle="tooltip"]').tooltip();

 	var isMobile = {
 		Android: function() {
 			return navigator.userAgent.match(/Android/i);
 		},
 		BlackBerry: function() {
 			return navigator.userAgent.match(/BlackBerry/i);
 		},
 		iOS: function() {
 			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
 		},
 		Opera: function() {
 			return navigator.userAgent.match(/Opera Mini/i);
 		},
 		Windows: function() {
 			return navigator.userAgent.match(/IEMobile/i);
 		},
 		any: function() {
 			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
 		}
 	};


 	$(window).stellar({
 		responsive: true,
 		parallaxBackgrounds: true,
 		parallaxElements: true,
 		horizontalScrolling: false,
 		hideDistantElements: false,
 		scrollProperty: 'scroll'
 	});


 	var fullHeight = function() {

 		$('.js-fullheight').css('height', $(window).height());
 		$(window).resize(function(){
 			$('.js-fullheight').css('height', $(window).height());
 		});

 	};
 	fullHeight();

	// loader
	var loader = function() {
		setTimeout(function() { 
			if($('#ftco-loader').length > 0) {
				$('#ftco-loader').removeClass('show');
			}
		}, 1);
	};
	loader();

	// Scrollax
	$.Scrollax();

	$('nav .dropdown').hover(function(){
		var $this = $(this);
		// 	 timer;
		// clearTimeout(timer);
		$this.addClass('show');
		$this.find('> a').attr('aria-expanded', true);
		// $this.find('.dropdown-menu').addClass('animated-fast fadeInUp show');
		$this.find('.dropdown-menu').addClass('show');
	}, function(){
		var $this = $(this);
			// timer;
		// timer = setTimeout(function(){
			$this.removeClass('show');
			$this.find('> a').attr('aria-expanded', false);
			// $this.find('.dropdown-menu').removeClass('animated-fast fadeInUp show');
			$this.find('.dropdown-menu').removeClass('show');
		// }, 100);
	});


	$('#dropdown04').on('show.bs.dropdown', function () {
		console.log('show');
	});

	// scroll
	var scrollWindow = function() {
		$(window).scroll(function(){
			var $w = $(this),
			st = $w.scrollTop(),
			navbar = $('.ftco_navbar'),
			sd = $('.js-scroll-wrap');

			if (st > 150) {
				if ( !navbar.hasClass('scrolled') ) {
					navbar.addClass('scrolled');	
				}
			} 
			if (st < 150) {
				if ( navbar.hasClass('scrolled') ) {
					navbar.removeClass('scrolled sleep');
				}
			} 
			if ( st > 350 ) {
				if ( !navbar.hasClass('awake') ) {
					navbar.addClass('awake');	
				}
				
				if(sd.length > 0) {
					sd.addClass('sleep');
				}
			}
			if ( st < 350 ) {
				if ( navbar.hasClass('awake') ) {
					navbar.removeClass('awake');
					navbar.addClass('sleep');
				}
				if(sd.length > 0) {
					sd.removeClass('sleep');
				}
			}
		});
	};
	scrollWindow();

	
	var counter = function() {
		
		$('#section-counter').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {

				var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
				$('.number').each(function(){
					var $this = $(this),
					num = $this.data('number');
					console.log(num);
					$this.animateNumber(
					{
						number: num,
						numberStep: comma_separator_number_step
					}, 7000
					);
				});
				
			}

		} , { offset: '95%' } );

	}
	counter();

	var contentWayPoint = function() {
		var i = 0;
		$('.ftco-animate').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .ftco-animate.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn ftco-animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft ftco-animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight ftco-animated');
							} else {
								el.addClass('fadeInUp ftco-animated');
							}
							el.removeClass('item-animate');
						},  k * 50, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '95%' } );
	};
	contentWayPoint();


	// navigation
	var OnePageNav = function() {
		$(".smoothscroll[href^='#'], #ftco-nav ul li a[href^='#']").on('click', function(e) {
			e.preventDefault();

			var hash = this.hash,
			navToggler = $('.navbar-toggler');
			$('html, body').animate({
				scrollTop: $(hash).offset().top
			}, 700, 'easeInOutExpo', function(){
				window.location.hash = hash;
			});


			if ( navToggler.is(':visible') ) {
				navToggler.click();
			}
		});
		$('body').on('activate.bs.scrollspy', function () {
			console.log('nice');
		})
	};
	OnePageNav();


	// magnific popup
	$('.image-popup').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		closeBtnInside: false,
		fixedContentPos: true,
    	mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
    	gallery: {
    		enabled: true,
    		navigateByImgClick: true,
      		preload: [0,1] // Will preload 0 - before current, and 1 after the current image
      	},
      	image: {
      		verticalFit: true
      	},
      	zoom: {
      		enabled: true,
      		duration: 300 // don't foget to change the duration also in CSS
      	}
      });

	$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
		disableOn: 700,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,

		fixedContentPos: false
	});



	var goHere = function() {

		$('.mouse-icon').on('click', function(event){
			
			event.preventDefault();

			$('html,body').animate({
				scrollTop: $('.goto-here').offset().top
			}, 500, 'easeInOutExpo');
			
			return false;
		});
	};
	goHere();

})(jQuery);

$(document).ready(function() {
	//API de Javascript para obtener geolocalización del usuario
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showLocation, errorLocation, { timeout: 0 });
	} else {
		//Aqui no
	}
	function showLocation (location) {
		var userLng=location.coords.longitude;
		var userLat=location.coords.latitude;

		$.ajax({
			url: '/agregar/ubicacion',
			type: 'POST',
			dataType: 'html',
			data: {lat: userLat, lng: userLng},
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		if (typeof(userLat)!="undefined" && typeof(userLng)!="undefined") {
			showDistance(userLat, userLng);
		}
	}
	function  errorLocation (error) {
		if (error.code==1 || error.code==2 || error.code==3) {
			navigator.geolocation.getCurrentPosition(showLocation, errorLocation, { timeout: 0 });
		}
	}

	//multiselect
	if ($('.multiselect').length) {
		$('.multiselect').select2({
			theme: "bootstrap",
			language: "es"
		});
	}

	//datatable español
	var español = {
		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún resultado disponible en esta tabla",
		"sInfo":           "Resultados del _START_ al _END_ de un total de _TOTAL_ registros",
		"sInfoEmpty":      "No hay resultados",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar :",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}
	}

	//datatable normal
	if ($('#tabla').length) {
		$('#tabla').DataTable({
			"language": español
		});
	}

	//Llamado para agregar touchspin a campos de cantidad
	if ($('.qty').length) {
		qtyProduct();
	}

	//Funcion para mostrar la distancia entre el producto o tienda y el usuario
	function showDistance(userLat, userLng) {
		$(".distance").each(function(){
			var lat=$(this).attr('lat'), lng=$(this).attr('lng');
			var km=getDistance(lat, lng, userLat, userLng);
			$(this).append($('<p>', {
				'class': 'text-muted my-0',
				'text': km+' Km'
			}));
		});
	}

	//Galeria de imagenes en la vista del producto
	if ($('#imagesProduct').length) {
		$('#imagesProduct').lightGallery();
		$('#imagesProduct').lightSlider();
	}

	//Plugin para la calidad (estrellas) de las marcas
	if ($('.ratings').length) {
		$(".ratings").rate();
	}

	//Plugin para formulario step en checkout
	if ($('#checkout').length) {
		$("#checkout").steps({
			headerTag: "h3",
			bodyTag: "section",
			transitionEffect: "slideLeft",
			autoFocus: true,
			onStepChanging: function (event, currentIndex, newIndex)
			{
				//Cambiar opciones de pago entre tarjeta y transferencia
				$('#selectPay').change(function() {
					if ($(this).val()=="1") {
						$('#transferFields').addClass('d-none');
						$('#transferFields input, #transferFields select').attr('disabled', true);
						$('#cardFields').removeClass('d-none');
						$('#cardFields input').attr('disabled', false);
					} else {
						$('#cardFields').addClass('d-none');
						$('#cardFields input').attr('disabled', true);
						$('#transferFields').removeClass('d-none');
						$('#transferFields input, #transferFields select').attr('disabled', false);
					}
				});

				$(".billing-form").validate().settings.ignore = ":disabled,:hidden";
				return $(".billing-form").valid();
			},
			onFinishing: function (event, currentIndex)
			{
				$(".billing-form").validate().settings.ignore = ":disabled";
				return $(".billing-form").valid();
			},
			onFinished: function (event, currentIndex)
			{
				// Crea el objeto Token con Culqi JS
				Culqi.createToken();
				e.preventDefault();
			}
		}).validate({
			rules:
			{
				name: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				lastname: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				email: {
					required: true,
					email: true,
					minlength: 8,
					maxlength: 191
				},

				phone: {
					required: true,
					minlength: 5,
					maxlength: 15
				},

				address: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				pay: {
					required: true
				},

				card: {
					required: true,
					minlength: 16,
					maxlength: 16
				},

				code: {
					required: true,
					minlength: 3,
					maxlength: 3
				},

				month: {
					required: true,
					minlength: 2,
					maxlength: 2
				},

				year: {
					required: true,
					minlength: 4,
					maxlength: 4
				},

				reference: {
					required: true,
					minlength: 5,
					maxlength: 25
				}
			},
			messages:
			{
				name: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				lastname: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				email: {
					email: 'Introduce una dirección de correo valida.',
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				phone: {
					minlength: 'Escribe mínimo {0} números.',
					maxlength: 'Escribe máximo {0} números.'
				},

				address: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				card: {
					minlength: 'Escribe mínimo {0} números.',
					maxlength: 'Escribe máximo {0} números.'
				},

				code: {
					minlength: 'Escribe mínimo {0} números.',
					maxlength: 'Escribe máximo {0} números.'
				},

				month: {
					minlength: 'Escribe mínimo {0} números.',
					maxlength: 'Escribe máximo {0} números.'
				},

				year: {
					minlength: 'Escribe mínimo {0} números.',
					maxlength: 'Escribe máximo {0} números.'
				},

				reference: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				}
			}
		});

		//Llave para conectarse a culqi e inicializador
		Culqi.publicKey='pk_test_u3aBMzCGCvPM3vfc';
		Culqi.init();
	}

	//Mapa de leaflet
	if ($('#lat').length && $('#lng').length) {
		if ($('#lat').val()=="" || $('#lng').val()=="") {
			var map = L.map('map', {
				center: [-12.05, -77.04],
				zoom: 12
			});

			marker = L.marker([-12.05, -77.04]).addTo(map);
		} else {
			var mapLat=$('#lat').val();
			var mapLng=$('#lng').val();
			var map = L.map('map', {
				center: [mapLat, mapLng],
				zoom: 12
			});

			marker = L.marker([mapLat, mapLng]).addTo(map);
		}

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

		map.on('click', function(e) {
			if (marker) {
				map.removeLayer(marker);
			}
			marker=L.marker(e.latlng).addTo(map);
			$('#lat').val(e.latlng.lat);
			$('#lng').val(e.latlng.lng);
		});
	}

	//dropify para input file más personalizado
	if ($('.dropify').length) {
		$('.dropify').dropify({
			messages: {
				default: 'Arrastre y suelte una imagen o da click para seleccionarla',
				replace: 'Arrastre y suelte una imagen o haga click para reemplazar',
				remove: 'Remover',
				error: 'Lo sentimos, el archivo es demasiado grande'
			},
			error: {
				'fileSize': 'El tamaño del archivo es demasiado grande ({{ value }} máximo).',
				'minWidth': 'El ancho de la imagen es demasiado pequeño ({{ value }}}px mínimo).',
				'maxWidth': 'El ancho de la imagen es demasiado grande ({{ value }}}px máximo).',
				'minHeight': 'La altura de la imagen es demasiado pequeña ({{ value }}}px mínimo).',
				'maxHeight': 'La altura de la imagen es demasiado grande ({{ value }}px máximo).',
				'imageFormat': 'El formato de imagen no está permitido (Debe ser {{ value }}).'
			}
		});
	}
});

//Redireccionar en el filtro de la tienda con la opcion precio
$('#filterPrice').change(function() {
	if ($(this).val()!="") {
		var url=$('#filterPrice option:selected').attr('url');
		location.href=url;
	}
});

//Redireccionar en el filtro de la tienda con la opcion marca
$('#filterBrand').change(function() {
	if ($(this).val()!="") {
		var url=$('#filterBrand option:selected').attr('url');
		location.href=url;
	}
});

//Redireccionar en el filtro de la tienda con la opcion categoria
$('#filterCategory').change(function() {
	if ($(this).val()!="") {
		var url=$('#filterCategory option:selected').attr('url');
		location.href=url;
	}
});

//Redireccionar en el filtro de la tienda con la opcion distrito
$('#filterDistrict').change(function() {
	if ($(this).val()!="") {
		var url=$('#filterDistrict option:selected').attr('url');
		location.href=url;
	}
});

//Cambiar url en la paginación
// if ($('a.page-link').length) {
// 	$("a.page-link").each(function(){
// 		var url=window.location.href;
// 		console.log(url);

// 		if (url.indexOf('?')!=-1) {
// 			if (url.indexOf('page=')!=-1) {
// 				var start=url.indexOf('page=');
// 				var page=url.substr(start, start+6);
// 				$(this).attr('href', url.replace('/'+page+'/g', 'page='+$(this).text()));
// 				console.log(url.replace(/page/g, 'page='+$(this).text()));
// 			} else {
// 				$(this).attr('href', url+'&page='+$(this).text());
// 			}
// 		} else {
// 			$(this).attr('href', url+'?page='+$(this).text());
// 		}


// 	});
// }

//Al cambiar la cantidad de un producto cambia el total
$('.qty').change(function() {
	var slug=$(this).attr('slug'), qty=$(this).val();
	$("#qtySale").val(qty);
	$.ajax({
		url: '/calcular/precio',
		type: 'POST',
		dataType: 'html',
		data: {qty: qty, delivery: 0.00, slug: slug},
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	}).done(function(resultado) {
		var obj=JSON.parse(resultado);
		$('.total').text("S/. "+obj.total);
	});
});

//Función para calcular las distancia entre 2 puntos en km
function getDistance(lat1, lon1, lat2, lon2){
	rad = function(x) {return x*Math.PI/180;}
	var R = 6378.137; //Radio de la tierra en km
	var dLat = rad( lat2 - lat1 );
	var dLong = rad( lon2 - lon1 );
	var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(rad(lat1)) * Math.cos(rad(lat2)) * Math.sin(dLong/2) * Math.sin(dLong/2);
	var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
	var d = R * c;
	return d.toFixed(0); //Retorna cero decimales
}

//Funcion para colocar plugin de touchspin en todos los campos de cantidad validados
function qtyProduct() {
	$(".qty").each(function(){
		var qtyMax=$(this).attr('max');
		$(this).TouchSpin({
			min: 1,
			max: qtyMax,
			buttondown_class: 'btn btn-primary px-2 py-1 rounded',
			buttonup_class: 'btn btn-primary px-2 py-1 rounded'
		});
	});
}

//Función para crear token de culqi y enviar formulario de pago
function culqi() {
	if (Culqi.token) {
		var token = Culqi.token.id;
		console.log('Se ha creado un token:' + token);
		$('#culqi').val(token);
		$(".billing-form").submit();
	} else {
    	// Mostramos JSON de objeto error en consola
    	console.log(Culqi.error);
    	alert(Culqi.error.user_message);
    }
};