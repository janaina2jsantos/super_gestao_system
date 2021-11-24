<style type="text/css">
    .alert {
        padding: 2px;
        margin-bottom: -5px;
    }
</style>

<form action="{{ (isset($order) ? route('app.orders.update', $order->id) : route('app.orders.store')) }}" method="POST">
    @csrf
    @if(isset($order))
        {{ method_field('PUT') }}
    @endif
    <select name="client_id">
        <option selected="true" disabled="">Select a client</option>
        @foreach($clients as $client)
            <option value="{{ $client->id }}" {{ ($order->client_id ?? old('client_id')) == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
        @endforeach
    </select>
    @if($errors->has('client_id'))
        <div class="alert alert-danger">
            {{ $errors->first('client_id') }}
        </div>
    @endif
    <button type="submit" class="{{ $border }}">SAVE</button>
</form>

