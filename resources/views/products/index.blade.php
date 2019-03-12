@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listado de Productos
                        @if(Auth::user()->name == 'root')
                            <a href="{{ route('products.create') }}" class="btn btn-success btn-sm float-right">Nuevo producto</a>
                        @endif
                    </div>
                    <div class="card-body">
                            <br>
                        <input id="filtrar" type="text" class="form-control{{ $errors->has('buscar') ? ' is-invalid' : '' }}" name="filtrar" value="{{ old('buscar') }}" autofocus placeholder="Buscar">
                            <br>

                        <table class="table table-hover table-sm" style="margin-top: 3px;">
                            <thead>
                                <th style="width: 100px;">Imagen</th>
                                <th style="width: 250px;">Nombre</th>
                                <th style="width: 500px;">Descripcion</th>
                                <th style="width: 90px;">Precio</th>
                            </thead>
                            <tbody class="buscar">
                                @foreach($products as $product)
                                    <tr>
                                        <td><img src="{{ asset('imagenes/')}}/{{ $product->Imagen }}" style="width: 80%" alt="Error"></td>
                                        <td>{{ $product->Nombre }}</td>
                                        <td>
                                            {{ $product->Descripcion }}
                                        </td>
                                        <td>
                                           $ {{$product->Precio}}
                                        </td>
                                        <td>
                                            @if(Auth::user()->name == 'root')
                                                <a id="editar" onclick="editar({{ $product->id }})"><img src="{{ asset('images/editar.png') }}" alt=""></a>
                                                <a href="{{ route('products.destroy', $product->id) }}"><img src="{{ asset('images/basura.png') }}" alt=""></a>
                                            @else
                                                <a href="#"><img src="{{ asset('images/Carro.png') }}" alt=""></a>
                                            @endif
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
    <script>
        $(document).ready(function () {
            (function ($) {
                $('#filtrar').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });

        function editar(id) {
            $.ajax({
                url: '{{ route('product.edit') }}',
                method:'GET',
                data: {'id': id},
                dataType: "json",
                success:function(data){
                    console.log(data);
                    $('#modalEditar').modal('show');
                    $('#Descripcion').text(data.Descripcion);
                    $('#Precio').text(data.Precio);
                    $('#id').val(data.idProducto);
                    $('#TipoMueble').text(data.tipomuebles.Nombre);
                }
            });
        }
    </script>
    @include('products.edit')
@endsection