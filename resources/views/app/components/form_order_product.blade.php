<style type="text/css">
    .alert {
        padding: 2px;
        margin-bottom: -5px;
    }
</style>

<form action="{{ route('app.order-product.store', $order->id) }}" method="POST">
    @csrf    
    <select name="product_id" class="{{ $border }}">
        <option>Select a Product</option>
        @foreach($products as $product)
            <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
        @endforeach
    </select>
    @if($errors->has('product_id'))
        <div class="alert alert-danger">
            {{ $errors->first('product_id') }}
        </div>
    @endif
    <input type="number" name="quantity" value="{{ old('quantity') ? old('quantity') : '' }}" placeholder="Quantity" class="{{ $border }}" />
    @if($errors->has('quantity'))
        <div class="alert alert-danger">
            {{ $errors->first('quantity') }}
        </div>
    @endif
    <button type="submit" class="{{ $border }}">SAVE</button>
</form>

