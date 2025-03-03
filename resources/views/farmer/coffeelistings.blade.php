<!-- @extends ('pages.farmers')
@section ('content') -->

<div class="container mt-4">
    <h2 class="mb-3 text-center text-dark">Your Coffee Listings</h2>
    <a href="{{ route('farmer.create') }}" class="btn btn-primary mb-3">Add Coffee</a>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr class="table-header">
                    <th>Brand</th>
                    <th>Quantity (kg)</th>
                    <th>Price per kg</th>
                    <th>Grade</th>
                    <th>Status</th>
                    <th>Wallet</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($coffeeListings) && $coffeeListings->count() > 0)
                    @foreach($coffeeListings as $coffee)
                        <tr>
                            <td>{{ $coffee->coffee_brand }}</td>
                            <td>{{ $coffee->quantity_kg }}</td>
                            <td>${{ $coffee->price_per_kg }}</td>
                            <td>{{ $coffee->coffee_grade }}</td>
                            <td><span class="status-badge {{ $coffee->status }}">{{ ucfirst($coffee->status) }}</span></td>
                            <td>{{ $coffee->wallet_number }}</td>
                            <td>
                                @if($coffee->status !== 'sold out')
                                    <a href="{{ route('farmer.edit', $coffee->id) }}" class="btn btn-sm btn-warning">Edit</a>
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

<style>
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
</style>
<!-- @endsection -->