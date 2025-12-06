<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loombongo – প্রিমিয়াম সিরাজগঞ্জ লুঙ্গি | Multi-Product Order System</title>

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
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),
                url('https://images.unsplash.com/photo-1576566588028-4147f3842f27?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');
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
                <a class="navbar-brand fw-bold fs-3" href="#" style="color: var(--primary);">LOOMBONGO</a>

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
                <span id="deliveryCharge">৳ ৬০</span>
            </div>
            <div class="d-flex justify-content-between mb-3 fw-bold fs-5">
                <span>মোট:</span>
                <span id="cartTotal">৳ ৬০</span>
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
                    <div class="hero-badge">
                        <i class="fas fa-award me-2"></i> ১০০% প্রিমিয়াম কোয়ালিটি
                    </div>
                    <h1 class="hero-title">খাঁটি সিরাজগঞ্জ লুঙ্গির ঐতিহ্য</h1>
                    <p class="fs-5 mb-4 opacity-90">
                        একাধিক প্রিমিয়াম লুঙ্গি একসাথে অর্ডার করুন, রিয়েল-টাইম কার্ট সিস্টেমে দেখুন আপনার নির্বাচিত
                        পণ্য এবং চেকআউট করুন সহজেই।
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#products" class="btn cta-btn">
                            <i class="fas fa-shopping-bag"></i> সব পণ্য দেখুন
                        </a>
                        <a href="#dashboard" class="btn cta-btn"
                            style="background: transparent; border: 2px solid var(--primary); color: var(--white);">
                            <i class="fas fa-chart-line"></i> ড্যাশবোর্ড দেখুন
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard Section -->
    <section id="dashboard" class="dashboard-section">
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

    <!-- Checkout Section -->
    <section id="checkout" class="checkout-section">
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
                            <strong>ডিসকাউন্ট অফার!</strong> ১০০০ টাকার বেশি অর্ডারে ১০% ডিসকাউন্ট
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
                                    <label class="form-label">জেলা *</label>
                                    <select class="form-select" id="customerDistrict" required>
                                        <option value="" selected disabled>জেলা নির্বাচন করুন</option>
                                        <option value="dhaka">ঢাকা</option>
                                        <option value="chittagong">চট্টগ্রাম</option>
                                        <option value="sylhet">সিলেট</option>
                                        <option value="rajshahi">রাজশাহী</option>
                                        <option value="khulna">খুলনা</option>
                                        <option value="barishal">বরিশাল</option>
                                        <option value="rangpur">রংপুর</option>
                                        <option value="mymensingh">ময়মনসিংহ</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">পেমেন্ট মেথড *</label>
                                    <select class="form-select" id="paymentMethod" required>
                                        <option value="cod" selected>ক্যাশ অন ডেলিভারি</option>
                                        <option value="bkash">bKash</option>
                                        <option value="nagad">Nagad</option>
                                        <option value="card">কার্ড পেমেন্ট</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">অর্ডার নোট (ঐচ্ছিক)</label>
                                    <textarea class="form-control" id="orderNote" rows="2" placeholder="বিশেষ নির্দেশনা থাকলে লিখুন"></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                                        <label class="form-check-label" for="agreeTerms">
                                            আমি <a href="#" class="text-primary">শর্তাবলী</a> এবং <a
                                                href="#" class="text-primary">প্রাইভেসি পলিসি</a> মেনে অর্ডার
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
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h4 class="text-white mb-3">LOOMBONGO</h4>
                    <p>প্রিমিয়াম কোয়ালিটির সিরাজগঞ্জ লুঙ্গি। বাঙালিয়ানার ঐতিহ্যকে আধুনিক কমফোর্টের সাথে মেলানোর
                        প্রতিশ্রুতি।</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5 class="text-white mb-3">যোগাযোগ</h5>
                    <p><i class="fas fa-phone-alt me-2"></i> হটলাইন: ০১৮৬৭৫৭২৮০৪</p>
                    <p><i class="far fa-clock me-2"></i> সময়: সকাল ৮টা - রাত ১০টা</p>
                    <p><i class="fas fa-envelope me-2"></i> ইমেইল: support@loombongo.com</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5 class="text-white mb-3">পেমেন্ট মেথড</h5>
                    <div class="d-flex gap-3 fs-4">
                        <i class="fab fa-cc-visa text-white"></i>
                        <i class="fab fa-cc-mastercard text-white"></i>
                        <i class="fab fa-cc-amex text-white"></i>
                        <i class="fas fa-money-bill-wave text-white"></i>
                    </div>
                    <p class="mt-3">সারা বাংলাদেশে ডেলিভারি</p>
                </div>
            </div>
            <hr class="bg-secondary">
            <div class="text-center pt-3">
                <p class="mb-0">© ২০২৩ Loombongo. সকল স্বত্ব সংরক্ষিত।</p>
            </div>
        </div>
    </footer>

    <!-- Notification -->
    <div class="notification" id="notification">
        <i class="fas fa-check-circle"></i>
        <span id="notificationMessage">পণ্য কার্টে যোগ করা হয়েছে</span>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Main Application Script -->
    <script>
        // Product Data
        const products = [{
                id: 1,
                name: "প্রিমিয়াম সিরাজগঞ্জ লুঙ্গি",
                description: "১০০% সুতি কাপড়, হ্যান্ডলুম তৈরি, পাকা রঙ",
                price: 550,
                oldPrice: 650,
                image: "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                category: "premium",
                badge: "বেস্টসেলার",
                rating: 4.5
            },
            {
                id: 2,
                name: "সফট কমফোর্ট কটন",
                description: "অতিরিক্ত নরম, চেক ডিজাইন, মিহি সুতা",
                price: 480,
                oldPrice: 560,
                image: "https://images.unsplash.com/photo-1560769629-975ec94e6a86?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                category: "comfort",
                badge: "নতুন",
                rating: 4.0
            },
            {
                id: 3,
                name: "ট্রেডিশনাল প্রিমিয়াম লুঙ্গি",
                description: "ঐতিহ্যবাহী ডিজাইন, প্রিমিয়াম ফেব্রিক, দীর্ঘস্থায়ী",
                price: 520,
                oldPrice: 600,
                image: "https://images.unsplash.com/photo-1544441893-675973e31985?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                category: "traditional",
                badge: "ক্লাসিক",
                rating: 5.0
            },
            {
                id: 4,
                name: "লাক্সারি কটন লুঙ্গি",
                description: "বিশেষ উৎসবের জন্য, জমকালো ডিজাইন, এক্সক্লুসিভ",
                price: 620,
                oldPrice: 720,
                image: "https://images.unsplash.com/photo-1567401893414-76b7b1e5a7a5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                category: "luxury",
                badge: "এক্সক্লুসিভ",
                rating: 4.7
            },
            {
                id: 5,
                name: "স্পোর্টস কটন লুঙ্গি",
                description: "হালকা ওজনের, দ্রুত শুকায়, স্বাচ্ছন্দ্যদায়ক",
                price: 450,
                oldPrice: 520,
                image: "https://images.unsplash.com/photo-1558769132-cb1f458a43be?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                category: "sports",
                badge: "স্পেশাল",
                rating: 4.3
            },
            {
                id: 6,
                name: "ডিজাইনার লুঙ্গি সেট",
                description: "২ পিস সেট, ম্যাচিং ডিজাইন, গিফট বক্স",
                price: 950,
                oldPrice: 1200,
                image: "https://images.unsplash.com/photo-1588854337236-6887d4ba7b89?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                category: "set",
                badge: "অফার",
                rating: 4.8
            }
        ];

        // Shopping Cart
        let cart = JSON.parse(localStorage.getItem('loombongo_cart')) || [];
        let charts = {};

        // Initialize Application
        document.addEventListener('DOMContentLoaded', function() {
            renderProducts();
            updateCartUI();
            updateDashboard();
            initCharts();

            // Cart Toggle
            document.getElementById('cartToggle').addEventListener('click', toggleCart);
            document.getElementById('closeCart').addEventListener('click', toggleCart);
            document.getElementById('cartOverlay').addEventListener('click', toggleCart);
            document.getElementById('goToCheckoutBtn').addEventListener('click', function() {
                toggleCart();
                document.getElementById('checkout').scrollIntoView({
                    behavior: 'smooth'
                });
            });
            document.getElementById('checkoutBtn').addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('checkout').scrollIntoView({
                    behavior: 'smooth'
                });
            });

            // Checkout Form Submission
            document.getElementById('checkoutForm').addEventListener('submit', placeOrder);

            // Smooth scrolling
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });

        // Render Products
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
                                <img src="${product.image}" class="product-img" alt="${product.name}">
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
                                    <div class="text-warning">
                                        ${renderStars(product.rating)}
                                    </div>
                                </div>
                                
                                <div class="quantity-selector">
                                    <button class="qty-btn" onclick="updateQuantity(${product.id}, -1)">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" class="qty-input" id="qty-${product.id}" 
                                           value="${quantity}" min="1" max="10" 
                                           onchange="updateQuantityInput(${product.id}, this.value)">
                                    <button class="qty-btn" onclick="updateQuantity(${product.id}, 1)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <span class="ms-2">টুকরা</span>
                                </div>
                                
                                <button class="add-to-cart-btn ${cartItem ? 'in-cart-btn' : ''}" 
                                        onclick="toggleCartItem(${product.id})"
                                        id="cartBtn-${product.id}">
                                    <i class="fas ${cartItem ? 'fa-check' : 'fa-cart-plus'}"></i>
                                    ${cartItem ? 'কার্টে আছে' : 'কার্টে যোগ করুন'}
                                </button>
                            </div>
                        </div>
                    </div>
                `;

                container.innerHTML += productHTML;
            });
        }

        // Render Star Rating
        function renderStars(rating) {
            let stars = '';
            const fullStars = Math.floor(rating);
            const hasHalfStar = rating % 1 >= 0.5;

            for (let i = 0; i < fullStars; i++) {
                stars += '<i class="fas fa-star"></i>';
            }

            if (hasHalfStar) {
                stars += '<i class="fas fa-star-half-alt"></i>';
            }

            const emptyStars = 5 - fullStars - (hasHalfStar ? 1 : 0);
            for (let i = 0; i < emptyStars; i++) {
                stars += '<i class="far fa-star"></i>';
            }

            return stars;
        }

        // Toggle Cart Item
        function toggleCartItem(productId) {
            const product = products.find(p => p.id === productId);
            const quantity = parseInt(document.getElementById(`qty-${productId}`).value);

            const existingIndex = cart.findIndex(item => item.id === productId);

            if (existingIndex > -1) {
                // Remove from cart
                cart.splice(existingIndex, 1);
                document.getElementById(`cartBtn-${productId}`).innerHTML =
                    '<i class="fas fa-cart-plus"></i> কার্টে যোগ করুন';
                document.getElementById(`cartBtn-${productId}`).classList.remove('in-cart-btn');
                showNotification('পণ্য কার্ট থেকে সরানো হয়েছে');
            } else {
                // Add to cart
                cart.push({
                    ...product,
                    quantity: quantity
                });
                document.getElementById(`cartBtn-${productId}`).innerHTML =
                    '<i class="fas fa-check"></i> কার্টে আছে';
                document.getElementById(`cartBtn-${productId}`).classList.add('in-cart-btn');
                showNotification('পণ্য কার্টে যোগ করা হয়েছে');
            }

            saveCart();
            updateCartUI();
            updateDashboard();
            updateCharts();
        }

        // Update Quantity
        function updateQuantity(productId, change) {
            const input = document.getElementById(`qty-${productId}`);
            let newValue = parseInt(input.value) + change;

            if (newValue < 1) newValue = 1;
            if (newValue > 10) newValue = 10;

            input.value = newValue;

            // Update cart if item exists
            const cartIndex = cart.findIndex(item => item.id === productId);
            if (cartIndex > -1) {
                cart[cartIndex].quantity = newValue;
                saveCart();
                updateCartUI();
                updateDashboard();
                updateCharts();
            }
        }

        function updateQuantityInput(productId, value) {
            let newValue = parseInt(value);

            if (isNaN(newValue) || newValue < 1) newValue = 1;
            if (newValue > 10) newValue = 10;

            document.getElementById(`qty-${productId}`).value = newValue;

            // Update cart if item exists
            const cartIndex = cart.findIndex(item => item.id === productId);
            if (cartIndex > -1) {
                cart[cartIndex].quantity = newValue;
                saveCart();
                updateCartUI();
                updateDashboard();
                updateCharts();
            }
        }

        // Update Cart UI
        function updateCartUI() {
            const cartItemsContainer = document.getElementById('cartItemsContainer');
            const cartTotalItems = document.getElementById('cartTotalItems');
            const cartSubtotal = document.getElementById('cartSubtotal');
            const cartTotal = document.getElementById('cartTotal');

            // Update cart count
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            cartTotalItems.textContent = totalItems;

            if (cart.length === 0) {
                cartItemsContainer.innerHTML = `
                    <div class="text-center py-5">
                        <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                        <p>আপনার কার্টে কোনো পণ্য নেই</p>
                    </div>
                `;
            } else {
                let itemsHTML = '';
                let subtotal = 0;

                cart.forEach(item => {
                    const itemTotal = item.price * item.quantity;
                    subtotal += itemTotal;

                    itemsHTML += `
                        <div class="cart-item">
                            <img src="${item.image}" class="cart-item-img" alt="${item.name}">
                            <div class="cart-item-details">
                                <h6 class="mb-1">${item.name}</h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="cart-item-price">৳ ${item.price} × ${item.quantity}</span>
                                        <div class="text-muted small">মোট: ৳ ${itemTotal}</div>
                                    </div>
                                    <button class="remove-item" onclick="removeFromCart(${item.id})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                });

                cartItemsContainer.innerHTML = itemsHTML;

                // Calculate delivery charge
                const deliveryCharge = subtotal > 1000 ? 0 : 60;
                const total = subtotal + deliveryCharge;

                // Update prices
                cartSubtotal.textContent = `৳ ${subtotal}`;
                document.getElementById('deliveryCharge').textContent = `৳ ${deliveryCharge}`;
                cartTotal.textContent = `৳ ${total}`;

                // Update checkout section
                updateCheckoutUI(subtotal, deliveryCharge, total);
            }
        }

        // Update Checkout UI
        function updateCheckoutUI(subtotal, deliveryCharge, total) {
            const checkoutItems = document.getElementById('checkoutItems');
            const checkoutSubtotal = document.getElementById('checkoutSubtotal');
            const checkoutDelivery = document.getElementById('checkoutDelivery');
            const checkoutTotal = document.getElementById('checkoutTotal');
            const checkoutDiscount = document.getElementById('checkoutDiscount');

            if (cart.length === 0) {
                checkoutItems.innerHTML = '<p class="text-center py-3">আপনার কার্টে কোনো পণ্য নেই</p>';
            } else {
                let itemsHTML =
                    '<div class="table-responsive"><table class="table"><thead><tr><th>পণ্য</th><th>পরিমাণ</th><th>মূল্য</th></tr></thead><tbody>';

                cart.forEach(item => {
                    itemsHTML += `
                        <tr>
                            <td>${item.name}</td>
                            <td>${item.quantity}</td>
                            <td>৳ ${item.price * item.quantity}</td>
                        </tr>
                    `;
                });

                itemsHTML += '</tbody></table></div>';
                checkoutItems.innerHTML = itemsHTML;
            }

            // Apply discount if applicable
            let discount = 0;
            if (subtotal > 1000) {
                discount = subtotal * 0.1; // 10% discount
                subtotal -= discount;
            }

            const finalTotal = subtotal + deliveryCharge;

            checkoutSubtotal.textContent = `৳ ${subtotal + discount}`; // Show original subtotal
            checkoutDelivery.textContent = `৳ ${deliveryCharge}`;
            checkoutDiscount.textContent = `৳ ${discount}`;
            checkoutTotal.textContent = `৳ ${finalTotal}`;
        }

        // Remove from Cart
        function removeFromCart(productId) {
            cart = cart.filter(item => item.id !== productId);

            // Update product button
            const cartBtn = document.getElementById(`cartBtn-${productId}`);
            if (cartBtn) {
                cartBtn.innerHTML = '<i class="fas fa-cart-plus"></i> কার্টে যোগ করুন';
                cartBtn.classList.remove('in-cart-btn');
            }

            saveCart();
            updateCartUI();
            updateDashboard();
            updateCharts();
            showNotification('পণ্য কার্ট থেকে সরানো হয়েছে');
        }

        // Toggle Cart Sidebar
        function toggleCart() {
            const sidebar = document.getElementById('cartSidebar');
            const overlay = document.getElementById('cartOverlay');

            if (sidebar.classList.contains('open')) {
                sidebar.classList.remove('open');
                overlay.classList.remove('show');
            } else {
                sidebar.classList.add('open');
                overlay.classList.add('show');
            }
        }

        // Update Dashboard
        function updateDashboard() {
            const totalProducts = document.getElementById('totalProducts');
            const cartQuantity = document.getElementById('cartQuantity');
            const totalValue = document.getElementById('totalValue');

            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);

            totalProducts.textContent = products.length;
            cartQuantity.textContent = totalItems;
            totalValue.textContent = `৳ ${subtotal}`;
        }

        // Initialize Charts
        function initCharts() {
            // Product Distribution Chart
            const distributionCtx = document.getElementById('productDistributionChart').getContext('2d');
            charts.distribution = new Chart(distributionCtx, {
                type: 'doughnut',
                data: {
                    labels: ['প্রিমিয়াম', 'কমফোর্ট', 'ট্রেডিশনাল', 'লাক্সারি', 'স্পোর্টস', 'সেট'],
                    datasets: [{
                        data: [0, 0, 0, 0, 0, 0],
                        backgroundColor: [
                            '#d4af37',
                            '#28a745',
                            '#007bff',
                            '#6f42c1',
                            '#fd7e14',
                            '#e83e8c'
                        ],
                        borderWidth: 2,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });

            // Price Analysis Chart
            const priceCtx = document.getElementById('priceAnalysisChart').getContext('2d');
            charts.price = new Chart(priceCtx, {
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
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '৳ ' + value;
                                }
                            }
                        }
                    }
                }
            });

            updateCharts();
        }

        // Update Charts
        function updateCharts() {
            // Update distribution chart
            const categoryCounts = {
                'premium': 0,
                'comfort': 0,
                'traditional': 0,
                'luxury': 0,
                'sports': 0,
                'set': 0
            };

            cart.forEach(item => {
                if (categoryCounts[item.category] !== undefined) {
                    categoryCounts[item.category] += item.quantity;
                }
            });

            charts.distribution.data.datasets[0].data = [
                categoryCounts.premium,
                categoryCounts.comfort,
                categoryCounts.traditional,
                categoryCounts.luxury,
                categoryCounts.sports,
                categoryCounts.set
            ];
            charts.distribution.update();

            // Update price analysis chart
            const cartNames = cart.map(item => item.name);
            const cartPrices = cart.map(item => item.price * item.quantity);

            charts.price.data.labels = cartNames;
            charts.price.data.datasets[0].data = cartPrices;
            charts.price.update();
        }

        // Place Order
        function placeOrder(e) {
            e.preventDefault();

            if (cart.length === 0) {
                showNotification('অর্ডার দিতে কমপক্ষে একটি পণ্য নির্বাচন করুন', 'error');
                return;
            }

            // Get form data
            const formData = {
                customerName: document.getElementById('customerName').value,
                customerPhone: document.getElementById('customerPhone').value,
                customerEmail: document.getElementById('customerEmail').value,
                customerAddress: document.getElementById('customerAddress').value,
                customerDistrict: document.getElementById('customerDistrict').value,
                paymentMethod: document.getElementById('paymentMethod').value,
                orderNote: document.getElementById('orderNote').value,
                cart: cart,
                subtotal: calculateSubtotal(),
                delivery: 60,
                total: calculateTotal(),
                orderDate: new Date().toISOString(),
                orderId: 'LOOM-' + Date.now()
            };

            // In a real application, you would send this to your Laravel backend
            console.log('Order Data:', formData);

            // Show success message
            const orderBtn = document.getElementById('placeOrderBtn');
            orderBtn.innerHTML = '<i class="fas fa-check-circle"></i> অর্ডার সফল!';
            orderBtn.classList.add('btn-success');

            // Reset after 3 seconds
            setTimeout(() => {
                // Clear cart
                cart = [];
                saveCart();
                updateCartUI();
                updateDashboard();
                updateCharts();

                // Reset product buttons
                products.forEach(product => {
                    const cartBtn = document.getElementById(`cartBtn-${product.id}`);
                    if (cartBtn) {
                        cartBtn.innerHTML = '<i class="fas fa-cart-plus"></i> কার্টে যোগ করুন';
                        cartBtn.classList.remove('in-cart-btn');
                        document.getElementById(`qty-${product.id}`).value = 1;
                    }
                });

                // Reset form
                document.getElementById('checkoutForm').reset();

                // Reset button
                orderBtn.innerHTML = '<i class="fas fa-paper-plane me-2"></i> অর্ডার সম্পূর্ণ করুন';
                orderBtn.classList.remove('btn-success');

                showNotification('আপনার অর্ডার সফলভাবে গ্রহণ করা হয়েছে!', 'success');
            }, 3000);
        }

        // Calculate Subtotal
        function calculateSubtotal() {
            return cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        }

        // Calculate Total
        function calculateTotal() {
            const subtotal = calculateSubtotal();
            let discount = 0;

            if (subtotal > 1000) {
                discount = subtotal * 0.1;
            }

            const deliveryCharge = subtotal > 1000 ? 0 : 60;
            return subtotal - discount + deliveryCharge;
        }

        // Show Notification
        function showNotification(message, type = 'success') {
            const notification = document.getElementById('notification');
            const messageEl = document.getElementById('notificationMessage');

            messageEl.textContent = message;

            // Set color based on type
            if (type === 'error') {
                notification.style.background = '#dc3545';
            } else if (type === 'success') {
                notification.style.background = '#28a745';
            }

            notification.classList.add('show');

            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
        }

        // Save Cart to Local Storage
        function saveCart() {
            localStorage.setItem('loombongo_cart', JSON.stringify(cart));
        }
    </script>
</body>

</html>
