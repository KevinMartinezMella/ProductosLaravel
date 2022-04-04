@extends('layout.header-footer')

@section('contenido')

        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <b>Editar Producto</b>
                        </div>
                        <div class="card-body">
                            @foreach($producto as $p)
                            <form action="{{ route('productos.update', $p->id_producto) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label>Nombre Producto</label>
                                    <input value="{{ $p->descripcion }}" class="form-control" name="editar_nombre" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Precio Producto</label>
                                    <input value="{{ $p->precio }}" class="form-control" name="editar_precio" type="number">
                                </div>
                                <button class="btn btn-primary" type="">Guardar Cambios</button>
                                <a class="btn btn-danger" href="{{ route('productos') }}">Cancelar</a>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection