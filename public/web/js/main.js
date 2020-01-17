 AOS.init({
 	duration: 800,
 	easing: 'slide'
 });

 (function($) {

 	"use strict";

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

	var carousel = function() {
		// $('.home-slider').owlCarousel({
		// 	loop:true,
		// 	autoplay: true,
		// 	margin:0,
		// 	animateOut: 'fadeOut',
		// 	animateIn: 'fadeIn',
		// 	nav:false,
		// 	autoplayHoverPause: false,
		// 	items: 1,
		// 	navText : ["<span class='ion-md-arrow-back'></span>","<span class='ion-chevron-right'></span>"],
		// 	responsive:{
		// 		0:{
		// 			items:1
		// 		},
		// 		600:{
		// 			items:1
		// 		},
		// 		1000:{
		// 			items:1
		// 		}
		// 	}
		// });

		$('.carousel-category').owlCarousel({
			center: true,
			loop: true,
			items:1,
			margin: 30,
			stagePadding: 0,
			nav: false,
			autoplay:true,
			navText: ['<span class="ion-ios-arrow-back text-primary">', '<span class="ion-ios-arrow-forward  text-primary">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 3
				},
				1000:{
					items: 4
				}
			}
		});

		$('.carousel-brand').owlCarousel({
			center: true,
			loop: true,
			items:1,
			margin: 30,
			stagePadding: 0,
			nav: false,
			autoplay:true,
			navText: ['<span class="ion-ios-arrow-back text-primary">', '<span class="ion-ios-arrow-forward  text-primary">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 3
				},
				1000:{
					items: 5
				}
			}
		});

		$('.carousel-store').owlCarousel({
			center: true,
			loop: true,
			items:1,
			margin: 30,
			stagePadding: 0,
			nav: false,
			autoplay:true,
			navText: ['<span class="ion-ios-arrow-back text-primary">', '<span class="ion-ios-arrow-forward  text-primary">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 2
				},
				1000:{
					items: 3
				}
			}
		});

		$('.carousel-product').owlCarousel({
			center: true,
			loop: true,
			items:1,
			margin: 30,
			stagePadding: 0,
			nav: false,
			autoplay:true,
			navText: ['<span class="ion-ios-arrow-back text-primary">', '<span class="ion-ios-arrow-forward  text-primary">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 2
				},
				1000:{
					items: 4
				}
			}
		});
	};
	carousel();

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


	function makeTimer() {

		var endTime = new Date("21 December 2019 9:56:00 GMT+01:00");			
		endTime = (Date.parse(endTime) / 1000);

		var now = new Date();
		now = (Date.parse(now) / 1000);

		var timeLeft = endTime - now;

		var days = Math.floor(timeLeft / 86400); 
		var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
		var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
		var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

		if (hours < "10") { hours = "0" + hours; }
		if (minutes < "10") { minutes = "0" + minutes; }
		if (seconds < "10") { seconds = "0" + seconds; }

		$("#days").html(days + "<span>Days</span>");
		$("#hours").html(hours + "<span>Hours</span>");
		$("#minutes").html(minutes + "<span>Minutes</span>");
		$("#seconds").html(seconds + "<span>Seconds</span>");		

	}

	setInterval(function() { makeTimer(); }, 1000);

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
			url: '/agregar/ubicacion/'+userLat+'/'+userLng,
			dataType: 'html'
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
			autoFocus: true
		});

		//Llave para conectarse a culqi e inicializador
		Culqi.publicKey='pk_test_u3aBMzCGCvPM3vfc';
		Culqi.init();
	}
});

//Funcion para agregar productos al carrito
$('.addCart').click(function(event) {
	var slug=$(this).attr('slug');
	$(event.currentTarget.childNodes[1].childNodes[0]).removeClass('ion-ios-cart');
	$(event.currentTarget.childNodes[1].childNodes[0]).addClass('spinner-border spinner-border-sm');
	$.ajax({
		url: '/carrito/' + slug,
		dataType: 'html',
	}).done(function(result) {
		var obj=JSON.parse(result);
		$(".count-cart").text(obj.length);
		$(event.currentTarget.childNodes[1].childNodes[0]).removeClass('spinner-border spinner-border-sm');
		$(event.currentTarget.childNodes[1].childNodes[0]).addClass('ion-ios-cart');
	});
});

//Agregar productos al carrito
$('.addCartList').click(function(event) {
	var slug=$(this).attr('slug');
	$(this).text('Agregado');
	$.ajax({
		url: '/carrito/' + slug,
		dataType: 'html',
	}).done(function(result) {
		var obj=JSON.parse(result);
		$(".count-cart").text(obj.length);
		// $('.addCartList[slug="'+obj.product+'"]').text('Agregado');
	});
});

//Quitar producto del carrito
$('.product-remove a').click(function() {
	var slug=$(this).attr('slug');
	$.ajax({
		url: '/carrito/quitar/' + slug,
		dataType: 'html',
	}).done(function(result) {
		var obj=JSON.parse(result);
		if (obj.status=='ok') {
			$(".cartProduct[slug='"+slug+"']").remove();
			var count=$(".count-cart").text();
			count=count-1;
			$(".count-cart").text(count);	
		}
	});
});

//Funcion para agregar productos a select del filtro de inicio
// $('#searchBrand').change(function(event) {
// 	var slug=$(this).val();
// 	$.ajax({
// 		url: '/agregar/productos/' + slug,
// 		dataType: 'html',
// 	}).done(function(result) {
// 		var obj=JSON.parse(result);
// 		$('#searchField').select2("destroy");
// 		$("#searchField option").remove();
// 		$('#searchField').append($('<option>', {
// 			value: "",
// 			text: "Buscar"
// 		}));
// 		for (var i=obj.length-1; i>=0; i--) {
// 			$('#searchField').append($('<option>', {
// 				value: obj[i].slug,
// 				text: obj[i].name
// 			}));
// 		}
// 		$('#searchField').select2({
// 			theme: "bootstrap",
// 			language: "es"
// 		});
// 	});
// });

//Redireccionar en el filtro de la tienda con la opcion precio
$('#filterPrice').change(function() {
	if ($(this).val()!="") {
		var url=window.location.href;
		if (url.indexOf('?')!=-1) {
			if (url.indexOf('precio=alto')!=-1) {
				url.replace(/precio=alto/g, 'precio='+$(this).val());
				location.href=url
			} else if(url.indexOf('precio=bajo')!=-1) {
				url.replace(/precio=bajo/g, 'precio='+$(this).val());
				location.href=url
			} else {
				location.href=url+'&precio='+$(this).val();	
			}
		} else {
			location.href=url+'?precio='+$(this).val();
		}
	}
});

//Al cambiar la cantidad de un producto en el carrito cambia el total
$('.qty').change(function() {
	var slug=$(this).attr('slug'), price=$(this).attr('price'), qty=$(this).val();
	var total=price*qty;
	total=new Intl.NumberFormat("de-DE").format(total);
	$('.total[slug="'+slug+'"]').text("S/. "+total);
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

$('#btn_pagar').on('click', function(e) {
  	// Crea el objeto Token con Culqi JS
  	Culqi.createToken();
  	e.preventDefault();
  });

function culqi() {
	if (Culqi.token) { // ¡Objeto Token creado exitosamente!
		var token = Culqi.token.id;
		console.log('Se ha creado un token:' + token);
    	//En esta linea de codigo debemos enviar el "Culqi.token.id"

    	$.post("../tarjeta", {token: Culqi.token.id}, function(data, status){
    		console.log(data);
    		data=JSON.parse(data);
    		console.log(data);
    		if(data.objeto=="cargo"){
    			alert("Cargo realizado exitosamente");
    		} else {
    			console.log(data);
    			alert(data.mensaje_usuario);
    		}
    	});
	} else { // ¡Hubo algún problema!
    	// Mostramos JSON de objeto error en consola
    	console.log(Culqi.error);
    	alert(Culqi.error.user_message);
    }
};