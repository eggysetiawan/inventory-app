@extends('layouts.app')

@section('breadcrumb')
    {{-- <li class="breadcrumb-item active">{{ __('Product') }}</li> --}}

@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm mb-2">{{ __('Add Product') }}</a> --}}
        </div>
    </div>
    <x-card>


    </x-card>
@endsection
