<style type="text/css">
    .alert {
        padding: 2px;
        margin-bottom: -5px;
    }
</style>

<form action="{{ (isset($product) ? route('app.products.update', $product->id) : route('app.products.store')) }}" method="POST">
    @csrf
    @if(isset($product))
        {{ method_field('PUT') }}
    @endif
    <input type="text" name="name" placeholder="Name" class="{{ $border }}" autocomplete="off" value="{{ $product->name ?? old('name') }}" />
    @if($errors->has('name'))
        <div class="alert alert-danger">
            {{ $errors->first('name') }}
        </div>
    @endif
    <input type="text" name="weight" placeholder="Weight" class="{{ $border }}" value="{{ $product->weight ?? old('weight') }}" />
    @if($errors->has('weight'))
        <div class="alert alert-danger">
            {{ $errors->first('weight') }}
        </div>
    @endif
    <select name="unit_id">
        <option selected="true" disabled="">Select the unit</option>
        @foreach($units as $un)
            <option value="{{ $un->id }}" {{ ($product->unit_id ?? old('unit_id')) == $un->id ? 'selected' : '' }}>{{ $un->unit }}</option>
        @endforeach
    </select>
    @if($errors->has('unit_id'))
        <div class="alert alert-danger">
            {{ $errors->first('unit_id') }}
        </div>
    @endif
    <select name="provider_id">
        <option selected="true" disabled="">Select a provider</option>
        @foreach($providers as $provider)
            <option value="{{ $provider->id }}" {{ ($product->provider_id ?? old('provider_id')) == $provider->id ? 'selected' : '' }}>{{ $provider->name }}</option>
        @endforeach
    </select>
    @if($errors->has('provider_id'))
        <div class="alert alert-danger">
            {{ $errors->first('provider_id') }}
        </div>
    @endif
    <input type="text" name="description" placeholder="Description" class="{{ $border }}" autocomplete="off" value="{{ $product->description ?? old('description') }}" />
    @if($errors->has('description'))
        <div class="alert alert-danger">
            {{ $errors->first('description') }}
        </div>
    @endif
    <button type="submit" class="{{ $border }}">SAVE</button>
</form>

