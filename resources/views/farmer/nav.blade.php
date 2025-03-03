<nav class="navbar navbar-expand-lg" style="background-color: #4B2E2E;">
    <div class="container">
        <a class="navbar-brand text-light fw-bold" href="#">Farmers Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-light" href="{{ route('home')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="{{ route('farmer.coffeeListings') }}">Coffeelistings</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="#">Communities</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="#">Profile</a></li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .nav-link {
        color: #F5E6CC !important; /* Light beige text */
        font-weight: 500;
        transition: color 0.3s ease-in-out;
    }

    .nav-link:hover {
        color: #E0C097 !important; /* Lighter beige on hover */
    }

    .navbar-toggler-icon {
        filter: invert(1); /* White color for the toggler icon */
    }
</style>
