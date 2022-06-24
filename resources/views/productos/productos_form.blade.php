@include('layount.header')
<div class="row">
    <div class="col-md-4 form-group">
        <label>Nombre producto</label>
        <input type="text" name="nombre_producto" id="nombre_producto" class="form-control"
            value="{{ isset($producto) ? $producto->nombre_producto : '' }}" {{ $readonly }}>
    </div>
    <div class="col-md-4 form-group">
        <label>Referencia</label>
        <input type="text" name="referencia" id="referencia" class="form-control"
            value="{{ isset($producto) ? $producto->referencia : '' }}" {{ $readonly }}>
    </div>
    <div class="col-md-4 form-group">
        <label>Precio</label>
        <input type="number" name="precio" id="precio" class="form-control"
            value="{{ isset($producto) ? $producto->precio : '' }}" {{ $readonly }}>
    </div>
    <div class="col-md-4 form-group">
        <label>Peso</label>
        <input type="number" name="peso" id="peso" class="form-control"
            value="{{ isset($producto) ? $producto->peso : '' }}" {{ $readonly }}>
    </div>
    <div class="col-md-4 form-group">
        <label>Categoria</label>
        <input type="text" name="categoria" id="categoria" class="form-control"
            value="{{ isset($producto) ? $producto->categoria : '' }}" {{ $readonly }}>
    </div>
    @if (isset($vender))
        <div class="col-md-4 form-group">
            <label>Disponible</label>
            <input type="number" name="disponible" id="disponible" class="form-control"
                value="{{ isset($producto) ? $producto->stock : '' }}" {{ $readonly }}>
        </div>
    @endif
    <div class="col-md-4 form-group">
        <label>Cantidad</label>
        <input type="number" name="stock" id="stock" class="form-control"
            value="{{ isset($producto) && !isset($vender) ? $producto->stock : '' }}"
            {{ isset($vender) && $readonly }}>
    </div>
</div>
@include('layount.footer')
