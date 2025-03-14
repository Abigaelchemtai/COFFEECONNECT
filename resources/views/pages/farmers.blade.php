<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Farmers Dashboard</title>
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

        /* The side navigation menu */
.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

/* Sidebar links */
.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}

/* Active/current link */
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

/* Links on mouse-over */
.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

/* Page content. The value of the margin-left property should match the value of the sidebar's width property */
div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

/* On screens that are less than 700px wide, make the sidebar into a topbar */
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

/* On screens that are less than 400px, display the bar vertically, instead of horizontally */
@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}


/* Table Header */
.table-header {
        background-color: #4B2E2E; 
        color: #F5E6CC; 
        text-align: center;
        font-weight: bold;
    }

    /* Alternating Rows */
    tbody tr:nth-child(even) { background-color: #FAE5D3; } /* Light coffee color */
    tbody tr:nth-child(odd) { background-color: #FFF; } /* White */

    /* Hover Effect */
    tbody tr:hover {
        background-color: #E0C097 !important;
        transition: 0.3s ease-in-out;
    }

    /* Table Borders */
    .table {
        border: 2px solid #4B2E2E;
    }

    .table th, .table td {
        border: 1px solid #4B2E2E;
        text-align: center;
        padding: 10px;
    }

    /* Status Badge */
    .status-badge {
        padding: 5px 10px;
        border-radius: 8px;
        font-weight: bold;
    }

    .status-badge.available { background-color: #28a745; color: #fff; }
    .status-badge.sold-out { background-color: #dc3545; color: #fff; }
    .status-badge.pending { background-color: #ffc107; color: #000; }


    .service-card {
        background-color: #FAE5D3; /* Light coffee color */
        border-radius: 15px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    
    img {
        border-radius: 15px;
        height: 800px;
        width: 165px;

    }
    

    .col-md-6 {
    display: flex; /* Ensures the div stretches to fit its container */
    justify-content: center; /* Centers the image */
    align-items: center; /* Centers the image */
    overflow: hidden; /* Prevents overflow if the image is too large */
    }

    .col-md-6 img {
        width: 100%; /* Makes the image take the full width of the div */
        height: 40%; /* Ensures the image takes the full height of the div */
        object-fit: cover; /* Makes sure the image covers the div without stretching */
        border-radius: 10px; /* Keeps the rounded corners */
        box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.2); /* Keeps the shadow effect */
    }

        </style>
</head>
<body>
<!---- navigation----->
<nav class="navbar navbar-expand-lg" style="background-color: #4B2E2E;">
    <div class="container">
        <a class="navbar-brand text-light fw-bold" href="#">Farmers Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-light" href="{{ route('home')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="{{ route('pages.farmers') }}">Coffeelistings</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="#">Communities</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('requests.index') }}">Requests</a>
                </li>

                
            </ul>
        </div>
    </div>
</nav>


<!----Coffee Listings------->

<div class="container mt-4">
    <h2 class="mb-3 text-success">Welcome, {{ Auth::user()->UserName }}!</h2>

    <h2 class="mb-3 text-center text-dark">Your Coffee Listings</h2>
    <a href="{{ route('farmer.create') }}" class="btn btn-primary mb-3">Add Coffee</a>
    
    <div class="table-responsive">
    <!-- <pre>{{ print_r($coffeeListings->toArray(), true) }}</pre> -->
        <table class="table table-bordered">
            <thead>
                <tr class="table-header">
                    <th scope="col">ID</th>
                    <th>Coffee Type</th>
                    <th>Quantity (kg)</th>
                    <th>Price per kg</th>
                    <th>Grade</th>
                    <th>Status</th>
                    <th>Wallet</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($coffeeListings) && $coffeeListings->count() > 0)
                    @foreach($coffeeListings as $coffee)
                        <tr>
                        <td>{{ $coffee->id }}</td>
                            <td>{{ $coffee->coffee_type }}</td> <!-- Updated field -->
                            <td>{{ number_format($coffee->quantity, 2) }} kg</td> <!-- Updated field -->
                            <td>${{ number_format($coffee->price_per_kg, 2) }}</td>
                            <td>{{ $coffee->coffee_grade }}</td>
                            <td>
                                <span class="status-badge {{ strtolower($coffee->status) }}">
                                    {{ ucfirst($coffee->status) }}
                                </span>
                            </td>
                            <td>{{ $coffee->wallet_number }}</td>
                            <td>
                                @if($coffee->status !== 'Sold Out')
                                    <a href="{{ route('farmer.editCoffee', $coffee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center text-danger">No coffee listings found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>



<!---Commmunities-->
<div class="container mt-5">
    <h2 class="text-center mb-5">Our Communities</h2>
    
    <!-- Community 1: Education Hub -->
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="service-card rounded shadow p-4">
                <h1>Education Hub</h1>
                <h3>Learn and Grow</h3>
                <p>Join our Education Hub to gain insights on coffee farming, trading, and the integration of Bitcoin into the coffee industry.</p>
                <a href="#" class="btn btn-primary">Join Now</a>
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('images/share1.avif') }}" alt="Education Hub" class="img-fluid rounded shadow">
        </div>
    </div>
    
    <!-- Community 2: Farmers Networking -->
    <div class="row mb-3">
        <div class="col-md-6 order-md-2">
            <div class="service-card rounded shadow p-4">
                <h1>Farmers Networking</h1>
                <h3>Connect with Fellow Farmers</h3>
                <p>Farmers can share knowledge, best practices, and experiences on coffee production and sustainable farming.</p>
                <a href="#" class="btn btn-primary">Join Community</a>
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('images/share1.avif') }}" alt="Farmers Networking" class="img-fluid rounded shadow">
        </div>
    </div>
    
    <!-- Community 3: Traders and Buyers -->
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="service-card rounded shadow p-4">
                <h1>Traders and Buyers</h1>
                <h3>Engage in Coffee Trade</h3>
                <p>Connect with traders and buyers to discuss market trends, coffee pricing, and trade opportunities.</p>
                <a href="#" class="btn btn-primary">Join Discussion</a>
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{ ('images/share1.avif') }}" alt="Traders and Buyers" class="img-fluid rounded shadow">
        </div>
    </div>
</div>


  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   
</body>
</html>