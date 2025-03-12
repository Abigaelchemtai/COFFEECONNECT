<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-4 rounded">
                <h3 class="text-center mb-4 text-success">Edit Coffee Listing</h3>

                <form method="POST" action="{{ route('farmer.updateCoffee', $listing->id) }}">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Coffee Type</label>
                            <select class="form-select rounded-pill" name="coffee_type">
                                <option value="Speciality" {{ $listing->coffee_type == 'Speciality' ? 'selected' : '' }}>Speciality</option>
                                <option value="Robusta" {{ $listing->coffee_type == 'Robusta' ? 'selected' : '' }}>Robusta</option>
                                <option value="Arabica" {{ $listing->coffee_type == 'Arabica' ? 'selected' : '' }}>Arabica</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Quantity (kg)</label>
                            <input type="number" class="form-control rounded-pill" name="quantity" value="{{ $listing->quantity }}">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Price per kg</label>
                            <input type="number" class="form-control rounded-pill" name="price_per_kg" value="{{ $listing->price_per_kg }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Coffee Grade</label>
                            <input type="text" class="form-control rounded-pill" name="coffee_grade" value="{{ $listing->coffee_grade }}">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Wallet Number</label>
                            <input type="text" class="form-control rounded-pill" name="wallet_number" value="{{ $listing->wallet_number }}">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success px-5 py-3 rounded-pill shadow-sm fw-bold">
                                Update Coffee Listing
                            </button>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 text-center">
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary px-4 py-2 rounded-pill">
                                ⬅ Return to Home
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>

.card {
    border-radius: 15px;
    border: none;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
}

.btn-success {
    background-color: #228B22; /* Coffee Green */
    border: none;
    font-size: 18px;
    transition: 0.3s ease-in-out;
}

.btn-success:hover {
    background-color: #1e7e34;
}

.btn-outline-secondary {
    font-size: 16px;
    transition: 0.3s;
}

.btn-outline-secondary:hover {
    background-color: #6c757d;
    color: #fff;
}

.form-control, .form-select {
    border: 1px solid #ced4da;
    padding: 12px;
    font-size: 16px;
}

.form-control:focus, .form-select:focus {
    border-color: #228B22;
    box-shadow: 0 0 5px rgba(34, 139, 34, 0.5);
}

    </style>