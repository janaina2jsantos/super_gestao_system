<style type="text/css">
    .alert {
        padding: 2px;
        margin-bottom: -5px;
    }
    .input-disabled {
        background: #f7f7f7;
    }
</style>

<form action="{{ (isset($product) ? route('app.products-details.update', $product->id) : route('app.products-details.store')) }}" method="POST">

    @csrf
    @if(isset($product))
        {{ method_field('PUT') }}
    @endif

    <?php 
        // product selected to make edition
        $sprod = isset($product) ? $product : null;
        $sprod_length = isset($product->productDetail->length) ? $product->productDetail->length : '';
        $sprod_width  = isset($product->productDetail->width) ? $product->productDetail->width : '';
        $sprod_height = isset($product->productDetail->height) ? $product->productDetail->height : '';
    ?>

    <select name="product_id" disabled="true" class="input-disabled">
        <option>Select the Product</option>
        @foreach($products as $product)
            @if($sprod != '')
                <option value="{{ $sprod->id }}" selected="selected">{{ $sprod->name }}</option>
            @endif            
        @endforeach
    </select>
    @if($errors->has('product_id'))
        <div class="alert alert-danger">
            {{ $errors->first('product_id') }}
        </div>
    @endif
    <select name="unit_id">
        <option>Select the Unit</option>
        @foreach($units as $un)
            <option value="{{ $un->id }}" {{ ($product->unit_id ?? old('unit_id')) == $un->id ? 'selected' : '' }}>{{ $un->unit }}</option>
        @endforeach
    </select>
    @if($errors->has('unit_id'))
        <div class="alert alert-danger">
            {{ $errors->first('unit_id') }}
        </div>
    @endif
    <input type="number" name="length" placeholder="length" class="{{ $border }}" value="{{ $sprod_length ?? old('length') }}" />
    @if($errors->has('length'))
        <div class="alert alert-danger">
            {{ $errors->first('length') }}
        </div>
    @endif
    <input type="number" name="width" placeholder="width" class="{{ $border }}" value="{{ $sprod_width ?? old('width') }}" />
    @if($errors->has('widht'))
        <div class="alert alert-danger">
            {{ $errors->first('widht') }}
        </div>
    @endif
    <input type="number" name="height" placeholder="height" class="{{ $border }}" value="{{ $sprod_height ?? old('height') }}" />
    @if($errors->has('height'))
        <div class="alert alert-danger">
            {{ $errors->first('height') }}
        </div>
    @endif
    <button type="submit" class="{{ $border }}">SAVE</button>
</form>

