@include('layount.header')
<div class="row">
    <div class="col-md-12">
        <h1 style="text-align: center;">Vender producto</h1>
    </div>
    <div class="col-md-5">
        <a href="{{ route('productos.index') }}" class="btn btn-dark">Regresar</a>
    </div>
</div>

<form action="{{ route('productos.soldout') }}" method="POST" style="margin-top: 25px;">
    <div class="row">
        @isset($producto)
            @csrf
            @method('put')
            <input type="hidden" name="id" id="id" value="{{ $producto->id }}">
            @include('productos.productos_form')

            <div class="col-md-12 form-group" style="margin-top: 20px;">
                <button class="btn btn-success form-control">Vender</button>
            </div>

            @if ($status == 1)
                <div class="col-md-12 alert alert-success" role="alert" style="margin-top: 15px; text-align:center;">
                    Vendido correctamente
                </div>
            @endif

            @if ($status == 2)
                <div class="col-md-12 alert alert-warning" role="alert" style="margin-top: 15px; text-align:center;">
                    La cantidad solicitada supera a la disponible
                </div>
            @endif

            @if ($status == 3)
                <div class="col-md-12 alert alert-danger" role="alert" style="margin-top: 15px; text-align:center;">
                    Error al vender, intentelo nuevamente
                </div>
            @endif
        @endisset
    </div>
</form>
@include('layount.footer')
