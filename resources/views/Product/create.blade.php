@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Crear Producto</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header py-2 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold"> {{ __('Crear Producto') }} </h6>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-primary">
                        {{ __('Regresar') }}
                    </a>
                </div>

                <div class="card-body">

                    <form class="needs-validation" action="{{ route('productos.store') }}" method="POST" novalidate>
                        @csrf
                        <div class="row">
                            <!-- product name -->
                            <div class="col-md-6 mb-3">
                                <label for="name" class="text-md-end">{{ __('Nombre:') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <div class="invalid-feedback">
                                    El nombre del producto es requerido
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- product reference -->
                            <div class="col-md-6 mb-3">
                                <label for="reference" class="text-md-end">{{ __('Referencia:') }}</label>
                                <input id="reference" type="text"
                                    class="form-control @error('reference') is-invalid @enderror" name="reference"
                                    value="{{ old('reference') }}" required autocomplete="reference" autofocus>
                                <div class="invalid-feedback">
                                    La referencia del producto es requerida
                                </div>
                                @error('reference')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- product price -->
                            <div class="col-md-6 mb-3">
                                <label for="price" class="text-md-end">{{ __('Precio:') }}</label>
                                <input id="price" type="number"
                                    class="form-control @error('price') is-invalid @enderror" name="price"
                                    value="{{ old('price') }}" required autocomplete="price" autofocus>
                                <div class="invalid-feedback">
                                    El precio del producto es requerido
                                </div>
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- product weight -->
                            <div class="col-md-6 mb-3">
                                <label for="weight" class="text-md-end">{{ __('Peso:') }}</label>
                                <input id="weight" type="number"
                                    class="form-control @error('weight') is-invalid @enderror" name="weight"
                                    value="{{ old('weight') }}" required autocomplete="weight" autofocus>
                                <div class="invalid-feedback">
                                    El peso del producto es requerido
                                </div>
                                @error('weight')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- product category -->
                            <div class="col-md-6 mb-3">
                                <label for="category" class="text-md-end">{{ __('Categoría:') }}</label>
                                <input id="category" type="text"
                                    class="form-control @error('category') is-invalid @enderror" name="category"
                                    value="{{ old('category') }}" required autocomplete="weight" autofocus>
                                <div class="invalid-feedback">
                                    La categoría del producto es requerida
                                </div>
                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- product stock -->
                            <div class="col-md-6 mb-3">
                                <label for="stock" class="text-md-end">{{ __('Stock:') }}</label>
                                <input id="stock" type="number"
                                    class="form-control @error('stock') is-invalid @enderror" name="stock"
                                    value="{{ old('stock') }}" required autocomplete="weight" autofocus>
                                <div class="invalid-feedback">
                                    El stock del producto es requerido
                                </div>
                                @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <hr>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Guardar producto') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection