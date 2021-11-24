<style type="text/css">
    .alert {
        padding: 2px;
        margin-bottom: -5px;
    }
</style>

<form action="{{ (isset($client) ? route('app.clients.update', $client->id) : route('app.clients.store')) }}" method="POST">
    @csrf
    @if(isset($client))
        {{ method_field('PUT') }}
    @endif
    <input type="text" name="name" placeholder="Name" class="{{ $border }}" autocomplete="off" value="{{ $client->name ?? old('name') }}" />
    @if($errors->has('name'))
        <div class="alert alert-danger">
            {{ $errors->first('name') }}
        </div>
    @endif
    <button type="submit" class="{{ $border }}">SAVE</button>
</form>

