@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header py-2 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold"> {{ __('Productos') }} </h6>
                    <a href="{{ route('productos.create') }}" class="btn btn-sm btn-success">
                        {{ __('Crear producto') }}
                    </a>
                </div>

                <div class="card-body">


                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @elseif(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="table-responsive p-2">
                        <table class="table table-hover" id="dataTableLocations">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('Nombre del producto') }}</th>
                                    <th scope="col">{{ __('Referencia')}}</th>
                                    <th scope="col">{{ __('Precio') }}</th>
                                    <th scope="col">{{ __('Peso') }}</th>
                                    <th scope="col">{{ __('Categoria') }}</th>
                                    <th scope="col">{{ __('Stock') }}</th>
                                    <th scope="col">{{ __('Fecha de creación') }}</th>
                                    <th scope="col">{{ __('Acciones') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( isset($products) && sizeof($products) > 0 )
                                @foreach( $products as $key => $product )

                                <tr>
                                    <th scope="row"> {{ $key + 1 }} </th>
                                    <td> {{ $product->name }}</td>
                                    <td> {{ $product->reference }}</td>
                                    <td> {{ $product->price }}</td>
                                    <td> {{ $product->weight }}</td>
                                    <td> {{ $product->category }}</td>
                                    <td> {{ $product->stock }}</td>
                                    <td> {{ $product->created_at->format('d M Y') }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-4">
                                                <a href="{{ route('productos.edit', $product->id) }}"
                                                    class="btn btn-primary btn-sm" >
                                                    <i class="bi bi-pencil-fill"></i>
                                                    {{ __('Editar') }}
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modalSellProduct"
                                                    data-bs-id="{{ $product->id }}" 
                                                    data-bs-name="{{ $product->name }}"
                                                    data-bs-stock="{{ $product->stock }}"
                                                    class="btn btn-secondary btn-sm">
                                                    <i class="bi bi-send"></i>
                                                    {{ __('Vender') }}
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <form action="{{ route('productos.destroy', $product->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn btn-danger btn-sm" type="submit"
                                                        onclick="return confirm('¿Desea eliminar...?')">
                                                        <i class="bi bi-trash-fill"></i>
                                                        {{ __('Eliminar') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @endif()
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal sell product -->
<div class="modal fade" id="modalSellProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @include('Product.modals.sell-product-modal')
</div>
@endsection

@section('scripts')
<script src="js/modals/sellProduct.js"></script>
@endsection