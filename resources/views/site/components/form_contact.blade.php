<style type="text/css">
    .alert {
        padding: 2px;
        margin-bottom: -5px;
    }
</style>

{{ $slot }}
<form action="{{ route('site.contact.store') }}" method="POST">
    @csrf
    <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" class="{{ $border }}" autocomplete="none" />
    @if($errors->has('name'))
        <div class="alert alert-danger">
            {{ $errors->first('name') }}
        </div>
    @endif
    <br />
    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone" class="{{ $border }}" />
    @if($errors->has('phone'))
        <div class="alert alert-danger">
            {{ $errors->first('phone') }}
        </div>
    @endif
    <br />
    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email" class="{{ $border }}" autocomplete="none" />
    @if($errors->has('email'))
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
    @endif
    <br />
    <select class="{{ $border }}" name="contact_reason_id">
        <option value="">What is the reason for the contact?</option>
        @foreach($contact_reasons as $key => $reason)
            <option value="{{ $reason->id }}" {{ old('contact_reason_id') == $reason->id ? 'selected' : '' }}>{{ $reason->reason }}</option>
        @endforeach
    </select>
    @if($errors->has('contact_reason_id'))
        <div class="alert alert-danger">
            {{ $errors->first('contact_reason_id') }}
        </div>
    @endif
    <br />
    <textarea class="{{ $border }}" name="message">{{ (old('message') != '') ? old('message') : '' }}
    </textarea>
    @if($errors->has('message'))
        <div class="alert alert-danger">
            {{ $errors->first('message') }}
        </div>
    @endif
    <br />
    <button type="submit" class="{{ $border }}">SEND</button>
</form>

