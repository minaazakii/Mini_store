<div class="shop_container">
    <nav id="nav_container">
        <div class="search_box">
            <form action="{{ route('search') }}" method="GET">
                <input name="search" type="search" placeholder="Search anything" id="search_btn" />
            </form>
            <p>Welcome: {{ auth()->user()->username }}</p>
            <form action="{{ route('logout') }}", method="POST">
                @csrf
                <button class="logout">Logout</button>
            </form>
        </div>
        <div class="shop_logo">
            <span><span id="m">M</span> S</span>
            <form action="{{ route('checkout') }}">
            <button class="checkout_btn" type="submit">Check out</button>
            </form>
        </div>
        <div class="clear"></div>
        <div class="navbar">
            <ul class="nav_list">
                <li><a href="#">Home</a></li>
                <li><a href="{{ route('shop') }}">Products</a></li>
                @if(auth()->user()->role_id == 1)
                    <li><a href="{{ route('product.index') }}">Add Products</a></li>
                @endif
                <li><a href="#">About us</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <div class="clear"></div>
        </div>
    </nav>
    </div>
