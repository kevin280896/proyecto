@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Nuevo producto') }}</div>

                    <div class="card-body">
                        <h6 style="color: #4c110f">- Los campos con * son obligatorios</h6>
                        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="Nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="Nombre" type="text" class="form-control{{ $errors->has('Nombre') ? ' is-invalid' : '' }}" name="Nombre" value="{{ old('Nombre') }}" required autofocus>

                                    @if ($errors->has('Nombre'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

                                <div class="col-md-6">
                                    <input id="Descripcion" type="text" class="form-control{{ $errors->has('Descripcion') ? ' is-invalid' : '' }}" name="Descripcion" value="{{ old('Descripcion') }}" required autofocus>

                                    @if ($errors->has('Descripcion'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Descripcion') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Precio" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

                                <div class="col-md-6">
                                    <input id="Precio" type="number" class="form-control{{ $errors->has('Precio') ? ' is-invalid' : '' }}" name="Precio" value="{{ old('Precio') }}" required autofocus>

                                    @if ($errors->has('Precio'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Precio') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Stock" class="col-md-4 col-form-label text-md-right">{{ __('Stock') }}</label>

                                <div class="col-md-6">
                                    <input id="Stock" type="number" class="form-control{{ $errors->has('Stock') ? ' is-invalid' : '' }}" name="Stock" value="{{ old('Stock') }}" required>

                                    @if ($errors->has('Stock'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Stock') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="TipoMueble" class="col-md-4 col-form-label text-md-right">{{ __('TipoMueble') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control{{ $errors->has('TipoMueble') ? ' is-invalid' : '' }}" id="TipoMueble" name="TipoMueble" required>
                                        @foreach ($Tipos as $tmueble)
                                            <option value="{{ $tmueble->id }}">{{ $tmueble->Nombre }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('TipoMueble'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('TipoMueble') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Imagen" class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>

                                <div class="col-md-6">
                                    <input style="border: none" id="Imagen" type="file" class="form-control{{ $errors->has('Imagen') ? ' is-invalid' : '' }}" name="Imagen" value="{{ old('Imagen') }}" required autofocus>

                                    @if ($errors->has('Imagen'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Imagen') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Guardar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
