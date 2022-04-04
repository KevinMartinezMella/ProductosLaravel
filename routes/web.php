<?php

use Illuminate\Http\Request;

use App\Models\Producto;

Route::get('/', function(){
    $productos = Producto::orderBy('created_at', 'desc')->get();
    return view('productos.productos', compact('productos'));
})->name('productos');


Route::get('productos/crearProducto', function(){
    return view('productos.crearProducto');
})->name('productos.crear');


Route::post('productos', function(Request $request){
    $nuevoProducto = new Producto;
    $nuevoProducto-> descripcion = $request-> input('descripcion_producto');
    $nuevoProducto-> precio = $request-> input('precio_producto');
    $nuevoProducto-> save();

    return redirect() -> route('productos') -> with('info', 'Producto Agregado Exitosamente');

})->name('productos.guardar');


Route::get('productos/editarProducto/{idProducto}', function($idProducto){
    
    $producto = Producto::where('id_producto', $idProducto)->get();

    return view('productos.editarProducto', compact('producto'));

})->name('productos.editar');


Route::put('/productos/{idProducto}', function(Request $request, $idProducto){

    $editarProducto = Producto::where('id_producto', $idProducto)->update(['descripcion' => $request-> input('editar_nombre'), 'precio' => $request-> input('editar_precio')]);

    return redirect() -> route('productos') -> with('info', 'Producto Editado Exitosamente');

})->name('productos.update');


Route::delete('productos/eliminarProducto/{idProducto}', function($idProducto){
    $producto = Producto::where('id_producto', $idProducto)->delete();

    return redirect() -> route('productos') -> with('info', 'Producto Eliminado');

})->name('productos.eliminar');
