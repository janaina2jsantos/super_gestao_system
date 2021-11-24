@component('mail::message')
# Site Contact 

User: {{ $name }}<br />
Phone: {{ $phone }}<br />
Email: {{ $email }}<br />
Contact Reason: {{ $reason }}<br />
Message: {{ $message }}<br />

Thanks,<br />
{{ config('app.name') }}
@endcomponent
