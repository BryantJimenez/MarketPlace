<?php

use Illuminate\Support\Arr;
use App\District;

function district($id) {
	$district=District::where('id', $id)->firstOrFail();
	return $district->name;
}

function userState($state) {
	if ($state==1) {
		return '<span class="badge badge-success">Activo</span>';
	} elseif ($state==2) {
		return '<span class="badge badge-danger">Inactivo</span>';
	} else {
		return '<span class="badge badge-primary">Desconocido</span>';
	}
}

function saleState($state) {
	if ($state==1) {
		return '<span class="badge badge-success">Aprobado</span>';
	} elseif ($state==2) {
		return '<span class="badge badge-warning">Pendiente</span>';
	} elseif ($state==3) {
		return '<span class="badge badge-danger">Rechazado</span>';
	} else {
		return '<span class="badge badge-primary">Desconocido</span>';
	}
}

function blogState($state) {
	if ($state==1) {
		return '<span class="badge badge-success">Publicado</span>';
	} elseif ($state==2) {
		return '<span class="badge badge-dark">Borrador</span>';
	} else {
		return '<span class="badge badge-primary">Desconocido</span>';
	}
}

function storeRequetsState($state) {
	if ($state==1) {
		return '<span class="badge badge-success">Aprobada</span>';
	} elseif ($state==2) {
		return '<span class="badge badge-warning">Pendiente</span>';
	} elseif ($state==3) {
		return '<span class="badge badge-danger">Rechazada</span>';
	} else {
		return '<span class="badge badge-primary">Desconocido</span>';
	}
}

function saleShape($shape) {
	if ($shape==1) {
		return '<span class="badge badge-primary">Tarjeta</span>';
	} elseif ($shape==2) {
		return '<span class="badge badge-primary">Transferencia</span>';
	} else {
		return '<span class="badge badge-primary">Desconocido</span>';
	}
}

function imageCardProduct($product, $type=0) {
	if ($type==0) {
		if(count($product->images)>0) {
			return '<img class="img-fluid lazy" data-src="'.asset('/admins/img/products/'.$product->images[0]->image).'" src="'.asset('/web/images/loading.gif').'" alt="'.$product->name.'">';
		} else {
			return '<img class="img-fluid lazy" data-src="'.asset('/admins/img/products/imagen.jpg').'" src="'.asset('/web/images/loading.gif').'" alt="'.$product->name.'">';
		}
	} else {
		if(count($product->images)>0) {
			return '<img class="w-100 img-fluid h-180-px lazy" data-src="'.asset('/admins/img/products/'.$product->images[0]->image).'" src="'.asset('/web/images/loading.gif').'" alt="'.$product->name.'">';
		} else {
			return '<img class="w-100 img-fluid h-180-px lazy" data-src="'.asset('/admins/img/products/imagen.jpg').'" src="'.asset('/web/images/loading.gif').'" alt="'.$product->name.'">';
		}
	}
}

function productPrice($product, $type=0) {
	if ($type==0) {
		if($product->ofert>0) {
			$ofert=$product->price-($product->price*$product->ofert/100);
			return '<p class="price"><span class="mr-2 price-dc">S/. '.number_format($product->price, 2, ".", "").'</span><span class="price-sale">S/. '.number_format($ofert, 2, ".", "").'</span></p>';
		} else {
			return '<p class="price"><span>S/. '.number_format($product->price, 2, ".", "").'</span></p>';
		}
	} elseif ($type==1) {
		return number_format($product->price, 2, ".", "");
	} elseif ($type==2) {
		$ofert=$product->price-($product->price*$product->ofert/100);
		return number_format($ofert, 2, ".", "");
	}
}

//Función para calcular la distancia entre 2 puntos en km
function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $decimals = 2) {
	// Cálculo de la distancia en grados
	$degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));

	// Conversión de la distancia en grados a la unidad escogida (kilómetros, millas o millas naúticas)
	switch($unit) {
		case 'km':
		$distance = $degrees * 111.13384; // 1 grado = 111.13384 km, basándose en el diametro promedio de la Tierra (12.735 km)
		break;
		case 'mi':
		$distance = $degrees * 69.05482; // 1 grado = 69.05482 millas, basándose en el diametro promedio de la Tierra (7.913,1 millas)
		break;
		case 'nmi':
		$distance =  $degrees * 59.97662; // 1 grado = 59.97662 millas naúticas, basándose en el diametro promedio de la Tierra (6,876.3 millas naúticas)
	}
	return round($distance, $decimals);
}

//Función para cambiar redirecciones de url dinamicamente
function filterRedirect($url, $index, $value) {
	if (is_array($index) && is_array($value)) {
		for ($i=0; $i < count($index); $i++) { 
			$url.=$index[$i].'_'.$value[$i].'_';
		}
	} else {
		$url=$url.$index.'_'.$value.'_';	
	}
	return $url;
}