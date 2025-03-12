<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-5" style="max-width: 500px; width: 100%; background-color: #F3E5AB; border-radius: 15px;">
        <!-- Welcome Message -->
        <h3 class="text-center text-dark fw-bold">
            Welcome, {{ auth()->user()->name ?? 'Farmer' }} 👋
        </h3>
        <p class="text-center text-muted">Add your coffee listing below</p>

        <form action="{{ route('farmer.storeCoffee') }}" method="POST">
            @csrf
            
            <!-- Coffee Type -->
            <div class="mb-4">
                <label class="form-label fw-bold">Coffee Type</label>
                <select name="coffee_type" class="form-control custom-select" required>
                    <option value="Speciality">Speciality</option>
                    <option value="Robusta">Robusta</option>
                    <option value="Arabica">Arabica</option>
            </select>
            </div>

            <!-- Quantity -->
            <div class="mb-4">
                <label class="form-label fw-bold">Quantity (kg)</label>
                <input type="number" name="quantity" class="form-control" placeholder="Enter quantity" step="0.01" required>
            </div>

            <!-- Price per kg -->
            <div class="mb-4">
                <label class="form-label fw-bold">Price per kg ($)</label>
                <input type="number" name="price_per_kg" class="form-control" placeholder="Enter price" step="0.01" required>
            </div>

            <!-- Coffee Grade -->
            <div class="mb-4">
                <label class="form-label fw-bold">Coffee Grade</label>
                <select name="coffee_grade" class="form-control custom-select">
                    <option value="AA">AA</option>
                    <option value="AB">AB</option>
                    <option value="PB">PB</option>
                </select>
            </div>

            <!-- Wallet Number -->
            <div class="mb-4">
                <label class="form-label fw-bold">Wallet Number</label>
                <input type="text" name="wallet_number" class="form-control" placeholder="Enter wallet number" required>
            </div>

            <!-- Return to Dashboard & Submit -->
            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('farmer.dashboard') }}" class="btn btn-outline-dark w-50 fw-bold py-2 me-2">Return to Home</a>
                <button type="submit" class="btn btn-outline-dark w-50 fw-bold py-2">Add Coffee</button>
            </div>
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
        padding: 30px;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.2);
    }

    /* Input Styling */
    .form-control {
        border-radius: 10px;
        border: 2px solid #8B5E3C; /* Coffee Brown */
        padding: 12px;
        font-size: 16px;
        box-shadow: inset 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .form-control:focus {
        border-color: #4B2E2E;
        box-shadow: 0px 0px 8px rgba(75, 46, 46, 0.5);
    }

    /* Submit Button */
    .btn-dark {
        background-color: #4B2E2E; /* Dark Coffee */
        border: none;
        padding: 14px;
        border-radius: 12px;
        transition: all 0.3s ease-in-out;
        font-size: 16px;
    }

    .btn-dark:hover {
        background-color: #3A1F1F;
        transform: scale(1.03);
    }

    /* Dashboard Button */
    .btn-outline-dark {
        border: 2px solid #4B2E2E;
        color: #4B2E2E;
        padding: 14px;
        border-radius: 12px;
        transition: all 0.3s ease-in-out;
        text-align: center;
        font-size: 16px;
    }

    .btn-outline-dark:hover {
        background-color: #4B2E2E;
        color: white;
        transform: scale(1.03);
    }

    /* Extra spacing between buttons */
    .mt-3 {
        margin-top: 20px !important;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .card {
            width: 95%;
        }
    }
</style>
