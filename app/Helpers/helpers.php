<?php

use Illuminate\Support\Arr;

function userState($state) {
	if ($state==1) {
		return '<span class="badge badge-success">Activo</span>';
	} elseif ($state==2) {
		return '<span class="badge badge-danger">Inactivo</span>';
	} else {
		return '<span class="badge badge-primary">Desconocido</span>';
	}
}

function imageCardProduct($product, $type=0) {
	if ($type==0) {
		if(count($product->images)>0) {
			return '<img class="img-fluid" src="'.asset('/admins/img/products/'.$product->images[0]->image).'" alt="'.$product->name.'">';
		} else {
			return '<img class="img-fluid" src="'.asset('/admins/img/products/imagen.jpg').'" alt="'.$product->name.'">';
		}
	} else {
		if(count($product->images)>0) {
			return '<img class="w-100 h-100" src="'.asset('/admins/img/products/'.$product->images[0]->image).'" alt="'.$product->name.'">';
		} else {
			return '<img class="w-100 h-100" src="'.asset('/admins/img/products/imagen.jpg').'" alt="'.$product->name.'">';
		}
	}
}

function productPrice($product) {
	if($product->ofert>0) {
		$ofert=$product->price-($product->price*$product->ofert/100);
		return '<p class="price"><span class="mr-2 price-dc">S/. '.number_format($product->price, 2, ",", ".").'</span><span class="price-sale">S/. '.number_format($ofert, 2, ",", ".").'</span></p>';
	} else {
		return '<p class="price"><span>S/. '.number_format($product->price, 2, ",", ".").'</span></p>';
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
function filterRedirect($request, $index, $value) {
	if(Arr::has($request, $index)) {
		$request=Arr::set($request, $index, $value);
	} else {
		$request=Arr::add($request, $index, $value);
	}
	return $request;
}