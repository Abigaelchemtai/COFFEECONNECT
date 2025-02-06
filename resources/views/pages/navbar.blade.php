<nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">CoffeeConnect</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
           <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Farmers</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Buyers</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Lenders</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Shop</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Cart</a></li>

        <!-- Dropdown for Account -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @guest
                    <!-- If the user is not logged in, show Login and Sign Up links -->
                    <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                    <a class="dropdown-item" href="{{ route('signup') }}">Sign Up</a>
                @else
                    <!-- If the user is logged in, show dashboard and Logout -->
                    @if(Auth::user()->Role === 'farmer')
                        <a class="dropdown-item" href="{{ route('farmer.dashboard') }}">Farmer Dashboard</a>
                    @elseif(Auth::user()->Role === 'investor')
                        <a class="dropdown-item" href="{{ route('investor.dashboard') }}">Investor Dashboard</a>
                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                @endguest
            </div>
        </li>
    </ul>

    <!-- Add a form to handle logout -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    </nav>
