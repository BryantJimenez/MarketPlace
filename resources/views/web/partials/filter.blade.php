<div class="nav flex-column">
  @if(count($search)>0)
  <div class="card border-secondary mb-3 px-2 py-2">
    @for ($i=0; $i < count($search); $i++)
    @if($search[key($search)]!="")
    <div class="row">
      <div class="col-9">
        <span>{{ ucfirst(key($search)) }}</span>
        <p class="font-weight-bold mb-0">{{ str_replace("-", " ", ucfirst($search[key($search)])) }}</p>
      </div>
      <div class="col-3">
        <a href="{{ str_replace([key($search).'='.$search[key($search)].'&', key($search).'='.$search[key($search)]], '', url()->full()) }}" class="btn btn-outline-secondary rounded"><i class="icon-close"></i></a>
      </div>
    </div>
    @if($i!=count($search)-1)
    <hr class="my-2">
    @endif
    @endif
    @php next($search) @endphp
    @endfor
  </div>
  @endif

  @if(!isset($search['buscar']))
  <div class="mb-3">
    <p class="h6">Buscar</p>
    <form class="d-flex justify-content-between" action="{{ route('tienda', $search) }}" method="GET">
      <select class="multiselect form-control" name="buscar" id="searchField">
        <option value="">Buscar</option>
        @foreach($productsSelect as $product)
        <option value="{{ $product['slug'] }}">{{ $product['name'] }}</option>
        @endforeach
      </select>
      <button class="btn btn-outline-secondary btn-sm rounded" type="submit"><i class="icon-paper-plane"></i></button>
    </form>
  </div>
  @endif

  @if(!isset($search['precio']))
  <div class="mb-3">
    <p class="h6">Precio</p>
    <select class="form-control" id="filterPrice">
      <option value="">Seleccione</option>
      <option value="bajo" url="{{ route('tienda', filterRedirect($search, 'precio', 'bajo')) }}">Precios más bajos</option>
      <option value="alto" url="{{ route('tienda', filterRedirect($search, 'precio', 'alto')) }}">Precios más altos</option>
    </select>
  </div>
  @endif

  @if(!isset($search['marca']))
  <div class="mb-3">
    <p class="h6">Marcas</p>
    <select class="multiselect form-control" id="filterBrand">
      <option value="">Seleccione</option>
      @foreach($brands as $brand)
      <option value="{{ $brand->slug }}" url="{{ route('tienda', filterRedirect($search, 'marca', $brand->slug)) }}">{{ $brand->name }}</option>
      @endforeach
    </select>
  </div>
  @endif

  @if(!isset($search['categoria']))
  <div class="mb-3">
    <p class="h6">Categorías</p>
    <select class="multiselect form-control" id="filterCategory">
      <option value="">Seleccione</option>
      @foreach($categories as $category)
      <option value="{{ $category->slug }}" url="{{ route('tienda', filterRedirect($search, 'categoria', $category->slug)) }}">{{ $category->name }}</option>
      @endforeach
    </select>
  </div>
  @endif

  @if(!isset($search['distrito']))
  <div class="mb-3">
    <p class="h6">Distritos</p>
    <select class="multiselect form-control" id="filterDistrict">
      <option value="">Seleccione</option>
      @foreach($districts as $district)
      <option value="{{ $district['id'] }}" url="{{ route('tienda', filterRedirect($search, 'distrito', $district['id'])) }}">{{ $district['name'] }}</option>
      @endforeach
    </select>
  </div>
  @endif
</div>