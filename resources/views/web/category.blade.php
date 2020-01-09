@extends('layouts.web')

@section('title', $category->name)

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('/web/images/bg_1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs">Encuentra lo que quiere comprar</p>
				<h1 class="mb-0 bread">Categorías y Subcategorías</h1>
			</div>
		</div>
	</div>
</div>

@endsection