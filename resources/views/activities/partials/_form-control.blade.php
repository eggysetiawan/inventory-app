<div class="card-body">

    <div class="form-group">
        <label for="product">{{ __('Product Name') }}</label>
        <select name="product" id="product" class="form-control select2">

            @if ($activity->product_id)

                <option selected value="{{ $activity->product_id }}">{{ $activity->product->name }}</option>
                @foreach ($products as $product)
                    @if ($activity->product_id != $product->id)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endif
                @endforeach

            @else

                <option selected disabled>{{ __('Choose a Product') }}</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach

            @endif

        </select>
    </div>

    <div class="form-group">
        <label for="status">{{ __('Choose Activity') }}</label>
        <select name="status" id="status" class="form-control">

            @if ($activity->status)
                <option value="{{ $activity->status }}" selected>{{ $activity->status }}</option>
                <option value="in">in</option>
                <option value="out">out</option>
            @else
                <option value="in">in</option>
                <option value="out">out</option>
            @endif

        </select>
    </div>

    <div class="form-group">
        <label for="quantity">{{ __('Quantity') }}</label>
        <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror"
            value="{{ old('quantity') ?? $activity->quantity }}" min="1">
    </div>

</div>

<div class="card-footer">
    <button type="submit" class="btn btn-success">{{ $update ?? __('Create') }}</button>
</div>
