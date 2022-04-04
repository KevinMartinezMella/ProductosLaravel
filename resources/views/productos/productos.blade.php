@extends('layout.header-footer')

@section('contenido')

        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <b>Listado de Productos</b>
                            <a class="btn btn-info float-right" href="{{ route('productos.crear') }}">Agregar</a>
                        </div>
                        <div class="card-body">
                            @if(session('info'))
                                <div class="alert alert-success">
                                    {{ session('info') }}
                                </div>
                            @endif
                            <table class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre Producto</th>
                                        <th scope="col">Precio Producto</th>
                                        <th scope="col">Fecha Creación</th>
                                        <th scope="col">Fecha Edición</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productos as $producto)
                                    <tr>       
                                        <td>{{ $producto->descripcion }}</td>
                                        <td>{{ $producto->precio }}</td>
                                        <td>{{ $producto->created_at }}</td>
                                        <td>{{ $producto->updated_at }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('productos.editar', $producto->id_producto) }}"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-danger" href="javascript: document.getElementById('eliminar-{{ $producto->id_producto }}').submit()"><i class="fas fa-trash"></i></a>
                                            <form id="eliminar-{{ $producto->id_producto }}" action="{{ route('productos.eliminar', $producto->id_producto) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
