<div class="card-body">
    <div class="form-group">
        <label for="name">{{ __('Product Name') }}</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name') ?? $product->name }}" placeholder="{{ __('ex') }} : argento, drabby, iroko">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">{{ __('Product Description') }}</label>
        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
            placeholder="{{ __('Something cool about this product') }}..">{{ old('description') ?? $product->description }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="quantity">{{ __('Product Stock') }}</label>
        <input type="number" name="quantity" id="quantity" min="0"
            class="form-control @error('quantity') is-invalid @enderror"
            value="{{ old('quantity') ?? $product->quantity }}">
        @error('quantity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>

<div class="card-footer">
    <button type="submit" class="btn btn-success">{{ $update ?? __('Create') }}</button>
</div>
