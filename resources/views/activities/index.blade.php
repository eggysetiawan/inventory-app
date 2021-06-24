@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active">{{ __('Activities') }}</li>

@endsection
@section('content')
    <livewire:activities.index />
@endsection
