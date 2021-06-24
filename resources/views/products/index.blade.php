@extends('layouts.app')


@section('breadcrumb')
    <li class="breadcrumb-item active">{{ __('Product') }}</li>

@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm mb-2">{{ __('Add Product') }}</a>
        </div>
        <x-card>
            <table class="table table-stripped table-hover table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Product Name') }}</th>
                        <th>{{ __('Product Description') }}</th>
                        <th>{{ __('Product Stock') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ Str::limit($product->description, 100, '...') }} <a
                                    href="{{ route('products.show', $product->slug) }}">{{ __('Readmore') }}</a></td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                <x-dropdown>
                                    <a href="{{ route('products.show', $product->slug) }}" class="dropdown-item"
                                        title="{{ __('Product detail') }}"><i class="fas fa-eye nav-icon"></i>
                                        {{ __('Details') }}
                                    </a>

                                    <a href="{{ route('products.edit', $product->slug) }}" class="dropdown-item"
                                        title="{{ __('Edit this Product') }}"><i class="fas fa-edit nav-icon"></i>
                                        {{ __('Edit') }}
                                    </a>

                                    <form action="{{ route('products.destroy', $product->slug) }}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button type="submit"
                                            onclick="return confirm({{ __('Are you sure you want to delete this resource?') }})"
                                            class="dropdown-item" title="{{ __('Delete product from table') }}"><i
                                                class="far fa-trash-alt nav-icon"></i>
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </x-dropdown>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">{{ __('Data is empty.') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </x-card>
    @endsection
