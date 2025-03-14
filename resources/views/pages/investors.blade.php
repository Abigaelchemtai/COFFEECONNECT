<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investors | Coffee Connect</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .farmer-card {
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .listing-card {
            background-color: #d1ecf1;
            border-left: 5px solid #0c5460;
        }
        .btn-request {
            background-color: #007bff;
            color: white;
        }
        .btn-request:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('investors.index') }}">Coffee Connect - Investors</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Find Farmers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('requests.index') }}">Requests</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning text-dark" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5 pt-4">
    <h2 class="mb-3 text-success">Welcome, {{ Auth::user()->UserName }}!</h2>


        <h2 class="text-center">Welcome to the Investors Page</h2>
        <p class="text-center">Find farmers, view their profiles, and invest in coffee products.</p>

    <!-- Filter Section -->
    <div class="card p-3 mb-4">
        <h5>Filter Farmers</h5>
        <form method="GET" action="{{ route('filter.farmers') }}">
            <div class="row">
                <div class="col-md-4">
                    <label for="coffeetype" class="form-label">Coffee Type</label>
                    <select class="form-control" id="coffeetype" name="coffeetype">
                        <option value="">All</option>
                        <option value="arabica" {{ request('coffeetype') == 'arabica' ? 'selected' : '' }}>Arabica</option>
                        <option value="robusta" {{ request('coffeetype') == 'robusta' ? 'selected' : '' }}>Robusta</option>
                        <option value="speciality" {{ request('coffeetype') == 'speciality' ? 'selected' : '' }}>Speciality</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="coffeegrade" class="form-label">Coffee Grade</label>
                    <select class="form-control" id="coffeegrade" name="coffeegrade">
                        <option value="">All</option>
                        <option value="AA" {{ request('coffeegrade') == 'AA' ? 'selected' : '' }}>AA</option>
                        <option value="AB" {{ request('coffeegrade') == 'AB' ? 'selected' : '' }}>AB</option>
                        <option value="PB" {{ request('coffeegrade') == 'PB' ? 'selected' : '' }}>PB</option>
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Farmers Section -->
    <div class="row">
        @if($farmers->isEmpty())
            <div class="col-12">
                <div class="alert alert-warning text-center">No farmers found matching your criteria.</div>
            </div>
        @else
            @foreach ($farmers as $farmer)
                <div class="col-md-6 mb-4">
                    <div class="card farmer-card p-4">
                        <h3 class="text-primary">{{ $farmer->name }}</h3>
                        <p class="text-muted">Farmer ID: {{ $farmer->id }}</p>
                        <h4 class="mt-3">Coffee Listings</h4>
                        <div class="row">
                            @foreach ($farmer->coffeeListings as $listing)
                                <div class="col-md-6">
                                    <div class="card listing-card p-3 mb-3">
                                        <p><strong>Type:</strong> {{ $listing->coffee_type }}</p>
                                        <p><strong>Grade:</strong> {{ $listing->coffee_grade }}</p>
                                        <p><strong>Quantity:</strong> {{ $listing->quantity }} kg</p>
                                        <p><strong>Price:</strong> ${{ $listing->price_per_kg }} per kg</p>
                                        <form action="{{ route('request.product') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                                            <button type="submit" class="btn btn-request w-100">
                                                Request Product
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>