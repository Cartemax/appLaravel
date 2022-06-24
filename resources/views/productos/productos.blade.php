@include('layount.header')
<div class="row">
    <div class="col-md-12">
        <h1 style="text-align: center;">Cafeteria</h1>
    </div>
    <div class="col-md-2">
        <a href="{{ route('productos.create') }}" class="btn btn-info">Nuevo producto</a>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nombre producto</th>
            <th>Referencia</th>
            <th>Precio</th>
            <th>Peso</th>
            <th>Categoria</th>
            <th>Cantidad disponible</th>
            <th>Fecha creación</th>
            <th colspan="3"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre_producto }}</td>
                <td>{{ $producto->referencia }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->peso }}</td>
                <td>{{ $producto->categoria }}</td>
                <td>{{ $producto->stock }}</td>
                <td>{{ $producto->created_at }}</td>
                <td>
                    <a href="{{ route('productos.sell', [$producto->id, 0]) }}" class="btn btn-success">Vender</a>
                </td>
                <td>
                    <a href="{{ route('productos.edit', [$producto->id, 0]) }}" class="btn btn-warning">Editar</a>
                </td>
                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                    <td>
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </form>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="row" style="margin-top: 40px;">
    @isset($mayorStock)
        <div class="col-md-6">
            <span class="alert alert-info">Mayor stock: {{ $mayorStock->nombre_producto }} - Cantidad:
                {{ $mayorStock->stock }}</span>
        </div>
    @endisset
    @isset($mayorVendido[0])
        <div class="col-md-6">
            <span class="alert alert-info">Mayor vendido: {{ $mayorVendido[0]->nombre_producto }} - Veces vendidas:
                {{ $mayorVendido[0]->veces }} - Cantidad: {{ $mayorVendido[0]->cantidad }}</span>
        </div>
    @endisset
</div>
@include('layount.footer')
