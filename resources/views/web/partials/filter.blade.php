<div class="nav flex-column">
  <div class="mb-3">
    <p class="h6">Buscar</p>
    <input class="form-control" type="text" name="search" placeholder="Buscar">
  </div>

  <div class="mb-3">
    <p class="h6">Precio</p>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">S/.</span>
      </div>
      <input class="form-control" type="text" placeholder="Min">
      <input class="form-control" type="text" placeholder="Max">
    </div>
  </div>

  <div class="mb-3">
    <p class="h6">Categorías</p>
    @foreach($categories as $category)
    <a href="{{ route('tienda') }}" class="nav-link text-primary">{{ $category->name }}</a>
    @endforeach
  </div>

  <div class="mb-3">
    <p class="h6">Distritos</p>
    @foreach($districts as $district)
    <a href="{{ route('tienda') }}" class="nav-link text-primary">{{ $district['name'] }}</a>
    @endforeach
  </div>
</div>