<?php

namespace App\Http\Controllers;

use App\Producto;
use App\TipoMueble;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class ProductosController extends Controller
{
    public function destroy($id) {
        Producto::destroy($id);

        return redirect()->route('products.index')->with('info', 'Se ha borrado el producto');
    }

    public function update() {
        $producto = Producto::findOrFail(request()->id);
        $producto->update([
            'description' => request()->descripcion,
            'price' => request()->price
        ]);

        return redirect()->route('products.index')->with('info', 'Se ha editado el producto');
    }

    public function edit() {
        return Producto::where('id', request()->id)
            ->select('id as idProducto', 'Precio', 'Descripcion', 'Imagen', 'Stock', 'Nombre', 'TipoMueble')->with('tipomuebles')->first();
    }

    public function store(Request $request){
        //Extension de la imagen
        $extension="png";
        //se agrega el codigo del usuario mas la extension
        $file_name = str_random(10) . '.' . $extension;
        //Tamaño maximo de la imagen
        $width = 200;
        $height = 200;
        //Creamos el objeto de la imagen con la imagen ingresada por el usuario
        $img = Image::make($request->file('Imagen'));
        //Operacion para borra el ancho o alto de la imagen para mantener la proporcion
        $img->height() > $img->width() ? $width=null : $height=null;
        //Redimensionamos la imagen con un tamaño menos pero manteniendo la proporcion
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        //Guardamos la nueva imagen en la carpeta imagenes
        $img->save('imagenes/' . $file_name);

        Producto::create([
            'Nombre' => request()->Nombre,
            'Descripcion' => request()->Descripcion,
            'Precio' => request()->Precio,
            'Stock' => request()->Stock,
            'Imagen' => $file_name,
            'TipoMueble' => $request->get('TipoMueble')
        ]);

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente');
    }

    public function index(){
        $products = Producto::all();
        $Tipos = TipoMueble::get();
        return view('products.index', ['products'=> $products, 'Tipos' => $Tipos]);
    }

    public function informacion(){
        return view('paginas/informacion');
    }

    public function create(){
        $Tipos = TipoMueble::get();
        return view('products.create', ['Tipos' => $Tipos]);
    }
}

