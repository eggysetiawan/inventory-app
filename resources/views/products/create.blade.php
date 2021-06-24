@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">{{ __('Product') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Add Product') }}</li>

@endsection
@section('content')
    <form action="{{ route('products.store') }}" method="post">
        @csrf

        <div class="card">
            <div class="card-header">Inventory App </div>
            @include('products.partials._form-control')
        </div>
    </form>

@endsection
