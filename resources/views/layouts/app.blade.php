<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to CoffeeConnect</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
   
    <style>
        :root {
            --coffee-brown: #4B2E2E; /* Coffee brown */
            --forest-green: #2F4F2F; /* Dark green for coffee */
            --beige: #F5F5DC; /* Light beige for background */
            --black: #000000;
            --white: #FFFFFF;
        }

        body {
            background-color: var(--beige);
            color: var(--black);
            font-family: Arial, sans-serif;
            padding-top: 80px;
        }

        .navbar {
            background-color: var(--coffee-brown);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            padding: 15px 20px;
        }

        .navbar .nav-link, .navbar-brand {
            color: var(--white) !important;
            font-size: 1.5rem;
        }

        .hero {
            background: url("{{ asset('images/bit2.avif') }}") center/cover no-repeat;
            height: 80vh;
            color: green;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            flex-direction: column;
            padding: 20px;
            background-color: rgba(47, 79, 79, 0.7); /* Dark green overlay with higher opacity */
        }

        .hero h1 {
            font-size: 4rem; /* Larger font size */
            font-weight: 700; /* Bolder text */
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7); /* Text shadow for better contrast */
        }

        .hero p {
            font-size: 1.5rem;
            font-weight: 500;
        }

        .btn-primary {
            background-color: var(--coffee-brown);
            border-color: var(--coffee-brown);
        }

        .btn-primary:hover {
            background-color: var(--forest-green);
            border-color: var(--forest-green);
        }

        .service-card {
            background: var(--white);
            border: 1px solid var(--coffee-brown);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
            margin-bottom: 20px;
        }

        .service-card:hover {
            background-color: var(--forest-green);
            color: var(--white);
        }

        .service-card h1 {
            color: var(--coffee-brown);
            font-size: 2rem;
            font-weight: bold;
        }        

        .service-card h3 {
            color: var(--coffee-brown);
            font-size: 1.5rem;
            font-weight: bolder;
        }

        .service-card p {
            color: var(--black);
            font-size: 1rem;
            margin: 10px 0;
        }

        .service-card .btn {
            background-color: var(--coffee-brown);
            border-color: var(--coffee-brown);
        }

        .service-card .btn:hover {
            background-color: var(--forest-green);
            border-color: var(--forest-green);
        }

        img {
            border-radius: 8px;
            max-height: 300px;
            object-fit: cover;
        }

        h2 {
            color: var(--coffee-brown);
            font-size: 2rem;
            font-weight: bold;
        }

        .row {
            display: flex;
            align-items: center;
        }

        .mb-5 {
            margin-bottom: 3rem;
        }

        .order-md-2 {
            order: 2;
        }

        
        .category-card {
            background: var(--white);
            border: 1px solid var(--coffee-brown);
            text-align: center;
            padding: 20px;
            margin: 10px;
            transition: 0.3s;
            border-radius: 8px;
        }

        .category-card:hover {
            background: var(--forest-green);
            color: var(--white);
        }

        .category-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }
        
                /* FAQ Section */
        .accordion-button {
            background-color: var(--coffee-brown);
            color: var(--white);
            font-weight: bold;
            border-radius: 8px;
        }

        .accordion-button:not(.collapsed) {
            background-color: var(--forest-green);
            color: var(--white);
        }

        .accordion-body {
            background-color: var(--beige);
            color: var(--black);
        }

        .accordion-item {
            margin-bottom: 1rem;
            border: 1px solid var(--coffee-brown);
            border-radius: 8px;
        }

        .accordion-button:focus {
            box-shadow: none;
        }

        .accordion-header {
            padding: 0;
        }

        .accordion-button {
            padding: 15px;
        }

        .accordion-body {
            padding: 20px;
        }

        h2 {
            color: var(--coffee-brown);
            font-size: 2rem;
            font-weight: bold;
        }

                /* Form Section */
        .form-label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px;
            border: 1px solid var(--coffee-brown);
        }
        .container form {
        margin-bottom: 50px;
        }

        textarea.form-control {
            resize: vertical;
        }

        button[type="submit"] {
            background-color: var(--coffee-brown);
            border-color: var(--coffee-brown);
            border-radius: 8px;
        }

        button[type="submit"]:hover {
            background-color: var(--forest-green);
            border-color: var(--forest-green);
        }


                /* Footer Styles */
        footer {
            background-color: var(--coffee-brown);
            color: var(--white);
            margin-top: 50px;
            padding: 40px 0;

        }

        footer h5 {
            font-weight: bold;
            margin-bottom: 15px;
        }

        footer p {
            font-size: 1rem;
            line-height: 1.5;
        }

        footer .btn {
            background-color: var(--forest-green);
            border-color: var(--forest-green);
            padding: 10px 15px;
            border-radius: 50%;
        }

        footer .btn:hover {
            background-color: var(--coffee-brown);
            border-color: var(--coffee-brown);
        }

        footer a {
            color: var(--white);
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        footer .list-unstyled {
            padding-left: 0;
        }

        footer .text-center {
            margin-top: 30px;
        }

        footer .fab {
            font-size: 20px;
        }

        footer .container {
            max-width: 1200px;
            margin: 0 auto;
        }

  </style>

</head>
<body>

    {{-- Navbar --}}
    @include ('pages.navbar')
    
    {{-- Contents here--}}
<div class="container">
@yield ('content')
</div>

    
        <!-- Contact/Feedback Form Section -->
<div class="container mt-5">
    <h2 class="text-center mb-5">Contact Us</h2>

    <!-- Form -->
    <form action="#" method="POST">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Write your message" required></textarea>
        </div>

        <div class="mb-3">
            <label for="coffee-interest" class="form-label">Are you interested in our services?</label>
            <select class="form-control" id="coffee-interest" name="coffee-interest">
                <option value="" disabled selected>Select an option</option>
                <option value="farmer">Farmer</option>
                <option value="buyer">Buyer</option>
                <option value="investor">Investor</option>
                <option value="loan">Loan Provider</option>
            </select>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
       </form>
    </div>


    <!-- Footer Section -->
<footer class="bg-coffee-brown text-white py-5">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-md-4">
                <h5>About CoffeeConnect</h5>
                <p>Connecting coffee farmers with buyers and providing solutions for sustainable growth. Explore our services, make investments, and be a part of the coffee revolution.</p>
            </div>

            <!-- Quick Links Section -->
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">Home</a></li>
                    <li><a href="#" class="text-white">Shop</a></li>
                    <li><a href="#" class="text-white">Services</a></li>
                    <li><a href="#" class="text-white">Contact Us</a></li>
                    <li><a href="#" class="text-white">FAQ</a></li>
                </ul>
            </div>

            <!-- Contact Info Section -->
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <p>Email: <a href="mailto:info@coffeeconnect.com" class="text-white">info@coffeeconnect.com</a></p>
                <p>Phone: +123 456 7890</p>
                <p>Address: 123 Coffee Street, City, Country</p>
            </div>
        </div>

        <!-- Social Media Links -->
        <div class="text-center mt-4">
            <h5>Follow Us</h5>
            <div>
                <a href="#" class="btn btn-dark me-2"><i class="fab fa-facebook"></i></a>
                <a href="#" class="btn btn-dark me-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="btn btn-dark me-2"><i class="fab fa-instagram"></i></a>
                <a href="#" class="btn btn-dark"><i class="fab fa-linkein"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   
</body>
</html>