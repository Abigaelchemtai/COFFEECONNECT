@extends ('layouts.app')


@section('content')

 {{-- Hero Section --}}
    <div class="hero">
        <h1>Welcome to CoffeeConnect</h1>
        <p>Connecting coffee farmers with buyers directly.</p>
        <a href="#" class="btn btn-primary btn-lg">Shop Now</a>
    </div>


         <!-- Services Section -->
    <div class="container mt-5">
        <h2 class="text-center mb-5">Our Services</h2>
        
        <!-- Service 1: Farmers Selling Coffee and Investing in Bitcoin -->
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="service-card">
                    <h1>Farmers</h1>
                    <h3>Sell Coffee and Invest in Bitcoin</h3>
                    <p>Farmers can sell their coffee directly on the platform and receive payment in Bitcoin. Additionally, they can choose to invest their earnings into Bitcoin for future growth, securing their financial future in a digital world.</p>
                    <a href="#" class="btn btn-primary">Start Selling</a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/bit2.avif') }}" alt="Farmers Coffee" class="img-fluid rounded">
            </div>
        </div>
        
        <!-- Service 2: Buyers Purchasing Coffee with Bitcoin -->
        <div class="row mb-5">
            <div class="col-md-6 order-md-2">
                <div class="service-card">
                    <h1>Buyers</h1>
                    <h3>Purchase Coffee with Bitcoin</h3>
                    <p>Buyers can use Bitcoin to purchase high-quality coffee from farmers. By doing so, they support local farmers and can access the finest coffee directly from the source.</p>
                    <a href="#" class="btn btn-primary">Start Buying</a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/bit8.jpg') }}" alt="Buyer Service" class="img-fluid rounded">
            </div>
        </div>
        
        <!-- Service 3: Providing Loans to Small Coffee Farmers -->
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="service-card">
                    <h3>Providing Loans to Small Coffee Farmers</h3>
                    <p>We provide loans to small coffee farmers to help them grow their operations. By offering accessible and fair loans, we empower farmers to invest in better resources and improve their coffee production.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/bitc3.avif') }}" alt="Loan Service" class="img-fluid rounded">
            </div>
        </div>

        <!-- Service 4: Selling Coffee Products at Favorable Fees -->
        <div class="row">
            <div class="col-md-6 order-md-2">
                <div class="service-card">
                    <h3>Selling Coffee Products at Favorable Fees</h3>
                    <p>We provide a platform for sellers to offer coffee-related products such as beans, brewing equipment, and accessories at favorable fees. This service helps sellers reach a broader audience and boost their sales.</p>
                    <a href="#" class="btn btn-primary">Start Selling Products</a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/bit4.avif') }}" alt="Coffee Products" class="img-fluid rounded">
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
<div class="container mt-5">
    <h2 class="text-center mb-5">Frequently Asked Questions (FAQ)</h2>
    <div class="accordion" id="faqAccordion">

        <!-- Question 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    What is CoffeeConnect?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    CoffeeConnect is a platform that connects coffee farmers directly with buyers, allowing them to sell and purchase coffee products using Bitcoin. It also provides services like loans to small farmers and a marketplace for coffee-related products.
                </div>
            </div>
        </div>

        <!-- Question 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    How can farmers sell their coffee on CoffeeConnect?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Farmers can register on the platform, create a listing with the type of coffee they are selling, set a price, and receive payments in Bitcoin. They can also choose to invest their earnings into Bitcoin for future growth.
                </div>
            </div>
        </div>

        <!-- Question 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    How can buyers purchase coffee on CoffeeConnect?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Buyers can browse listings of coffee available for sale, select the type and quantity they want to purchase, and complete the transaction using Bitcoin. The coffee will be shipped to the buyer directly from the farmer.
                </div>
            </div>
        </div>

        <!-- Question 4 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    How do the loans work for small coffee farmers?
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    We offer loans to small coffee farmers to help them invest in better resources and grow their coffee production. Farmers can apply for loans through the platform, and the terms will be outlined clearly. The loans are designed to be accessible and fair to help farmers succeed.
                </div>
            </div>
        </div>

        <!-- Question 5 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Can I sell coffee-related products on CoffeeConnect?
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Yes, you can sell coffee-related products such as beans, brewing equipment, and accessories on our platform. We offer favorable fees for sellers to reach a broad audience and increase their sales.
                </div>
            </div>
        </div>

        </div>
    </div>


    
    {{-- Featured Categories --}}
    <div class="container mt-5">
        <h2 class="text-center">Featured Categories</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="category-card">
                    <img src="{{ asset('images/im1.avif') }}" alt="Arabica Coffee">
                    <h5>Arabica Coffee</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="category-card">
                    <img src="{{ asset('images/img3.jpg') }}" alt="Robusta Coffee">
                    <h5>Robusta Coffee</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="category-card">
                    <img src="{{ asset('images/img4.jpg') }}" alt="Specialty Coffee">
                    <h5>Specialty Coffee</h5>
                </div>
            </div>
        </div>
    </div>


    @endsection