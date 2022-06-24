@include('layount.header')
<div class="row">
    <div class="col-md-12">
        <h1 style="text-align: center;">Crear producto</h1>
    </div>
    <div class="col-md-5">
        <a href="{{ route('productos.index') }}" class="btn btn-dark">Regresar</a>
    </div>
</div>

<form action="{{ route('productos.store') }}" method="POST" style="margin-top: 25px;">
    <div class="row">
        @csrf
        @include('productos.productos_form')

        <div class="col-md-12 form-group" style="margin-top: 20px;">
            <button class="btn btn-success form-control">Nuevo</button>
        </div>
    </div>
</form>
@include('layount.footer')
