<div class="top" style="position: fixed;top: 0; opacity: 0.5;">
    <div class="brand">
        <img src="{{ asset('img/logo.png') }}" />
    </div>

    <div class="menu" id="menu">
        <ul>
            <li><a href="{{ route('app.home') }}">Home</a></li>
            <li><a href="{{ route('app.orders.index') }}">Orders</a></li>
            <li><a href="{{ route('app.clients.index') }}">Clients</a></li>
            <li><a href="{{ route('app.products.index') }}">Products</a></li>
            <li><a href="{{ route('app.providers.index') }}">Providers</a></li>
            <li><a href="{{ route('app.logout') }}">Logout</a></li>
        </ul>
    </div>
</div>

