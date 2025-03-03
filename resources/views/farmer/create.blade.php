<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%; background-color: #F3E5AB; border-radius: 15px;">
        <!-- Welcome Message -->
        <h3 class="text-center text-dark fw-bold">
            Welcome, {{ auth()->user()->name ?? 'Farmer' }} 👋
        </h3>
        <p class="text-center text-muted">Add your coffee listing below</p>

        <form action="{{ route('farmer.store') }}" method="POST">
            @csrf
            
            <!-- Coffee Brand -->
            <div class="mb-3">
                <label class="form-label fw-bold">Coffee Brand</label>
                <select name="coffee_brand" class="form-control custom-select">
                    <option>Speciality</option>
                    <option>Robusta</option>
                    <option>Arabica</option>
                </select>
            </div>

            <!-- Quantity -->
            <div class="mb-3">
                <label class="form-label fw-bold">Quantity (kg)</label>
                <input type="number" name="quantity_kg" class="form-control" placeholder="Enter quantity">
            </div>

            <!-- Price -->
            <div class="mb-3">
                <label class="form-label fw-bold">Price per kg ($)</label>
                <input type="number" name="price_per_kg" class="form-control" placeholder="Enter price">
            </div>

            <!-- Grade -->
            <div class="mb-3">
                <label class="form-label fw-bold">Coffee Grade</label>
                <input type="text" name="coffee_grade" class="form-control" placeholder="Enter grade">
            </div>

            <!-- Wallet Number -->
            <div class="mb-3">
                <label class="form-label fw-bold">Wallet Number</label>
                <input type="text" name="wallet_number" class="form-control" placeholder="Enter wallet number">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-dark w-100 fw-bold">Add Coffee</button>

            <!-- Return to Dashboard Button (with extra spacing) -->
            <a href="{{ route('farmer.dashboard') }}" class="btn btn-outline-dark w-100 mt-4 fw-bold">Return to Dashboard</a>
        </form>
    </div>
</div>

<style>
    /* Center the form container */
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    /* Form Card */
    .card {
        background-color: #F3E5AB; /* Light Coffee */
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
    }

    /* Input Styling */
    .form-control {
        border-radius: 8px;
        border: 2px solid #8B5E3C; /* Coffee Brown */
        padding: 10px;
    }

    /* Submit Button */
    .btn-dark {
        background-color: #4B2E2E; /* Dark Coffee */
        border: none;
        padding: 12px;
        border-radius: 10px;
        transition: 0.3s ease-in-out;
    }

    .btn-dark:hover {
        background-color: #3A1F1F;
    }

    /* Dashboard Button */
    .btn-outline-dark {
        border: 2px solid #4B2E2E;
        color: #4B2E2E;
        padding: 12px;
        border-radius: 10px;
        transition: 0.3s ease-in-out;
        text-align: center;
    }

    .btn-outline-dark:hover {
        background-color: #4B2E2E;
        color: white;
    }

    /* Extra spacing between buttons */
    .mt-4 {
        margin-top: 24px !important;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .card {
            width: 90%;
        }
    }
</style>
