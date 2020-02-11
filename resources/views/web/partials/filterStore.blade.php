<div class="nav flex-column">
  @if(count($urlArray)>0 && $url!=NULL)
  <div class="card border-secondary mb-3 px-2 py-2">
    @for ($i=0; $i < count($urlArray); $i+=2)
    @if($urlArray[$i]!="" && $urlArray[$i+1]!="")
    <div class="row">
      <div class="@if(strpos(url()->full(), "/tiendas")===false || $urlArray[$i]!="distrito") col-9 @else col-12 @endif">
        <span>{{ ucfirst($urlArray[$i]) }}</span>
        @if($urlArray[$i]=="distrito")
        <p class="font-weight-bold mb-0">{{ district($urlArray[$i+1]) }}</p>
        @else
        <p class="font-weight-bold mb-0">{{ str_replace("-", " ", ucfirst($urlArray[$i+1])) }}</p>
        @endif
      </div>
      @if(strpos(url()->full(), "/tiendas")===false || $urlArray[$i]!="distrito")
      <div class="col-3">
        <a href="{{ route('ver.tienda', ['slug' => $store->slug, 'url' => str_replace($urlArray[$i]."_".$urlArray[$i+1]."_", "", $url)]) }}" class="btn btn-outline-secondary rounded"><i class="icon-close"></i></a>
      </div>
      @endif
    </div>
    @if(count($urlArray)>$i)
    <hr class="my-2">
    @endif
    @endif
    @endfor
  </div>
  @endif

  @if(!in_array("buscar", $urlArray))
  <div class="mb-3">
    
    <p class="h6">Buscar</p>
    <select class="multiselect form-control" id="searchField">
      <option value="">Buscar</option>
      @foreach($productsSelect as $product)
      <option value="{{ $product['slug'] }}" url="{{ route('ver.tienda', ['slug' => $store->slug, 'url' => filterRedirect($url, 'buscar', $product['slug'])]) }}">{{ $product['name'] }}</option>
      @endforeach
    </select>
  </div>
  @endif

  @if(!in_array("precio", $urlArray))
  <div class="mb-3">
    <p class="h6">Precio</p>
    <select class="form-control" id="filterPrice">
      <option value="">Seleccione</option>
      <option value="bajo" url="{{ route('ver.tienda', ['slug' => $store->slug, 'url' => filterRedirect($url, 'precio', 'bajo')]) }}">Precios más bajos</option>
      <option value="alto" url="{{ route('ver.tienda', ['slug' => $store->slug, 'url' => filterRedirect($url, 'precio', 'alto')]) }}">Precios más altos</option>
    </select>
  </div>
  @endif

  @if(!in_array("marca", $urlArray))
  <div class="mb-3">
    <p class="h6">Marcas</p>
    <select class="multiselect form-control" id="filterBrand">
      <option value="">Seleccione</option>
      @foreach($brands as $brand)
      <option value="{{ $brand->slug }}" url="{{ route('ver.tienda', ['slug' => $store->slug, 'url' => filterRedirect($url, 'marca', $brand->slug)]) }}">{{ $brand->name }}</option>
      @endforeach
    </select>
  </div>
  @endif

  @if(!in_array("categoria", $urlArray))
  <div class="mb-3">
    <p class="h6">Categorías</p>
    <select class="multiselect form-control" id="filterCategory">
      <option value="">Seleccione</option>
      @foreach($categories as $category)
      <option value="{{ $category->slug }}" url="{{ route('ver.tienda', ['slug' => $store->slug, 'url' => filterRedirect($url, 'categoria', $category->slug)]) }}">{{ $category->name }}</option>
      @endforeach
    </select>
  </div>
  @endif

  @if(!in_array("distrito", $urlArray))
  <div class="mb-3">
    <p class="h6">Distritos</p>
    <select class="multiselect form-control" id="filterDistrict">
      <option value="">Seleccione</option>
      @foreach($districts as $district)
      <option value="{{ $district['id'] }}" url="{{ route('ver.tienda', ['slug' => $store->slug, 'url' => filterRedirect($url, 'distrito', $district['id'])]) }}">{{ $district['name'] }}</option>
      @endforeach
    </select>
  </div>
  @endif
</div>