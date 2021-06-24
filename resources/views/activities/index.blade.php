@extends('layouts.app')

@section('breadcrumb')
    {{-- <li class="breadcrumb-item active">{{ __('Product') }}</li> --}}

@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('activities.create') }}"
                class="btn btn-primary btn-sm mb-2">{{ __('Add Activities') }}</a>
        </div>
        <x-card>


        </x-card>
    @endsection
