@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">{{ __('Product') }}</a></li>
    <li class="breadcrumb-item active">{{ Str::limit($product->slug, 25, '...') }}</li>

@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm mb-2">{{ __('Add Product') }}</a> --}}
        </div>
    </div>
    <x-card>
        <dl class="row">
            <div class="col-md-4">
                <img src="{{ asset($product->getFirstMediaUrl('product', 'thumb')) }}" class="img-fluid" alt="">
            </div>
            <div class="col-md-8">
                <dt class="col-sm-3">{{ __('Product Name') }}</dt>
                <dd class="col-sm-9">{{ $product->name }}</dd>
                <dt class="col-sm-5">{{ __('Product Description') }}</dt>
                <dd class="col-sm-7">{{ $product->description }}</dd>
                <dt class="col-sm-3">{{ __('Product Stock') }}</dt>
                <dd class="col-sm-9">{{ $product->quantity }}</dd>

            </div>

        </dl>
    </x-card>
@endsection
