<div class="container mt-4">
    <h2 class="text-center mb-4">Product Requests</h2>

    @if($requests->isEmpty())
        <div class="alert alert-warning text-center">No requests available.</div>
    @else
        <table class="table table-striped table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Investor ID</th>
                    <th>Farmer ID</th>
                    <th>Coffee Variety</th>
                    <th>Quality Grade</th>
                    <th>Quantity (Kg)</th>
                    <th>Request Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr>
                        <td class="font-weight-bold">{{ $request->investor->id ?? 'N/A' }}</td>
                        <td class="font-weight-bold">{{ $request->listing->user->id ?? 'N/A' }}</td>
                        <td>{{ $request->listing->coffee_type ?? 'N/A' }}</td>
                        <td>{{ $request->listing->coffee_grade ?? 'N/A' }}</td>
                        <td>{{ $request->listing->quantity ?? 'N/A' }} Kg</td>
                        <td>
                            <span class="badge 
                                @if($request->status === 'pending') badge-warning 
                                @elseif($request->status === 'accepted') badge-success 
                                @elseif($request->status === 'declined') badge-danger 
                                @endif">
                                {{ ucfirst($request->status) }}
                            </span>
                        </td>
                        <td>
                            @if(Auth::user()->role === 'farmer' && $request->status === 'pending')
                                <form action="{{ route('requests.update', $request->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" name="status" value="accepted" class="btn btn-sm btn-success">✅ Accept</button>
                                    <button type="submit" name="status" value="declined" class="btn btn-sm btn-danger">❌ Decline</button>
                                </form>
                            @else
                                <span class="text-muted">No Actions</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
<style>

/* Table Styling */
.table-container {
    background: #f8f9fa; /* Light background */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.table {
    width: 100%;
    border-collapse: collapse;
    overflow: hidden;
    border-radius: 10px;
}

.table thead {
    background: #343a40; /* Dark header */
    color: white;
    font-weight: bold;
    text-transform: uppercase;
}

.table thead th {
    padding: 15px;
    text-align: center;
}

.table tbody tr {
    transition: 0.3s;
}

.table tbody tr:nth-child(even) {
    background: #f1f1f1;
}

.table tbody tr:hover {
    background: #d4edda; /* Light green hover */
    cursor: pointer;
}

.table td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

/* Badge Styling */
.badge {
    padding: 5px 10px;
    border-radius: 5px;
    font-weight: bold;
}

.badge-warning {
    background: #ffc107;
    color: black;
}

.badge-success {
    background: #28a745;
    color: white;
}

.badge-danger {
    background: #dc3545;
    color: white;
}

/* Buttons */
.btn-sm {
    padding: 6px 12px;
    font-size: 14px;
    font-weight: bold;
    border-radius: 5px;
    transition: 0.3s;
}

.btn-success:hover {
    background: #218838;
}

.btn-danger:hover {
    background: #c82333;
}

</style>