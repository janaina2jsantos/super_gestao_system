<style type="text/css">
    .alert {
        padding: 2px;
        margin-bottom: -5px;
    }
</style>

{{ $slot }}
<form action="{{ route('site.login') }}" method="POST">
    @csrf
    <input type="text" name="email" value="{{ old('email') }}" placeholder="User" class="{{ $border }}" autocomplete="off" />
    @if($errors->has('email'))
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
    @elseif($errors->has('senha'))
        <div class="alert alert-danger">
            {{ $errors->first('senha') }}
        </div>
    @endif
    <br />
    <input type="password" name="password" value="{{ old('password') }}" placeholder="Password" class="{{ $border }}" />
    <br />
    <button type="submit" class="{{ $border }}">LOGIN</button>
</form>


