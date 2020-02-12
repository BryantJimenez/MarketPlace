@extends('layouts.web')

@section('title', 'Categorías y subcategorías')

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

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row bg-white py-4">
			@foreach($categories as $category)
			<div class="col-12 pb-4 px-4 ftco-animate">
				<p class="h5"><a href="{{ route('tienda', ['url' => filterRedirect('', 'categoria', $category->slug)]) }}">{{ $category->name }}</a></p>
				<div class="row">
					@forelse ($category->subcategories as $subcategory)
					<div class="col-md-4 col-lg-3 col-sm-6 col-12">
						<p><a href="{{ route('tienda', ['url' => filterRedirect('', ['categoria', 'subcategoria'], [$category->slug, $subcategory->slug])]) }}">{{ $subcategory->name }}</a></p>
					</div>
					@empty
					@endforelse
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>

@endsection