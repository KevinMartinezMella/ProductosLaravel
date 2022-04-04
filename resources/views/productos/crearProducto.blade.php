@extends('layout.header-footer')

@section('contenido')

        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <b>Crear Producto</b>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('productos.guardar') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <input class="form-control" type="text" name="descripcion_producto">
                                </div>
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input class="form-control" type="number" name="precio_producto">
                                </div>
                                <button class="btn btn-primary" type="submit">Crear</button>
                                <a class="btn btn-danger" href="{{ route('productos') }}">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection