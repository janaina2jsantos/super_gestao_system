<div class="top" style="position: fixed;top: 0; opacity: 0.4;">
    <div class="brand">
        <img src="{{ asset('img/logo.png') }}" />
    </div>

    <?php
        $company = "Super Gestão";
    ?>

    <div class="menu" id="menu">
        <ul>
            <li><a href="{{ route('site.index') }}">Home</a></li>
            <li><a href="{{ route('site.about', $company) }}">About</a></li>
            <li><a href="{{ route('site.contact.create') }}">Contact</a></li>
            <li><a href="{{ route('site.login.index') }}">Login</a></li>
        </ul>
    </div>
</div>

