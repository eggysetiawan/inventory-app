@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('activities.index') }}">{{ __('Activities') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Edit Activities') }}</li>

@endsection
@section('content')
    <x-alert />
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('activities.update', $activity->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card">
                    <div class="card-header">Inventory App </div>
                    @include('activities.partials._form-control',[
                    'update' => __('Update'),
                    ])
                </div>
            </form>
        </div>
    </div>
@endsection
