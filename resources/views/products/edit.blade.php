@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">{{ __('Product') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Edit Product') }}</li>

@endsection
@section('content')
    <x-alert />

    <form action="{{ route('products.update', $product->slug) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="card">
            <div class="card-header">Inventory App </div>
            @include('products.partials._form-control', [
            'update' => __('Update'),
            ])
        </div>
    </form>

@endsection
