<!DOCTYPE html>
<html lang="bn">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Dynamic Site Title --}}
    <title>{{ $settings->site_title ?? 'Loombongo' }} -প্রিমিয়াম সিরাজগঞ্জ লুঙ্গি | Multi-Product Order System</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Meta Description & Keywords --}}
    <meta name="description" content="{{ $settings->meta_description ?? $settings->desc ?? '' }}">
    <meta name="keywords" content="{{ $settings->meta_keywords ?? '' }}">


    {{-- Indexing --}}
    @if(isset($settings->allow_indexing) && !$settings->allow_indexing)
    <meta name="robots" content="noindex, nofollow">
    @endif


    {{-- Favicon --}}
    <link rel="icon" type="image/png"
        href="{{ $settings->favicon ? asset('settings/'.$settings->favicon) : asset('image/logo.jpg') }}">
    <link rel="shortcut icon"
        href="{{ $settings->favicon ? asset('settings/'.$settings->favicon) : asset('image/logo.jpg') }}">

    {{-- Open Graph Image --}}
    <meta property="og:image"
        content="{{ $settings->logo ? asset('settings/'.$settings->logo) : asset('image/logo.jpg') }}">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Hind+Siliguri:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Chart.js for Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Facebook Pixel --}}
    @if(!empty($settings->facebook_pixel))
    {!! $settings->facebook_pixel !!}
    @endif

    {{-- Google Analytics --}}
    @if(!empty($settings->google_analytics))
    {!! $settings->google_analytics !!}
    @endif

    {{-- Custom Header Scripts --}}
    @if(!empty($settings->custom_header_scripts))
    {!! $settings->custom_header_scripts !!}
    @endif


    <style>
        :root {
            --primary: #d4af37;
            --primary-dark: #b8941f;
            --secondary: #1a1a1a;
            --light-bg: #f9f7f2;
            --text-dark: #222222;
            --text-light: #666666;
            --white: #ffffff;
            --success: #28a745;
            --danger: #dc3545;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            --shadow-heavy: 0 15px 40px rgba(0, 0, 0, 0.12);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Hind Siliguri', 'Inter', sans-serif;
            color: var(--text-dark);
            overflow-x: hidden;
            line-height: 1.7;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 700;
            color: var(--secondary);
        }

        .section-title {
            position: relative;
            margin-bottom: 3rem;
            text-align: center;
        }

        .section-title:after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background: var(--primary);
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        /* Header with Cart */
        .main-header {
            background: var(--white);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .cart-icon {
            position: relative;
            font-size: 1.5rem;
            color: var(--secondary);
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--primary);
            color: var(--secondary);
            font-size: 0.8rem;
            font-weight: bold;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(rgba(77, 75, 75, 0.8), rgba(54, 53, 53, 0.8)),
            url('{{ asset('public/heroes/' . $hero->image) }}');
            background-size: cover;
            background-position: center;
            min-height: 85vh;
            display: flex;
            align-items: center;
            color: var(--white);
        }

        .hero-badge {
            display: inline-block;
            background: var(--primary);
            color: var(--secondary);
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
        }

        .cta-btn {
            background: var(--primary);
            color: var(--secondary);
            border: none;
            padding: 15px 35px;
            font-size: 1.2rem;
            font-weight: 700;
            border-radius: 50px;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }

        .cta-btn:hover {
            background: var(--primary-dark);
            color: var(--secondary);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(212, 175, 55, 0.4);
        }

        /* Product Section */
        .product-section {
            padding: 5rem 0;
            background: var(--light-bg);
        }

        .product-card {
            background: var(--white);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            height: 100%;
            border: 1px solid #f0f0f0;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-heavy);
        }

        .product-img {
            height: 250px;
            width: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--primary);
            color: var(--secondary);
            padding: 5px 15px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.8rem;
            z-index: 2;
        }

        .product-price {
            color: var(--primary);
            font-weight: 800;
            font-size: 1.5rem;
            margin: 10px 0;
        }

        .product-old-price {
            text-decoration: line-through;
            color: var(--text-light);
            font-size: 1rem;
            margin-left: 10px;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 15px 0;
        }

        .qty-btn {
            width: 35px;
            height: 35px;
            background: #f0f0f0;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            transition: var(--transition);
        }

        .qty-btn:hover {
            background: var(--primary);
            color: var(--secondary);
        }

        .qty-input {
            width: 60px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 8px;
            font-weight: bold;
        }

        .add-to-cart-btn {
            background: var(--secondary);
            color: var(--white);
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .add-to-cart-btn:hover {
            background: var(--primary);
            color: var(--secondary);
        }

        .in-cart-btn {
            background: var(--success);
            color: var(--white);
        }

        /* USP Section */
        .usp-section {
            background: var(--light-bg);
            padding: 5rem 0;
        }

        .usp-card {
            background: var(--white);
            border-radius: 15px;
            padding: 30px 25px;
            height: 100%;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border-top: 4px solid transparent;
            text-align: center;
        }

        .usp-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-heavy);
            border-top-color: var(--primary);
        }

        .usp-icon {
            width: 70px;
            height: 70px;
            background: rgba(212, 175, 55, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: var(--primary);
            font-size: 1.8rem;
        }

        /* Review Section */
        .review-section {
            background: var(--light-bg);
            padding: 5rem 0;
        }

        .review-card {
            background: var(--white);
            border-radius: 15px;
            padding: 30px;
            box-shadow: var(--shadow);
            height: 100%;
            position: relative;
        }

        .review-card:before {
            content: "\201C";
            position: absolute;
            top: 20px;
            left: 25px;
            font-size: 4rem;
            color: rgba(212, 175, 55, 0.2);
            font-family: Georgia, serif;
        }

        .review-text {
            font-style: italic;
            margin-bottom: 20px;
            padding-top: 20px;
        }

        .review-author {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .review-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary);
        }

        .review-rating {
            color: var(--primary);
            margin-bottom: 5px;
        }

        /* Shopping Cart Sidebar */
        .cart-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100vh;
            background: var(--white);
            box-shadow: -5px 0 25px rgba(0, 0, 0, 0.15);
            z-index: 1050;
            transition: var(--transition);
            padding: 20px;
            overflow-y: auto;
        }

        .cart-sidebar.open {
            right: 0;
        }

        .cart-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1040;
            display: none;
        }

        .cart-overlay.show {
            display: block;
        }

        .cart-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .cart-item-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 15px;
        }

        .cart-item-details {
            flex: 1;
        }

        .cart-item-price {
            color: var(--primary);
            font-weight: bold;
        }

        .remove-item {
            color: var(--danger);
            background: none;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .remove-item:hover {
            transform: scale(1.2);
        }

        .payment-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            color: white;
            font-weight: 500;
            cursor: default;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .payment-badge:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Brand-inspired colors */
        .bkash {
            background-color: #ec1c24;
        }

        .nagad {
            background-color: #ff6600;
        }

        .rocket {
            background-color: #ffcc00;
            color: #000;
        }

        .cod {
            background-color: #6c757d;
        }

        /* Dashboard Section */
        .dashboard-section {
            padding: 5rem 0;
            background: var(--white);
        }

        .stats-card {
            background: var(--light-bg);
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border-left: 5px solid var(--primary);
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-heavy);
        }

        .stats-value {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            margin: 10px 0;
        }

        /* Checkout Section */
        .checkout-section {
            padding: 5rem 0;
            background: var(--light-bg);
        }

        .checkout-card {
            background: var(--white);
            border-radius: 15px;
            padding: 30px;
            box-shadow: var(--shadow);
        }

        .order-summary {
            background: var(--light-bg);
            border-radius: 10px;
            padding: 20px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px dashed #ddd;
        }

        .summary-total {
            font-weight: 800;
            font-size: 1.3rem;
            color: var(--primary);
            border-bottom: none;
        }

        /* Trust Badges */
        .trust-badges {
            background: var(--secondary);
            color: var(--white);
            padding: 3rem 0;
        }

        .trust-item {
            text-align: center;
            padding: 20px;
        }

        .trust-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 15px;
        }

        /* Chart Container */
        .chart-container {
            background: var(--white);
            border-radius: 15px;
            padding: 25px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }

        /* Footer */
        .footer {
            background: #111111;
            color: #aaa;
            padding: 3rem 0 1.5rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .cart-sidebar {
                width: 100%;
                right: -100%;
            }

            .hero-title {
                font-size: 2.2rem;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }

        /* Notification */
        .notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: var(--success);
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: var(--shadow-heavy);
            z-index: 1100;
            display: flex;
            align-items: center;
            gap: 10px;
            transform: translateX(150%);
            transition: transform 0.3s ease;
        }

        .notification.show {
            transform: translateX(0);
        }
    </style>
</head>

<body>

    <!-- Header with Cart -->
    <header class="main-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand fw-bold fs-3" href="{{ route('home') }}">
                    @if(isset($settings->logo) && file_exists(public_path('settings/' . $settings->logo)))
                    <img src="{{ asset('settings/' . $settings->logo) }}" alt="LOOMBONGO" height="60">
                    @else
                    <span style="color: var(--primary);">LOOMBONGO</span>
                    @endif
                </a>


                <div class="d-flex align-items-center gap-4">
                    <!-- Cart Icon -->
                    <button class="btn position-relative" id="cartToggle">
                        <i class="fas fa-shopping-cart cart-icon"></i>
                        <span class="cart-count" id="cartTotalItems">0</span>
                    </button>

                    <!-- Checkout Button -->
                    <a href="#checkout" class="btn cta-btn d-none d-md-inline-flex" id="checkoutBtn">
                        <i class="fas fa-credit-card"></i> চেকআউট
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Cart Sidebar -->
    <div class="cart-overlay" id="cartOverlay"></div>
    <div class="cart-sidebar" id="cartSidebar">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">
                <i class="fas fa-shopping-cart me-2"></i> আপনার কার্ট
            </h4>
            <button class="btn" id="closeCart">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div id="cartItemsContainer">
            <!-- Cart items will be dynamically inserted here -->
            <div class="text-center py-5">
                <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                <p>আপনার কার্টে কোনো পণ্য নেই</p>
            </div>
        </div>

        <div class="cart-summary mt-4 pt-4 border-top">
            <div class="d-flex justify-content-between mb-2">
                <span>সাবটোটাল:</span>
                <span id="cartSubtotal">৳ ০</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span>ডেলিভারি চার্জ:</span>
                <span id="deliveryCharge">৳ ১১০</span>
            </div>
            <div class="d-flex justify-content-between mb-3 fw-bold fs-5">
                <span>মোট:</span>
                <span id="cartTotal">৳ ১১০</span>
            </div>

            <a href="#checkout" class="btn cta-btn w-100" id="goToCheckoutBtn">
                <i class="fas fa-credit-card"></i> অর্ডার কনফার্ম করুন
            </a>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 fade-in">

                    {{-- Hero Badge --}}
                    <div class="hero-badge">
                        <i class="fas fa-award me-2"></i> {{ $hero->badge ?? 'Default Badge' }}
                    </div>

                    {{-- Hero Title --}}
                    <h1 class="hero-title text-white">{{ $hero->title ?? 'Default Title' }}</h1>

                    {{-- Hero Subtitle --}}
                    <p class="fs-5 mb-4 opacity-90">
                        {{ $hero->subtitle ?? 'Default subtitle text goes here.' }}
                    </p>

                    <div class="d-flex flex-wrap gap-3">
                        <a href="#products" class="btn cta-btn">
                            <i class="fas fa-shopping-bag"></i> সব পণ্য দেখুন
                        </a>
                        <a href="#reviewsection" class="btn cta-btn"
                            style="background: transparent; border: 2px solid var(--primary); color: var(--white);">
                            <i class="fas fa-chart-line"></i> রিভিউগুলো দেখুন
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- Dashboard Section -->
    <section id="dashboard" class="dashboard-section d-none">
        <div class="container">
            <h2 class="section-title">আপনার অর্ডার ড্যাশবোর্ড</h2>
            <p class="text-center mb-5 fs-5">রিয়েল-টাইম স্ট্যাটাস এবং গ্রাফিকাল বিশ্লেষণ</p>

            <div class="row g-4 mb-5">
                <div class="col-md-3 col-6">
                    <div class="stats-card">
                        <i class="fas fa-shopping-cart fa-2x text-primary"></i>
                        <div class="stats-value" id="totalProducts">0</div>
                        <p>মোট পণ্য</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stats-card">
                        <i class="fas fa-box fa-2x text-primary"></i>
                        <div class="stats-value" id="cartQuantity">0</div>
                        <p>কার্ট আইটেম</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stats-card">
                        <i class="fas fa-tags fa-2x text-primary"></i>
                        <div class="stats-value" id="totalValue">৳ 0</div>
                        <p>মোট মূল্য</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stats-card">
                        <i class="fas fa-truck fa-2x text-primary"></i>
                        <div class="stats-value">৳ 60</div>
                        <p>ডেলিভারি চার্জ</p>
                    </div>
                </div>
            </div>

            <!-- Charts -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="chart-container">
                        <h5 class="mb-4">পণ্য বিতরণ</h5>
                        <canvas id="productDistributionChart" height="250"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="chart-container">
                        <h5 class="mb-4">মূল্য বিশ্লেষণ</h5>
                        <canvas id="priceAnalysisChart" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- USP Section -->
    <section class="usp-section">
        <div class="container">
            <h2 class="section-title">{{ $cards->title ?? 'Loombongo লুঙ্গির বিশেষত্ব' }}</h2>
            <div class="row g-4">

                {{-- Card 1 --}}
                <div class="col-md-4">
                    <div class="usp-card">
                        <div class="usp-icon">
                            <i class="fas fa-fan"></i> {{-- You can store icon names in DB if needed --}}
                        </div>
                        <h4>{{ $cards->head1 ?? 'Card 1 Title' }}</h4>
                        <p>{{ $cards->body1 ?? 'Card 1 Description' }}</p>
                    </div>
                </div>

                {{-- Card 2 --}}
                <div class="col-md-4">
                    <div class="usp-card">
                        <div class="usp-icon">
                            <i class="fas fa-palette"></i>
                        </div>
                        <h4>{{ $cards->head2 ?? 'Card 2 Title' }}</h4>
                        <p>{{ $cards->body2 ?? 'Card 2 Description' }}</p>
                    </div>
                </div>

                {{-- Card 3 --}}
                <div class="col-md-4">
                    <div class="usp-card">
                        <div class="usp-icon">
                            <i class="fas fa-feather-alt"></i>
                        </div>
                        <h4>{{ $cards->head3 ?? 'Card 3 Title' }}</h4>
                        <p>{{ $cards->body3 ?? 'Card 3 Description' }}</p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Products Section -->
    <section id="products" class="product-section">
        <div class="container">
            <h2 class="section-title">আমাদের প্রিমিয়াম কালেকশন</h2>
            <p class="text-center mb-5 fs-5">একাধিক পণ্য নির্বাচন করুন এবং কার্টে যোগ করুন</p>

            <div class="row g-4" id="productsContainer">
                <!-- Products will be loaded dynamically from JavaScript -->
            </div>
        </div>
    </section>


    <!-- Customer Reviews -->
    <section class="review-section" id="reviewsection">
        <div class="container">
            <h2 class="section-title">গ্রাহকদের প্রতিক্রিয়া</h2>
            <p class="text-center mb-5 fs-5">আমাদের সন্তুষ্ট গ্রাহকরা যা বলছেন</p>

            <div class="row g-4">
                @foreach($reviews as $review)
                <div class="col-md-4">
                    <div class="review-card">
                        <div class="review-text">
                            "{{ $review->desc }}"
                        </div>
                        <div class="review-author">
                            <img src="{{ asset('reviews/' . $review->image) }}" class="review-avatar"
                                alt="{{ $review->name }}">
                            <div>
                                <h5 class="mb-1">{{ $review->name }}</h5>
                                <div class="review-rating">
                                    @for ($i = 1; $i <= 5; $i++) @if($i <=floor($review->rating))
                                        <i class="fas fa-star"></i>
                                        @elseif($i == ceil($review->rating) && $review->rating !=
                                        floor($review->rating))
                                        <i class="fas fa-star-half-alt"></i>
                                        @else
                                        <i class="far fa-star"></i>
                                        @endif
                                        @endfor
                                </div>
                                <p class="mb-0 text-muted">{{ $review->city }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Trust Badges -->
    <section class="trust-badges">
        <div class="container">
            <div class="row">
                <div class="col-md-3 trust-item">
                    <div class="trust-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <h4 class="text-white">দ্রুত ডেলিভারি</h4>
                    <p>সারা দেশে ৩-৫ কর্মদিবসে</p>
                </div>
                <div class="col-md-3 trust-item">
                    <div class="trust-icon">
                        <i class="fas fa-undo-alt"></i>
                    </div>
                    <h4 class="text-white">সহজ রিটার্ন</h4>
                    <p>৭ দিনের রিটার্ন পলিসি</p>
                </div>
                <div class="col-md-3 trust-item">
                    <div class="trust-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4 class="text-white">১০০% গ্যারান্টি</h4>
                    <p>পণ্যের মানের নিশ্চয়তা</p>
                </div>
                <div class="col-md-3 trust-item">
                    <div class="trust-icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <h4 class="text-white">ক্যাশ অন ডেলিভারি</h4>
                    <p>পণ্য হাতে পেয়ে টাকা দিন</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Checkout Section -->

    <section id="checkout" class="checkout-section">
        <div class="container">
            <h2 class="section-title">চেকআউট করুন</h2>
            <p class="text-center mb-5 fs-5">আপনার তথ্য দিন এবং অর্ডার সম্পূর্ণ করুন</p>

            <div class="row g-5">
                <!-- Order Summary -->
                <div class="col-lg-5">
                    <div class="checkout-card">
                        <h4 class="mb-4"><i class="fas fa-receipt me-2"></i> অর্ডার সামারি</h4>
                        <div id="checkoutItems">
                            <p class="text-center py-3">আপনার কার্টে কোনো পণ্য নেই</p>
                        </div>

                        <div class="order-summary mt-4">
                            <div class="summary-item"><span>সাবটোটাল:</span> <span id="checkoutSubtotal">৳ ০</span>
                            </div>
                            <div class="summary-item"><span>ডেলিভারি চার্জ:</span> <span id="checkoutDelivery">৳
                                    ১১০</span></div>
                            <div class="summary-item"><span>ডিসকাউন্ট:</span> <span id="checkoutDiscount">৳ ০</span>
                            </div>
                            <div class="summary-item summary-total"><span>মোট পরিশোধ:</span> <span id="checkoutTotal">৳
                                    ১১০</span></div>
                        </div>

                        <div class="alert alert-success mt-4" role="alert">
                            <i class="fas fa-check-circle me-2"></i> <strong>ডিসকাউন্ট অফার!</strong> ২০০০ টাকার বেশি
                            অর্ডারে ১০% ডিসকাউন্ট
                        </div>
                    </div>
                </div>

                <!-- Checkout Form -->
                <div class="col-lg-7">
                    <div class="checkout-card">
                        <h4 class="mb-4"><i class="fas fa-user-circle me-2"></i> গ্রাহক তথ্য</h4>
                        <form id="checkoutForm" method="POST" action="{{ route('order.store') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="customer_name" id="customerName"
                                        placeholder="আপনার নাম *" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="tel" class="form-control" name="customer_phone" id="customerPhone"
                                        placeholder="মোবাইল নম্বর *" required>
                                </div>
                                <div class="col-12">
                                    <input type="email" class="form-control" name="customer_email" id="customerEmail"
                                        placeholder="ইমেইল এড্রেস  (ঐচ্ছিক)">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" name="customer_address" id="customerAddress" rows="3"
                                        placeholder="পুরো ঠিকানা *" required></textarea>
                                </div>

                                <div class="col-md-6">
                                    <select class="form-select" name="payment_method" id="paymentMethod" required>
                                        <option value="cod" selected>ক্যাশ অন ডেলিভারি</option>
                                        <option value="bkash">bKash</option>
                                        <option value="nagad">Nagad</option>
                                        <option value="rocket">Rocket</option>
                                    </select>
                                </div>

                                <div class="col-12" id="paymentDetailsContainer" style="display:none;">
                                    <input type="text" class="form-control mb-2" name="account_number"
                                        id="accountNumber" placeholder="Account Number *">
                                    <input type="text" class="form-control" name="transaction_id" id="transactionId"
                                        placeholder="Transaction ID *">
                                </div>

                                <div class="col-12">
                                    <textarea class="form-control" name="order_note" id="orderNote" rows="2"
                                        placeholder="অর্ডার নোট (ঐচ্ছিক)"></textarea>
                                </div>

                                <!-- Hidden fields for cart items -->
                                <div id="cartHiddenFields"></div>

                                <!-- Totals -->
                                <input type="hidden" name="subtotal" id="hiddenSubtotal">
                                <input type="hidden" name="discount" id="hiddenDiscount">
                                <input type="hidden" name="delivery" id="hiddenDelivery">
                                <input type="hidden" name="total" id="hiddenTotal">

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                                          <label class="form-check-label" for="agreeTerms">
                                            আমি
                                            <a href="{{ route('terms') }}" class="text-primary">শর্তাবলী</a>
                                            এবং
                                            <a href="{{ route('privacy') }}" class="text-primary">প্রাইভেসি পলিসি</a>
                                            মেনে অর্ডার দিচ্ছি
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn cta-btn w-100 py-3 fs-5">
                                        <i class="fas fa-paper-plane me-2"></i> অর্ডার সম্পূর্ণ করুন
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- <section id="checkout" class="checkout-section">
        <div class="container">
            <h2 class="section-title">চেকআউট করুন</h2>
            <p class="text-center mb-5 fs-5">আপনার তথ্য দিন এবং অর্ডার সম্পূর্ণ করুন</p>

            <div class="row g-5">
                <!-- Order Summary -->
                <div class="col-lg-5">
                    <div class="checkout-card">
                        <h4 class="mb-4">
                            <i class="fas fa-receipt me-2"></i> অর্ডার সামারি
                        </h4>

                        <div id="checkoutItems">
                            <!-- Checkout items will be dynamically inserted -->
                            <p class="text-center py-3">আপনার কার্টে কোনো পণ্য নেই</p>
                        </div>

                        <div class="order-summary mt-4">
                            <div class="summary-item">
                                <span>সাবটোটাল:</span>
                                <span id="checkoutSubtotal">৳ ০</span>
                            </div>
                            <div class="summary-item">
                                <span>ডেলিভারি চার্জ:</span>
                                <span id="checkoutDelivery">৳ ৬০</span>
                            </div>
                            <div class="summary-item">
                                <span>ডিসকাউন্ট:</span>
                                <span id="checkoutDiscount">৳ ০</span>
                            </div>
                            <div class="summary-item summary-total">
                                <span>মোট পরিশোধ:</span>
                                <span id="checkoutTotal">৳ ৬০</span>
                            </div>
                        </div>

                        <div class="alert alert-success mt-4" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            <strong>ডিসকাউন্ট অফার!</strong> ২০০০ টাকার বেশি অর্ডারে ১০% ডিসকাউন্ট
                        </div>
                    </div>
                </div>

                <!-- Checkout Form -->
                <div class="col-lg-7">
                    <div class="checkout-card">
                        <h4 class="mb-4">
                            <i class="fas fa-user-circle me-2"></i> গ্রাহক তথ্য
                        </h4>

                        <form id="checkoutForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">আপনার নাম *</label>
                                    <input type="text" class="form-control" id="customerName" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">মোবাইল নম্বর *</label>
                                    <input type="tel" class="form-control" id="customerPhone" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">ইমেইল এড্রেস</label>
                                    <input type="email" class="form-control" id="customerEmail">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">পুরো ঠিকানা *</label>
                                    <textarea class="form-control" id="customerAddress" rows="3" required></textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">পেমেন্ট মেথড *</label>
                                    <select class="form-select" id="paymentMethod" required>
                                        <option value="cod" selected>ক্যাশ অন ডেলিভারি</option>
                                        <option value="bkash">bKash</option>
                                        <option value="nagad">Nagad</option>
                                        <option value="rocket">Rocket</option>
                                    </select>
                                </div>
                                <div class="col-12" id="paymentDetailsContainer" style="display:none;">
                                    <div class="mb-3">
                                        <label class="form-label">Account Number *</label>
                                        <input type="text" class="form-control" id="paymentAccount"
                                            placeholder="Enter account number">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Transaction ID *</label>
                                        <input type="text" class="form-control" id="transactionId"
                                            placeholder="Enter transaction ID">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">অর্ডার নোট (ঐচ্ছিক)</label>
                                    <textarea class="form-control" id="orderNote" rows="2"
                                        placeholder="বিশেষ নির্দেশনা থাকলে লিখুন"></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                                        <label class="form-check-label" for="agreeTerms">
                                            আমি <a href="#" class="text-primary">শর্তাবলী</a> এবং <a href="#"
                                                class="text-primary">প্রাইভেসি পলিসি</a> মেনে অর্ডার
                                            দিচ্ছি
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn cta-btn w-100 py-3 fs-5" id="placeOrderBtn">
                                        <i class="fas fa-paper-plane me-2"></i> অর্ডার সম্পূর্ণ করুন
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">

                {{-- About --}}
                <div class="col-lg-4 mb-4">
                    <h4 class="text-white mb-3">{{ $settings->site_title ?? 'LOOMBONGO' }}</h4>
                    <p>{{ $settings->desc ?? 'প্রিমিয়াম কোয়ালিটির সিরাজগঞ্জ লুঙ্গি। বাঙালিয়ানার ঐতিহ্যকে আধুনিক
                        কমফোর্টের সাথে মেলানোর প্রতিশ্রুতি।' }}</p>
                </div>

                {{-- Contact --}}
                <div class="col-lg-4 mb-4">
                    <h5 class="text-white mb-3">যোগাযোগ</h5>
                    <p><i class="fas fa-phone-alt me-2"></i> হটলাইন: {{ $settings->hotline ?? '০১৮৬৭৫৭২৮০৪' }}</p>
                    <p><i class="far fa-clock me-2"></i> সময়: {{ $settings->time ?? 'সকাল ৮টা - রাত ১০টা' }}</p>
                    <p><i class="fas fa-envelope me-2"></i> ইমেইল: {{ $settings->mail ?? 'support@loombongo.com' }}</p>
                </div>

                <div class="col-lg-4 mb-4">
                    <h5 class="text-white mb-3">পেমেন্ট মেথড</h5>
                    <div class="d-flex gap-3 fs-5 flex-wrap">
                        <span class="payment-badge bkash">Bkash</span>
                        <span class="payment-badge nagad">Nagad</span>
                        <span class="payment-badge rocket">Rocket</span>
                        <span class="payment-badge cod">COD</span>
                    </div>
                    <p class="mt-3">সারা বাংলাদেশে ডেলিভারি</p>
                </div>



            </div>

            <hr class="bg-secondary">

            {{-- Footer Bottom --}}
            <div class="text-center pt-3">
                <p class="mb-0">
                    © {{ $settings->copyright ?? 'Loombongo' }}
                    | Designed & Developed by
                    <a href="https://facebook.com/mdasifraj.moyna" target="_blank" style="text-decoration: none;">
                        <strong>Asif Hossain</strong>
                    </a>
                </p>

            </div>

        </div>
    </footer>


    <!-- Notification -->
    <div class="notification" id="notification">
        <i class="fas fa-check-circle"></i>
        <span id="notificationMessage">পণ্য কার্টে যোগ করা হয়েছে</span>
    </div>
    
    
    {{-- Custom Footer Scripts --}}
    @if(!empty($settings->custom_footer_scripts))
    {!! $settings->custom_footer_scripts !!}
    @endif



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Show success message
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'সফল!',
            text: '{{ session("success") }}',
            confirmButtonText: 'ঠিক আছে'
        });
        // Clear cart after order
        localStorage.removeItem('loombongo_cart');
    @endif

    // Show validation errors
    @if($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'ত্রুটি!',
            html: '{!! implode("<br>", $errors->all()) !!}',
            confirmButtonText: 'ঠিক আছে'
        });
    @endif

    // Show session error
    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'ত্রুটি!',
            text: '{{ session("error") }}',
            confirmButtonText: 'ঠিক আছে'
        });
    @endif
    </script>

    <script>
        let products = [];
    let cart = JSON.parse(localStorage.getItem('loombongo_cart')) || [];
    let charts = {};
    
    function updateHiddenCartFields() {
    const container = document.getElementById('cartHiddenFields');
    container.innerHTML = '';

    let subtotal = 0;
    const delivery = 110;
    let discount = 0;

    cart.forEach((item, index) => {
        subtotal += item.price * item.quantity;

        container.innerHTML += `
            <input type="hidden" name="cart[${index}][id]" value="${item.id}">
            <input type="hidden" name="cart[${index}][name]" value="${item.name}">
            <input type="hidden" name="cart[${index}][price]" value="${item.price}">
            <input type="hidden" name="cart[${index}][quantity]" value="${item.quantity}">
            <input type="hidden" name="cart[${index}][category]" value="${item.category}">
        `;
    });

    if(subtotal > 2000) discount = subtotal * 0.1;
    const total = subtotal - discount + delivery;

    document.getElementById('hiddenSubtotal').value = subtotal;
    document.getElementById('hiddenDiscount').value = discount;
    document.getElementById('hiddenDelivery').value = delivery;
    document.getElementById('hiddenTotal').value = total;
}

// Call this function whenever cart changes
updateHiddenCartFields();

const paymentMethod = document.getElementById('paymentMethod');
const paymentDetails = document.getElementById('paymentDetailsContainer');

paymentMethod.addEventListener('change', function() {
    if(['bkash','nagad','rocket'].includes(this.value)){
        paymentDetails.style.display = 'block';
    } else {
        paymentDetails.style.display = 'none';
    }
});


document.addEventListener("DOMContentLoaded", async function () {

    // ----------------- Load Products -----------------
    await loadProductsFromServer();

    // ----------------- Render UI -----------------
    renderProducts();
    updateCartUI();
    updateDashboard();
    initCharts();

    // ----------------- Cart Toggle -----------------
    document.getElementById('cartToggle').addEventListener('click', toggleCart);
    document.getElementById('closeCart').addEventListener('click', toggleCart);
    document.getElementById('cartOverlay').addEventListener('click', toggleCart);

    document.getElementById('goToCheckoutBtn').addEventListener('click', function() {
        toggleCart();
        document.getElementById('checkout').scrollIntoView({behavior: 'smooth'});
    });

    document.getElementById('checkoutBtn').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('checkout').scrollIntoView({behavior: 'smooth'});
    });

    // ----------------- Checkout Form -----------------
    const paymentMethod = document.getElementById('paymentMethod');
    const paymentDetails = document.getElementById('paymentDetailsContainer');

    paymentMethod.addEventListener('change', function() {
        paymentDetails.style.display = ['bkash','nagad','rocket'].includes(this.value) ? 'block' : 'none';
    });

 
// Optional: if you want, validate cart before submitting
document.getElementById('checkoutForm').addEventListener('submit', function(e) {
    if(cart.length === 0){
        e.preventDefault();
        alert('কমপক্ষে একটি পণ্য নির্বাচন করুন');
        return;
    }
    // Update totals before submission
    updateHiddenCartFields();
             // Clear cart
            cart = [];
            localStorage.removeItem('loombongo_cart');
            updateCartUI(); // call your function to refresh cart UI
});


    
});

// ----------------- Load Products -----------------
const productsJsonUrl = window.location.origin + "/products-json";

async function loadProductsFromServer() {
    try {
        const res = await fetch(productsJsonUrl);
        const text = await res.text();
        console.log("RAW RESPONSE:", text);
        products = JSON.parse(text);
    } catch (error) {
        console.error("Could not load products:", error);
    }
}

// ----------------- Render Products -----------------
function generateCarousel(product) {
    const carouselId = `carousel-${product.id}`;
    let indicators = "", slides = "";
    product.images.forEach((img, index) => {
        indicators += `<button type="button" data-bs-target="#${carouselId}" data-bs-slide-to="${index}" class="${index===0?'active':''}"></button>`;
        slides += `<div class="carousel-item ${index===0?'active':''}"><img src="${img}" class="d-block w-100 product-img" alt="${product.name}"></div>`;
    });
    return `
        <div id="${carouselId}" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">${indicators}</div>
            <div class="carousel-inner">${slides}</div>
            <button class="carousel-control-prev" type="button" data-bs-target="#${carouselId}" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#${carouselId}" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>`;
}

function renderProducts() {
    const container = document.getElementById('productsContainer');
    container.innerHTML = '';

    products.forEach(product => {
        const cartItem = cart.find(item => item.id === product.id);
        const quantity = cartItem ? cartItem.quantity : 1;

        const productHTML = `
            <div class="col-md-6 col-lg-4">
                <div class="product-card fade-in">
                    <div class="position-relative">
                        ${generateCarousel(product)}
                        ${product.badge ? `<div class="product-badge">${product.badge}</div>` : ''}
                    </div>
                    <div class="p-4">
                        <h5 class="mb-2">${product.name}</h5>
                        <p class="text-muted small mb-3">${product.description}</p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div><span class="product-price">৳ ${product.price}</span>${product.oldPrice?`<span class="product-old-price">৳ ${product.oldPrice}</span>`:''}</div>
                            <div class="text-warning">${renderStars(product.rating)}</div>
                        </div>
                        <div class="quantity-selector">
                            <button class="qty-btn" onclick="updateQuantity(${product.id}, -1)"><i class="fas fa-minus"></i></button>
                            <input type="number" class="qty-input" id="qty-${product.id}" value="${quantity}" min="1" max="10" onchange="updateQuantityInput(${product.id}, this.value)">
                            <button class="qty-btn" onclick="updateQuantity(${product.id}, 1)"><i class="fas fa-plus"></i></button>
                            <span class="ms-2">টি </span>
                        </div>
                        <button class="add-to-cart-btn ${cartItem?'in-cart-btn':''}" onclick="toggleCartItem(${product.id})" id="cartBtn-${product.id}">
                            <i class="fas ${cartItem?'fa-check':'fa-cart-plus'}"></i> ${cartItem?'কার্টে আছে':'কার্টে যোগ করুন'}
                        </button>
                    </div>
                </div>
            </div>`;
        container.innerHTML += productHTML;
    });
}

function renderStars(rating) {
    let stars = '';
    const fullStars = Math.floor(rating);
    const hasHalfStar = rating % 1 >= 0.5;
    for(let i=0;i<fullStars;i++) stars += '<i class="fas fa-star"></i>';
    if(hasHalfStar) stars += '<i class="fas fa-star-half-alt"></i>';
    for(let i=0;i<5-fullStars-(hasHalfStar?1:0);i++) stars += '<i class="far fa-star"></i>';
    return stars;
}

// ----------------- Cart Functions -----------------
function toggleCartItem(productId) {
    const product = products.find(p => p.id === productId);
    const quantity = parseInt(document.getElementById(`qty-${productId}`).value);
    const index = cart.findIndex(item => item.id===productId);

    if(index>-1) {
        cart.splice(index,1);
        document.getElementById(`cartBtn-${productId}`).innerHTML='<i class="fas fa-cart-plus"></i> কার্টে যোগ করুন';
        document.getElementById(`cartBtn-${productId}`).classList.remove('in-cart-btn');
        showNotification('পণ্য কার্ট থেকে সরানো হয়েছে','error');
    } else {
        cart.push({...product, quantity});
        document.getElementById(`cartBtn-${productId}`).innerHTML='<i class="fas fa-check"></i> কার্টে আছে';
        document.getElementById(`cartBtn-${productId}`).classList.add('in-cart-btn');
        showNotification('পণ্য কার্টে যোগ করা হয়েছে','success');
    }
    saveCart(); updateCartUI(); updateDashboard(); updateCharts();
}

function updateQuantity(productId, change) {
    const input = document.getElementById(`qty-${productId}`);
    let newVal = parseInt(input.value)+change;
    if(newVal<1) newVal=1; if(newVal>10) newVal=10;
    input.value = newVal;
    const idx = cart.findIndex(item=>item.id===productId);
    if(idx>-1){cart[idx].quantity=newVal; saveCart(); updateCartUI(); updateDashboard(); updateCharts();}
}

function updateQuantityInput(productId,value) {updateQuantity(productId, value-parseInt(document.getElementById(`qty-${productId}`).value));}

function updateCartUI() {
    const container = document.getElementById('cartItemsContainer');
    const totalItems = document.getElementById('cartTotalItems');
    const subtotalElem = document.getElementById('cartSubtotal');
    const totalElem = document.getElementById('cartTotal');

    const totalQuantity = cart.reduce((sum,item)=>sum+item.quantity,0);
    totalItems.textContent=totalQuantity;

    if(cart.length===0){
        container.innerHTML=`<div class="text-center py-5"><i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i><p>আপনার কার্টে কোনো পণ্য নেই</p></div>`;
        subtotalElem.textContent='৳ 0'; totalElem.textContent='৳ 0';
        updateCheckoutUI(0,110,110);
        return;
    }

    let html=''; let subtotal=0;
    cart.forEach(item=>{
        const itemTotal=item.price*item.quantity; subtotal+=itemTotal;
        html+=`<div class="cart-item">
            <img src="${item.images[0]}" class="cart-item-img" alt="${item.name}">
            <div class="cart-item-details">
                <h6>${item.name}</h6>
                <div class="d-flex justify-content-between align-items-center">
                    <div><span class="cart-item-price">৳ ${item.price} × ${item.quantity}</span><div class="text-muted small">মোট: ৳ ${itemTotal}</div></div>
                    <button class="remove-item" onclick="removeFromCart(${item.id})"><i class="fas fa-trash"></i></button>
                </div>
            </div>
        </div>`;
    });
    container.innerHTML=html;
    subtotalElem.textContent=`৳ ${subtotal}`;
    const delivery=110;
    totalElem.textContent=`৳ ${subtotal+delivery}`;
    updateCheckoutUI(subtotal,delivery,subtotal+delivery);
}

function removeFromCart(productId){cart=cart.filter(item=>item.id!==productId);
const btn=document.getElementById(`cartBtn-${productId}`);
if(btn){btn.innerHTML='<i class="fas fa-cart-plus"></i> কার্টে যোগ করুন'; btn.classList.remove('in-cart-btn');}
saveCart(); updateCartUI(); updateDashboard(); updateCharts(); showNotification('পণ্য কার্ট থেকে সরানো হয়েছে','error');}

function toggleCart(){
    const sidebar=document.getElementById('cartSidebar');
    const overlay=document.getElementById('cartOverlay');
    sidebar.classList.toggle('open');
    overlay.classList.toggle('show');
}

function updateDashboard(){
    const totalProducts=document.getElementById('totalProducts');
    const cartQuantity=document.getElementById('cartQuantity');
    const totalValue=document.getElementById('totalValue');
    const totalItems=cart.reduce((sum,item)=>sum+item.quantity,0);
    const subtotal=cart.reduce((sum,item)=>sum+item.price*item.quantity,0);
    totalProducts.textContent=products.length;
    cartQuantity.textContent=totalItems;
    totalValue.textContent=`৳ ${subtotal}`;
}

// ----------------- Checkout UI -----------------
function updateCheckoutUI(subtotal, delivery, total){
    const checkoutItems=document.getElementById('checkoutItems');
    const checkoutSubtotal=document.getElementById('checkoutSubtotal');
    const checkoutDelivery=document.getElementById('checkoutDelivery');
    const checkoutDiscount=document.getElementById('checkoutDiscount');
    const checkoutTotal=document.getElementById('checkoutTotal');

    if(cart.length===0){checkoutItems.innerHTML='<p class="text-center py-3">আপনার কার্টে কোনো পণ্য নেই</p>'; return;}
    let html='<div class="table-responsive"><table class="table"><thead><tr><th>পণ্য</th><th>পরিমাণ</th><th>মূল্য</th></tr></thead><tbody>';
    cart.forEach(item=>{html+=`<tr><td>${item.name}</td><td>${item.quantity}</td><td>৳ ${item.price*item.quantity}</td></tr>`;});
    html+='</tbody></table></div>';
    checkoutItems.innerHTML=html;

    let discount=0;
    if(subtotal>2000) discount=subtotal*0.1;
    checkoutSubtotal.textContent=`৳ ${subtotal}`;
    checkoutDelivery.textContent=`৳ ${delivery}`;
    checkoutDiscount.textContent=`৳ ${discount}`;
    checkoutTotal.textContent=`৳ ${subtotal-discount+delivery}`;
}

// ----------------- Charts -----------------
function initCharts(){
    const distributionCtx=document.getElementById('productDistributionChart').getContext('2d');
    charts.distribution=new Chart(distributionCtx,{type:'doughnut',data:{labels:['প্রিমিয়াম','কমফোর্ট','ট্রেডিশনাল','লাক্সারি','স্পোর্টস','সেট'],datasets:[{data:[0,0,0,0,0,0],backgroundColor:['#d4af37','#28a745','#007bff','#6f42c1','#fd7e14','#e83e8c'],borderWidth:2,borderColor:'#fff'}]},options:{responsive:true,plugins:{legend:{position:'bottom'}}}});
    const priceCtx=document.getElementById('priceAnalysisChart').getContext('2d');
    charts.price=new Chart(priceCtx,{type:'bar',data:{labels:[],datasets:[{label:'পণ্য মূল্য',data:[],backgroundColor:'#d4af37',borderColor:'#b8941f',borderWidth:1}]},options:{responsive:true,plugins:{legend:{display:false}},scales:{y:{beginAtZero:true,ticks:{callback:value=>'৳ '+value}}}}});
    updateCharts();
}

function updateCharts(){
    const categoryCounts={premium:0,comfort:0,traditional:0,luxury:0,sports:0,set:0};
    cart.forEach(item=>{if(categoryCounts[item.category]!==undefined) categoryCounts[item.category]+=item.quantity;});
    charts.distribution.data.datasets[0].data=[categoryCounts.premium,categoryCounts.comfort,categoryCounts.traditional,categoryCounts.luxury,categoryCounts.sports,categoryCounts.set];
    charts.distribution.update();
    charts.price.data.labels=cart.map(item=>item.name);
    charts.price.data.datasets[0].data=cart.map(item=>item.price*item.quantity);
    charts.price.update();
}

// ----------------- Utils -----------------
function showNotification(message,type='success'){
    const notification=document.getElementById('notification');
    const messageEl=document.getElementById('notificationMessage');
    messageEl.textContent=message;
    notification.style.background=type==='error'?'#dc3545':'#28a745';
    notification.classList.add('show');
    setTimeout(()=>notification.classList.remove('show'),3000);
}

function saveCart(){localStorage.setItem('loombongo_cart',JSON.stringify(cart));}
    </script>

</body>

</html>