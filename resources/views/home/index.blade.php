<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Dynamic Site Title --}}
    <title>{{ $settings->site_title ?? 'Loombongo' }} -প্রিমিয়াম সিরাজগঞ্জ লুঙ্গি | Multi-Product Order System</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Meta Description & Keywords --}}
    <meta name="description" content="{{ $settings->meta_description ?? ($settings->desc ?? '') }}">
    <meta name="keywords" content="{{ $settings->meta_keywords ?? '' }}">

    {{-- Indexing --}}
    @if (isset($settings->allow_indexing) && !$settings->allow_indexing)
        <meta name="robots" content="noindex, nofollow">
    @endif

    {{-- Favicon --}}
    <link rel="icon" type="image/png"
        href="{{ $settings->favicon ? asset('settings/' . $settings->favicon) : asset('image/logo.jpg') }}">
    <link rel="shortcut icon"
        href="{{ $settings->favicon ? asset('settings/' . $settings->favicon) : asset('image/logo.jpg') }}">

    {{-- Open Graph Image --}}
    <meta property="og:image"
        content="{{ $settings->logo ? asset('settings/' . $settings->logo) : asset('image/logo.jpg') }}">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Hind+Siliguri:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- Facebook Pixel --}}
    @if(!empty($settings->facebook_pixel))
        @php
            $pixelId = trim($settings->facebook_pixel);
        @endphp

        @if(preg_match('/^\d+$/', $pixelId))
            <script>
                !function (f, b, e, v, n, t, s) {
                    if (f.fbq) return; n = f.fbq = function () {
                        n.callMethod ?
                            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                    };
                    if (!f._fbq) f._fbq = n;
                    n.push = n; n.loaded = !0; n.version = '2.0';
                    n.queue = [];
                    t = b.createElement(e); t.async = !0;
                    t.src = v;
                    s = b.getElementsByTagName(e)[0];
                    s.parentNode.insertBefore(t, s)
                }
                    (window, document, 'script',
                        'https://connect.facebook.net/en_US/fbevents.js');

                fbq('init', '{{ $pixelId }}');
                fbq('track', 'PageView');
            </script>

            <noscript>
                <img height="1" width="1" style="display:none"
                    src="https://www.facebook.com/tr?id={{ $pixelId }}&ev=PageView&noscript=1" alt="">
            </noscript>
        @endif
    @endif


    <!-- Chart.js for Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- ✅ DataLayer Initialization - MUST be before GTM -->
    <script>
        window.dataLayer = window.dataLayer || [];
    </script>


    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5HV2P8NG');
    </script>
    <!-- End Google Tag Manager -->

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

        .chart-container {
            background: var(--white);
            border-radius: 15px;
            padding: 25px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }

        .footer {
            background: #111111;
            color: #aaa;
            padding: 3rem 0 1.5rem;
        }

        @media (max-width: 768px) {
            .cart-sidebar {
                width: 100%;
                right: -100%;
            }

            .hero-title {
                font-size: 2.2rem;
            }
        }

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

        /* ============================================
   PRODUCT ACTIONS (Add to Cart + Order Now)
   ============================================ */
        .product-actions {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .product-actions .add-to-cart-btn {
            flex: 1;
            margin: 0;
        }

        .order-now-btn {
            flex: 1;
            background: linear-gradient(135deg, #d4af37 0%, #b8941f 100%);
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.25);
            position: relative;
            overflow: hidden;
            font-family: 'Hind Siliguri', sans-serif;
        }

        .order-now-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4);
        }

        .order-now-btn:active {
            transform: translateY(-1px);
        }

        @media (max-width: 576px) {
            .product-actions {
                flex-direction: column;
            }

            .product-actions .add-to-cart-btn,
            .order-now-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- Header with Cart -->
    <header class="main-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand fw-bold fs-3" href="{{ route('home') }}">
                    @if (isset($settings->logo) && file_exists(public_path('settings/' . $settings->logo)))
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
                @foreach ($reviews as $review)
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
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= floor($review->rating))
                                                <i class="fas fa-star"></i>
                                            @elseif($i == ceil($review->rating) && $review->rating != floor($review->rating))
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
                                {{-- <div class="col-12">
                                    <input type="email" class="form-control" name="customer_email" id="customerEmail"
                                        placeholder="ইমেইল এড্রেস  (ঐচ্ছিক)">
                                </div> --}}
                                <div class="col-12">
                                    <textarea class="form-control" name="customer_address" id="customerAddress" rows="3"
                                        placeholder="পুরো ঠিকানা *" required></textarea>
                                </div>

                                {{-- <div class="col-md-6">
                                    <select class="form-select" name="payment_method" id="paymentMethod" required>
                                        <option value="cod" selected>ক্যাশ অন ডেলিভারি</option>
                                        <option value="bkash">bKash</option>
                                        <option value="nagad">Nagad</option>
                                        <option value="rocket">Rocket</option>
                                    </select>
                                </div> --}}
                                <input type="hidden" name="payment_method" value="cod" id="hiddenPaymentMethod">

                                {{-- <div class="col-12" id="paymentDetailsContainer" style="display:none;">
                                    <input type="text" class="form-control mb-2" name="account_number"
                                        id="accountNumber" placeholder="Account Number *">
                                    <input type="text" class="form-control" name="transaction_id" id="transactionId"
                                        placeholder="Transaction ID *">
                                </div> --}}

                                {{-- <div class="col-12">
                                    <textarea class="form-control" name="order_note" id="orderNote" rows="2"
                                        placeholder="অর্ডার নোট (ঐচ্ছিক)"></textarea>
                                </div> --}}

                                <!-- Hidden fields for cart items -->
                                <div id="cartHiddenFields"></div>

                                <!-- Totals -->
                                <input type="hidden" name="subtotal" id="hiddenSubtotal">
                                <input type="hidden" name="discount" id="hiddenDiscount">
                                <input type="hidden" name="delivery" id="hiddenDelivery">
                                <input type="hidden" name="total" id="hiddenTotal">

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" checked type="checkbox" id="agreeTerms"
                                            required>
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

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h4 class="text-white mb-3">{{ $settings->site_title ?? 'LOOMBONGO' }}</h4>
                    <p>{{ $settings->desc ??
    'প্রিমিয়াম কোয়ালিটির সিরাজগঞ্জ লুঙ্গি। বাঙালিয়ানার ঐতিহ্যকে আধুনিক
                                                                কমফোর্টের সাথে মেলানোর প্রতিশ্রুতি।' }}
                    </p>
                </div>

                <div class="col-lg-4 mb-4">
                    <h5 class="text-white mb-3">যোগাযোগ</h5>
                    <p><i class="fas fa-phone-alt me-2"></i> হটলাইন:
                        <a href="tel:{{ $settings->hotline ?? '01867572804' }}" onclick="trackGenerateLead('hotline')"
                            style="color: #aaa; text-decoration: none;">
                            {{ $settings->hotline ?? '০১৮৬৭৫৭২৮০৪' }}
                        </a>
                    </p>
                    <p><i class="far fa-clock me-2"></i> সময়: {{ $settings->time ?? 'সকাল ৮টা - রাত ১০টা' }}</p>
                    <p><i class="fas fa-envelope me-2"></i> ইমেইল: {{ $settings->mail ?? 'support@loombongo.com' }}
                    </p>
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
    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/8801938028924" class="floating-whatsapp" target="_blank" rel="noopener noreferrer"
        aria-label="Chat with us on WhatsApp" title="Chat with us on WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor"
            aria-hidden="true">
            <path
                d="M20.52 3.48A11.86 11.86 0 0 0 12.08 0C5.5 0 .14 5.36.14 11.94c0 2.1.55 4.15 1.6 5.96L.04 24l6.25-1.64a11.9 11.9 0 0 0 5.79 1.47h.01c6.58 0 11.94-5.36 11.94-11.94a11.86 11.86 0 0 0-3.51-8.41ZM12.09 21.8a9.9 9.9 0 0 1-5.05-1.39l-.36-.21-3.71.97.99-3.62-.23-.37a9.84 9.84 0 0 1-1.51-5.24c0-5.45 4.44-9.89 9.9-9.89a9.83 9.83 0 0 1 7 2.9 9.83 9.83 0 0 1 2.9 7c0 5.45-4.44 9.89-9.9 9.89Zm5.43-7.4c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.95 1.17-.17.2-.35.22-.65.07-.3-.15-1.25-.46-2.38-1.46-.88-.78-1.47-1.75-1.64-2.05-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.03-.52-.07-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51l-.57-.01c-.2 0-.52.07-.8.37-.27.3-1.04 1.02-1.04 2.49 0 1.47 1.07 2.89 1.22 3.09.15.2 2.1 3.21 5.08 4.5.71.31 1.27.49 1.7.62.71.23 1.36.2 1.87.12.57-.08 1.76-.72 2.01-1.42.25-.7.25-1.3.17-1.42-.07-.12-.27-.2-.57-.35Z" />
        </svg>
    </a>

    <style>
        .floating-whatsapp {
            position: fixed;
            right: 20px;
            bottom: 20px;
            width: 60px;
            height: 60px;
            background-color: #25D366;
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
            z-index: 99999;
            text-decoration: none;
            transition: transform 0.2s ease, background-color 0.2s ease;
        }

        .floating-whatsapp:hover {
            background-color: #1ebe5d;
            transform: scale(1.08);
        }

        @media (max-width: 768px) {
            .floating-whatsapp {
                width: 54px;
                height: 54px;
                right: 15px;
                bottom: 15px;
            }

            .floating-whatsapp svg {
                width: 29px;
                height: 29px;
            }
        }
    </style>

    <!-- Notification -->
    <div class="notification" id="notification">
        <i class="fas fa-check-circle"></i>
        <span id="notificationMessage">পণ্য কার্টে যোগ করা হয়েছে</span>
    </div>

    {{-- Custom Footer Scripts --}}
    @if (!empty($settings->custom_footer_scripts))
        {!! $settings->custom_footer_scripts !!}
    @endif

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // ============================================
        // SESSION MESSAGES (SweetAlert)
        // ============================================
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'সফল!',
                text: '{{ session('success') }}',
                confirmButtonText: 'ঠিক আছে'
            });
            // ✅ Order success → cart clear (form submit-এ নয়, এখানে)
            localStorage.removeItem('loombongo_cart');
            localStorage.removeItem('last_order');
        @endif

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'ত্রুটি!',
                html: '{!! implode('<br>', $errors->all()) !!}',
                confirmButtonText: 'ঠিক আছে'
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'ত্রুটি!',
                text: '{{ session('error') }}',
                confirmButtonText: 'ঠিক আছে'
            });
        @endif
    </script>


    <script>
        // ============================================
        // GLOBAL VARIABLES
        // ============================================
        let products = [];
        let cart = JSON.parse(localStorage.getItem('loombongo_cart')) || [];
        let charts = {};
        let checkoutTracked = false;

        // ============================================
        // DATALAYER HELPER
        // ============================================
        function dlPush(eventName, data) {
            window.dataLayer = window.dataLayer || [];
            if (data && data.ecommerce) {
                window.dataLayer.push({ ecommerce: null });
            }
            window.dataLayer.push({ event: eventName, ...data });
        }

        // PAGE VIEW
        dlPush('page_view', {
            page_title: document.title,
            page_location: window.location.href,
            page_path: window.location.pathname,
            currency: 'BDT'
        });

        // ============================================
        // VIEW ITEM LIST
        // ============================================
        function trackViewItemList() {
            if (!products || products.length === 0) return;
            dlPush('view_item_list', {
                ecommerce: {
                    item_list_name: 'Loombongo Landing Page',
                    currency: 'BDT',
                    items: products.map((p, idx) => ({
                        item_id: String(p.id),
                        item_name: p.name,
                        item_category: p.category || 'lungi',
                        price: parseFloat(p.price),
                        index: idx,
                        quantity: 1
                    }))
                }
            });
        }

        // ============================================
        // ADD TO CART
        // ============================================
        function trackAddToCart(product, quantity) {
            dlPush('add_to_cart', {
                ecommerce: {
                    currency: 'BDT',
                    value: parseFloat(product.price) * quantity,
                    items: [{
                        item_id: String(product.id),
                        item_name: product.name,
                        item_category: product.category || 'lungi',
                        price: parseFloat(product.price),
                        quantity: quantity
                    }]
                }
            });
        }

        // ============================================
        // BEGIN CHECKOUT
        // ============================================
        function trackBeginCheckout() {
            if (checkoutTracked || cart.length === 0) return;
            const subtotal = cart.reduce((sum, i) => sum + i.price * i.quantity, 0);
            const discount = subtotal > 2000 ? subtotal * 0.1 : 0;
            const total = subtotal - discount + 110;

            dlPush('begin_checkout', {
                ecommerce: {
                    currency: 'BDT',
                    value: total,
                    coupon: discount > 0 ? 'BULK10' : undefined,
                    items: cart.map(item => ({
                        item_id: String(item.id),
                        item_name: item.name,
                        item_category: item.category || 'lungi',
                        price: parseFloat(item.price),
                        quantity: item.quantity
                    }))
                }
            });
            checkoutTracked = true;
        }

        // ============================================
        // PURCHASE
        // ============================================
        function trackPurchase() {
            if (cart.length === 0) return;

            const subtotal = cart.reduce((sum, i) => sum + i.price * i.quantity, 0);
            const discount = subtotal > 2000 ? subtotal * 0.1 : 0;
            const delivery = 110;
            const total = subtotal - discount + delivery;
            const transactionId = 'ORD-' + Date.now() + '-' + Math.floor(Math.random() * 1000);

            const customerName = (document.getElementById('customerName')?.value || '').trim();
            const nameParts = customerName.split(' ').filter(Boolean);
            const firstName = nameParts[0] || '';
            const lastName = nameParts.slice(1).join(' ') || '';

            const userData = {
                email: (document.getElementById('customerEmail')?.value || '').trim(),
                phone: (document.getElementById('customerPhone')?.value || '').trim(),
                first_name: firstName,
                last_name: lastName,
                country: 'BD',
                city: (document.getElementById('customerCity')?.value || '').trim() || undefined,
                postal_code: (document.getElementById('customerPostal')?.value || '').trim() || undefined,
                coupon: discount > 0 ? 'BULK10' : undefined
            };

            localStorage.setItem('last_order', JSON.stringify({
                transaction_id: transactionId,
                value: total,
                items: cart,
                user_data: userData
            }));

            dlPush('purchase', {
                user_data: userData,
                ecommerce: {
                    transaction_id: transactionId,
                    value: total,
                    tax: 0,
                    shipping: delivery,
                    currency: 'BDT',
                    coupon: discount > 0 ? 'BULK10' : undefined,
                    items: cart.map(item => ({
                        item_id: String(item.id),
                        item_name: item.name,
                        item_category: item.category || 'lungi',
                        price: parseFloat(item.price),
                        quantity: item.quantity
                    }))
                }
            });
        }

        // ============================================
        // GENERATE LEAD
        // ============================================
        function trackGenerateLead(source) {
            dlPush('generate_lead', {
                currency: 'BDT',
                value: 0,
                lead_source: source
            });
        }

        // ============================================
        // HIDDEN CART FIELDS
        // ============================================
        function updateHiddenCartFields() {
            const container = document.getElementById('cartHiddenFields');
            if (!container) return;
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

            if (subtotal > 2000) discount = subtotal * 0.1;
            const total = subtotal - discount + delivery;

            const hiddenSubtotal = document.getElementById('hiddenSubtotal');
            const hiddenDiscount = document.getElementById('hiddenDiscount');
            const hiddenDelivery = document.getElementById('hiddenDelivery');
            const hiddenTotal = document.getElementById('hiddenTotal');

            if (hiddenSubtotal) hiddenSubtotal.value = subtotal;
            if (hiddenDiscount) hiddenDiscount.value = discount;
            if (hiddenDelivery) hiddenDelivery.value = delivery;
            if (hiddenTotal) hiddenTotal.value = total;
        }

        // ============================================
        // LOAD PRODUCTS
        // ============================================
        const productsJsonUrl = "{{ route('products.json') }}";

        async function loadProductsFromServer() {
            try {
                const res = await fetch(productsJsonUrl);
                const text = await res.text();
                products = JSON.parse(text);
            } catch (error) {
                console.error("Could not load products:", error);
            }
        }

        // ============================================
        // RENDER PRODUCTS
        // ============================================
        function generateCarousel(product) {
            const carouselId = `carousel-${product.id}`;
            let indicators = "", slides = "";
            product.images.forEach((img, index) => {
                indicators += `<button type="button" data-bs-target="#${carouselId}" data-bs-slide-to="${index}" class="${index === 0 ? 'active' : ''}"></button>`;
                slides += `<div class="carousel-item ${index === 0 ? 'active' : ''}"><img src="${img}" class="d-block w-100 product-img" alt="${product.name}"></div>`;
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
                                <div>
                                    <span class="product-price">৳ ${product.price}</span>
                                    ${product.oldPrice ? `<span class="product-old-price">৳ ${product.oldPrice}</span>` : ''}
                                </div>
                                <div class="text-warning">${renderStars(product.rating)}</div>
                            </div>
                            <div class="quantity-selector">
                                <button class="qty-btn" onclick="updateQuantity(${product.id}, -1)"><i class="fas fa-minus"></i></button>
                                <input type="number" class="qty-input" id="qty-${product.id}" value="${quantity}" min="1" max="10" onchange="updateQuantityInput(${product.id}, this.value)">
                                <button class="qty-btn" onclick="updateQuantity(${product.id}, 1)"><i class="fas fa-plus"></i></button>
                                <span class="ms-2">টি</span>
                            </div>
                            <div class="product-actions">
                                <button class="add-to-cart-btn ${cartItem ? 'in-cart-btn' : ''}" onclick="toggleCartItem(${product.id})" id="cartBtn-${product.id}">
                                    <i class="fas ${cartItem ? 'fa-check' : 'fa-cart-plus'}"></i> ${cartItem ? 'কার্টে আছে' : 'কার্টে যোগ করুন'}
                                </button>
                                <button class="order-now-btn" onclick="orderNow(${product.id})">
                                    <i class="fas fa-bolt"></i> এখনই অর্ডার
                                </button>
                            </div>
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
            for (let i = 0; i < fullStars; i++) stars += '<i class="fas fa-star"></i>';
            if (hasHalfStar) stars += '<i class="fas fa-star-half-alt"></i>';
            for (let i = 0; i < 5 - fullStars - (hasHalfStar ? 1 : 0); i++) stars += '<i class="far fa-star"></i>';
            return stars;
        }

        // ============================================
        // ORDER NOW
        // ============================================
        function orderNow(productId) {
            const product = products.find(p => p.id === productId);
            if (!product) return;

            const quantity = parseInt(document.getElementById(`qty-${productId}`).value) || 1;
            const index = cart.findIndex(item => item.id === productId);

            if (index === -1) {
                cart.push({ ...product, quantity });
                saveCart();
                updateCartUI();
                updateDashboard();
                updateCharts();
                updateHiddenCartFields();

                const btn = document.getElementById(`cartBtn-${productId}`);
                if (btn) {
                    btn.innerHTML = '<i class="fas fa-check"></i> কার্টে আছে';
                    btn.classList.add('in-cart-btn');
                }
                trackAddToCart(product, quantity);
            } else {
                cart[index].quantity = quantity;
                saveCart();
                updateCartUI();
                updateDashboard();
                updateCharts();
                updateHiddenCartFields();
            }

            trackBeginCheckout();
            showNotification(`⚡ ${product.name} - অর্ডার ফর্মে নিয়ে যাওয়া হচ্ছে`, 'success');

            setTimeout(() => {
                const checkoutSection = document.getElementById('checkout');
                checkoutSection.scrollIntoView({ behavior: 'smooth', block: 'start' });

                checkoutSection.style.transition = 'box-shadow 0.6s ease';
                checkoutSection.style.boxShadow = '0 0 40px rgba(212, 175, 55, 0.6)';
                setTimeout(() => { checkoutSection.style.boxShadow = ''; }, 2000);

                setTimeout(() => {
                    document.getElementById('customerName')?.focus();
                }, 800);
            }, 100);
        }

        // ============================================
        // CART FUNCTIONS
        // ============================================
        function toggleCartItem(productId) {
            const product = products.find(p => p.id === productId);
            const quantity = parseInt(document.getElementById(`qty-${productId}`).value);
            const index = cart.findIndex(item => item.id === productId);

            if (index > -1) {
                cart.splice(index, 1);
                document.getElementById(`cartBtn-${productId}`).innerHTML = '<i class="fas fa-cart-plus"></i> কার্টে যোগ করুন';
                document.getElementById(`cartBtn-${productId}`).classList.remove('in-cart-btn');
                showNotification('পণ্য কার্ট থেকে সরানো হয়েছে', 'error');
            } else {
                cart.push({ ...product, quantity });
                document.getElementById(`cartBtn-${productId}`).innerHTML = '<i class="fas fa-check"></i> কার্টে আছে';
                document.getElementById(`cartBtn-${productId}`).classList.add('in-cart-btn');
                showNotification('পণ্য কার্টে যোগ করা হয়েছে', 'success');
                trackAddToCart(product, quantity);
            }

            saveCart();
            updateCartUI();
            updateDashboard();
            updateCharts();
            updateHiddenCartFields();
        }

        function updateQuantity(productId, change) {
            const input = document.getElementById(`qty-${productId}`);
            let newVal = parseInt(input.value) + change;
            if (newVal < 1) newVal = 1;
            if (newVal > 10) newVal = 10;
            input.value = newVal;

            const idx = cart.findIndex(item => item.id === productId);
            if (idx > -1) {
                cart[idx].quantity = newVal;
                saveCart();
                updateCartUI();
                updateDashboard();
                updateCharts();
                updateHiddenCartFields();
            }
        }

        function updateQuantityInput(productId, value) {
            updateQuantity(productId, value - parseInt(document.getElementById(`qty-${productId}`).value));
        }

        function updateCartUI() {
            const container = document.getElementById('cartItemsContainer');
            const totalItems = document.getElementById('cartTotalItems');
            const subtotalElem = document.getElementById('cartSubtotal');
            const totalElem = document.getElementById('cartTotal');

            const totalQuantity = cart.reduce((sum, item) => sum + item.quantity, 0);
            totalItems.textContent = totalQuantity;

            if (cart.length === 0) {
                container.innerHTML = `<div class="text-center py-5"><i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i><p>আপনার কার্টে কোনো পণ্য নেই</p></div>`;
                subtotalElem.textContent = '৳ 0';
                totalElem.textContent = '৳ 0';
                updateCheckoutUI(0, 110, 110);
                return;
            }

            let html = '';
            let subtotal = 0;
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                subtotal += itemTotal;
                html += `<div class="cart-item">
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
            container.innerHTML = html;
            subtotalElem.textContent = `৳ ${subtotal}`;
            const delivery = 110;
            totalElem.textContent = `৳ ${subtotal + delivery}`;
            updateCheckoutUI(subtotal, delivery, subtotal + delivery);
        }

        function removeFromCart(productId) {
            cart = cart.filter(item => item.id !== productId);
            const btn = document.getElementById(`cartBtn-${productId}`);
            if (btn) {
                btn.innerHTML = '<i class="fas fa-cart-plus"></i> কার্টে যোগ করুন';
                btn.classList.remove('in-cart-btn');
            }
            saveCart();
            updateCartUI();
            updateDashboard();
            updateCharts();
            updateHiddenCartFields();
            showNotification('পণ্য কার্ট থেকে সরানো হয়েছে', 'error');
        }

        function toggleCart() {
            const sidebar = document.getElementById('cartSidebar');
            const overlay = document.getElementById('cartOverlay');
            sidebar.classList.toggle('open');
            overlay.classList.toggle('show');
        }

        function updateDashboard() {
            const totalProducts = document.getElementById('totalProducts');
            const cartQuantity = document.getElementById('cartQuantity');
            const totalValue = document.getElementById('totalValue');
            if (!totalProducts) return;
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            const subtotal = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
            totalProducts.textContent = products.length;
            cartQuantity.textContent = totalItems;
            totalValue.textContent = `৳ ${subtotal}`;
        }

        // ============================================
        // CHECKOUT UI
        // ============================================
        function updateCheckoutUI(subtotal, delivery, total) {
            const checkoutItems = document.getElementById('checkoutItems');
            const checkoutSubtotal = document.getElementById('checkoutSubtotal');
            const checkoutDelivery = document.getElementById('checkoutDelivery');
            const checkoutDiscount = document.getElementById('checkoutDiscount');
            const checkoutTotal = document.getElementById('checkoutTotal');

            if (cart.length === 0) {
                checkoutItems.innerHTML = '<p class="text-center py-3">আপনার কার্টে কোনো পণ্য নেই</p>';
                return;
            }
            let html = '<div class="table-responsive"><table class="table"><thead><tr><th>পণ্য</th><th>পরিমাণ</th><th>মূল্য</th></tr></thead><tbody>';
            cart.forEach(item => {
                html += `<tr><td>${item.name}</td><td>${item.quantity}</td><td>৳ ${item.price * item.quantity}</td></tr>`;
            });
            html += '</tbody></table></div>';
            checkoutItems.innerHTML = html;

            let discount = 0;
            if (subtotal > 2000) discount = subtotal * 0.1;
            checkoutSubtotal.textContent = `৳ ${subtotal}`;
            checkoutDelivery.textContent = `৳ ${delivery}`;
            checkoutDiscount.textContent = `৳ ${discount}`;
            checkoutTotal.textContent = `৳ ${subtotal - discount + delivery}`;
        }

        // ============================================
        // CHARTS
        // ============================================
        function initCharts() {
            const distEl = document.getElementById('productDistributionChart');
            const priceEl = document.getElementById('priceAnalysisChart');

            if (distEl) {
                charts.distribution = new Chart(distEl.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: ['প্রিমিয়াম', 'কমফোর্ট', 'ট্রেডিশনাল', 'লাক্সারি', 'স্পোর্টস', 'সেট'],
                        datasets: [{
                            data: [0, 0, 0, 0, 0, 0],
                            backgroundColor: ['#d4af37', '#28a745', '#007bff', '#6f42c1', '#fd7e14', '#e83e8c'],
                            borderWidth: 2,
                            borderColor: '#fff'
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: { legend: { position: 'bottom' } }
                    }
                });
            }

            if (priceEl) {
                charts.price = new Chart(priceEl.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: [],
                        datasets: [{
                            label: 'পণ্য মূল্য',
                            data: [],
                            backgroundColor: '#d4af37',
                            borderColor: '#b8941f',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: { legend: { display: false } },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: { callback: value => '৳ ' + value }
                            }
                        }
                    }
                });
            }

            updateCharts();
        }

        function updateCharts() {
            if (!charts.distribution || !charts.price) return;

            const categoryCounts = { premium: 0, comfort: 0, traditional: 0, luxury: 0, sports: 0, set: 0 };
            cart.forEach(item => {
                if (categoryCounts[item.category] !== undefined) categoryCounts[item.category] += item.quantity;
            });

            charts.distribution.data.datasets[0].data = [
                categoryCounts.premium, categoryCounts.comfort, categoryCounts.traditional,
                categoryCounts.luxury, categoryCounts.sports, categoryCounts.set
            ];
            charts.distribution.update();

            charts.price.data.labels = cart.map(item => item.name);
            charts.price.data.datasets[0].data = cart.map(item => item.price * item.quantity);
            charts.price.update();
        }

        // ============================================
        // UTILS
        // ============================================
        function showNotification(message, type = 'success') {
            const notification = document.getElementById('notification');
            const messageEl = document.getElementById('notificationMessage');
            messageEl.textContent = message;
            notification.style.background = type === 'error' ? '#dc3545' : '#28a745';
            notification.classList.add('show');
            setTimeout(() => notification.classList.remove('show'), 3000);
        }

        function saveCart() {
            localStorage.setItem('loombongo_cart', JSON.stringify(cart));
        }

        // ============================================
        // DOM CONTENT LOADED
        // ============================================
        document.addEventListener("DOMContentLoaded", async function () {

            await loadProductsFromServer();

            renderProducts();
            updateCartUI();
            updateDashboard();
            initCharts();
            updateHiddenCartFields();

            setTimeout(trackViewItemList, 500);

            document.getElementById('cartToggle').addEventListener('click', toggleCart);
            document.getElementById('closeCart').addEventListener('click', toggleCart);
            document.getElementById('cartOverlay').addEventListener('click', toggleCart);

            document.getElementById('goToCheckoutBtn').addEventListener('click', function () {
                trackBeginCheckout();
                toggleCart();
                document.getElementById('checkout').scrollIntoView({ behavior: 'smooth' });
            });

            document.getElementById('checkoutBtn').addEventListener('click', function (e) {
                e.preventDefault();
                trackBeginCheckout();
                document.getElementById('checkout').scrollIntoView({ behavior: 'smooth' });
            });

            document.getElementById('checkoutForm').addEventListener('submit', function (e) {
                if (cart.length === 0) {
                    e.preventDefault();
                    alert('কমপক্ষে একটি পণ্য নির্বাচন করুন');
                    return;
                }
                updateHiddenCartFields();
                trackPurchase();
            });
        });
    </script>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5HV2P8NG" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

</body>

</html>