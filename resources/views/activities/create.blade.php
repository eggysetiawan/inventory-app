@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('activities.index') }}">{{ __('Activities') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Create Activity') }}</li>

@endsection
@section('content')
    <x-alert />
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('activities.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">Inventory App </div>
                    @include('activities.partials._form-control')
                </div>
            </form>
        </div>
    </div>
@endsection
