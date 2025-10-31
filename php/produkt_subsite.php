<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UnitMate - Detail produktu</title>
    <link rel="stylesheet" href="../css/default.css">
    <style>
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .logo img {
            height: 40px;
            width: auto;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #0f2557;
            --secondary: #1e3a8a;
            --accent: #3b82f6;
            --light: #f8fafc;
            --text: #1e293b;
            --success: #22c55e;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            color: var(--text);
            line-height: 1.6;
            background: var(--light);
        }

        /* Navbar */
        nav {
            background: var(--primary);
            padding: 1rem 2rem;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            text-decoration: none;
        }

        .logo img {
            max-height: 40px;
            margin-right: 10px;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
            font-weight: 500;
        }

        .nav-links a:hover {
            color: var(--accent);
        }

        .menu-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 5px;
        }

        .menu-toggle span {
            width: 25px;
            height: 3px;
            background: white;
            transition: all 0.3s;
        }

        .menu-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(8px, 8px);
        }

        .menu-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .menu-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        /* Product Container */
        .product-container {
            max-width: 1200px;
            margin: 100px auto 40px;
            padding: 0 2rem;
        }

        .breadcrumb {
            margin-bottom: 2rem;
            color: #64748b;
            font-size: 0.9rem;
        }

        .breadcrumb a {
            color: var(--accent);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .product-main {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            background: white;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.08);
            margin-bottom: 3rem;
        }

        /* Image Carousel */
        .product-images {
            position: relative;
        }

        .carousel-container {
            position: relative;
            width: 100%;
            border-radius: 15px;
            overflow: hidden;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .carousel-slide {
            display: none;
            width: 100%;
            height: auto;
            align-items: center;
            justify-content: center;
        }

        .carousel-slide.active {
            display: flex;
        }

        .carousel-slide img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
            display: block;
        }

        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.9);
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s;
            z-index: 10;
        }

        .carousel-btn:hover {
            background: white;
        }

        .carousel-btn.prev {
            left: 15px;
        }

        .carousel-btn.next {
            right: 15px;
        }

        .carousel-indicators {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #cbd5e1;
            cursor: pointer;
            transition: background 0.3s;
        }

        .indicator.active {
            background: var(--accent);
        }

        /* Product Info */
        .product-info {
            display: flex;
            flex-direction: column;
        }

        .product-name {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .product-description {
            font-size: 1.1rem;
            color: #64748b;
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .product-price {
            font-size: 3rem;
            font-weight: 900;
            color: var(--accent);
            margin-bottom: 2rem;
        }

        .product-availability {
            display: inline-block;
            padding: 0.5rem 1.2rem;
            border-radius: 25px;
            font-weight: 600;
            margin-bottom: 2rem;
            background: #dcfce7;
            color: #15803d;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .quantity-label {
            font-weight: 600;
            color: var(--text);
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: #f1f5f9;
            padding: 0.5rem 1rem;
            border-radius: 50px;
        }

        .quantity-btn {
            background: white;
            border: none;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s;
        }

        .quantity-btn:hover {
            background: var(--accent);
            color: white;
        }

        .quantity-value {
            min-width: 30px;
            text-align: center;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .add-to-cart-btn {
            background: var(--primary);
            color: white;
            padding: 1.2rem 3rem;
            border: none;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 5px 20px rgba(15, 37, 87, 0.3);
        }

        .add-to-cart-btn:hover {
            background: var(--secondary);
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(15, 37, 87, 0.4);
        }

        /* Parameters Section */
        .product-parameters {
            background: white;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.08);
            margin-bottom: 3rem;
        }

        .parameters-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 2rem;
        }

        .parameters-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .parameter-item {
            display: flex;
            justify-content: space-between;
            padding: 1rem;
            background: var(--light);
            border-radius: 10px;
            border-left: 4px solid var(--accent);
        }

        .parameter-label {
            font-weight: 600;
            color: var(--text);
        }

        .parameter-value {
            color: #64748b;
            text-align: right;
        }

        /* Footer */
        footer {
            background: var(--primary);
            color: white;
            padding: 3rem 2rem 1rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .footer-section p,
        .footer-section a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
        }

        .footer-section a:hover {
            color: white;
        }

        .copyright {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.6);
        }

        /* profile / auth styles */
        .profile-wrap {
            position: relative;
            font-family: inherit;
        }

        .profile-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: transparent;
            border: none;
            color: white;
            cursor: pointer;
            font-weight: 700;
            padding: 6px 10px;
            border-radius: 8px;
            font-size: 0.95rem;
        }

        .profile-icon svg {
            width: 18px;
            height: 18px;
            fill: white;
            opacity: 0.95;
            display: block;
        }

        .profile-name {
            color: white;
            white-space: nowrap;
        }

        .profile-caret {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.8rem;
        }

        .profile-dropdown {
            display: none;
            position: absolute;
            right: 0;
            top: calc(100% + 8px);
            background: white;
            border-radius: 10px;
            box-shadow: 0 8px 30px rgba(16, 24, 40, 0.12);
            overflow: hidden;
            min-width: 200px;
            z-index: 1500;
            font-size: 0.95rem;
        }

        .profile-item {
            display: block;
            padding: 10px 14px;
            color: var(--text);
            text-decoration: none;
            background: transparent;
            border: 0;
            width: 100%;
            text-align: left;
            cursor: pointer;
        }

        .profile-item:hover {
            background: #f8fafc;
        }

        .profile-item.logout {
            background: #fff7f7;
            color: #b91c1c;
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: flex;
            }

            .nav-links {
                position: fixed;
                left: -100%;
                top: 60px;
                flex-direction: column;
                background: var(--primary);
                width: 100%;
                text-align: center;
                transition: left 0.3s;
                padding: 2rem 0;
                gap: 0;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            }

            .nav-links.active {
                left: 0;
            }

            .nav-links li {
                padding: 1rem 0;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .product-main {
                grid-template-columns: 1fr;
                padding: 2rem;
                gap: 2rem;
            }

            .product-name {
                font-size: 2rem;
            }

            .product-price {
                font-size: 2.5rem;
            }

            .carousel-slide {
                font-size: 5rem;
            }

            .carousel-btn {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }

            .parameters-grid {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <?php require './header.php'; ?> 

    <!-- Product Container -->
    <div class="product-container">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="#produkty">Produkty</a> / <span id="breadcrumb-product">Smart Door Lock</span>
        </div>

        <!-- Product Main Section -->
        <div class="product-main">
            <!-- Image Carousel -->
            <div class="product-images">
                <div class="carousel-container">
                    <div class="carousel-slide active">🔐</div>
                    <div class="carousel-slide">🔒</div>
                    <div class="carousel-slide">📱</div>

                    <button class="carousel-btn prev" onclick="changeSlide(-1)">‹</button>
                    <button class="carousel-btn next" onclick="changeSlide(1)">›</button>
                </div>
                <div class="carousel-indicators">
                    <span class="indicator active" onclick="goToSlide(0)"></span>
                    <span class="indicator" onclick="goToSlide(1)"></span>
                    <span class="indicator" onclick="goToSlide(2)"></span>
                </div>
            </div>

            <!-- Product Info -->
            <div class="product-info">
                <h1 class="product-name">Smart Door Lock</h1>
                <p class="product-description">
                    Inteligentný zámok s pokročilým šifrovaním a ovládaním cez mobilnú aplikáciu.
                    Ponúka viacero spôsobov odomykania vrátane biometrických funkcií, PIN kódu a
                    vzdialeného ovládania. Kompatibilný s väčšinou štandardných dverí a ľahko inštalovateľný.
                </p>

                <div class="product-price">149€</div>

                <span class="product-availability">✓ Skladom</span>

                <div class="quantity-selector">
                    <span class="quantity-label">Množstvo:</span>
                    <div class="quantity-controls">
                        <button class="quantity-btn" onclick="decreaseQuantity()">−</button>
                        <span class="quantity-value" id="quantity">1</span>
                        <button class="quantity-btn" onclick="increaseQuantity()">+</button>
                    </div>
                </div>

                <button class="add-to-cart-btn" onclick="addToCart()">🛒 Pridať do košíka</button>
            </div>
        </div>

        <!-- Parameters Section -->
        <div class="product-parameters">
            <h2 class="parameters-title">Parametre</h2>
            <div class="parameters-grid">
                <div class="parameter-item">
                    <span class="parameter-label">Typ produktu</span>
                    <span class="parameter-value">Inteligentný zámok</span>
                </div>
                <div class="parameter-item">
                    <span class="parameter-label">Konektivita</span>
                    <span class="parameter-value">WiFi, Bluetooth 5.0</span>
                </div>
                <div class="parameter-item">
                    <span class="parameter-label">Napájanie</span>
                    <span class="parameter-value">4x AA batérie (výdrž 12 mesiacov)</span>
                </div>
                <div class="parameter-item">
                    <span class="parameter-label">Materiál</span>
                    <span class="parameter-value">Hliníková zliatina, tvrdené sklo</span>
                </div>
                <div class="parameter-item">
                    <span class="parameter-label">Rozměry</span>
                    <span class="parameter-value">156 x 72 x 28 mm</span>
                </div>
                <div class="parameter-item">
                    <span class="parameter-label">Hmotnosť</span>
                    <span class="parameter-value">680g</span>
                </div>
                <div class="parameter-item">
                    <span class="parameter-label">Odolnosť</span>
                    <span class="parameter-value">IP65 (prachu a vode odolný)</span>
                </div>
                <div class="parameter-item">
                    <span class="parameter-label">Spôsoby odomykania</span>
                    <span class="parameter-value">PIN, odtlačok prsta, aplikácia, klúč</span>
                </div>
                <div class="parameter-item">
                    <span class="parameter-label">Počet užívateľov</span>
                    <span class="parameter-value">Až 100 používateľov</span>
                </div>
                <div class="parameter-item">
                    <span class="parameter-label">Kompatibilita</span>
                    <span class="parameter-value">iOS 12+, Android 8+</span>
                </div>
                <div class="parameter-item">
                    <span class="parameter-label">Záruka</span>
                    <span class="parameter-value">24 mesiacov</span>
                </div>
                <div class="parameter-item">
                    <span class="parameter-label">Krajina pôvodu</span>
                    <span class="parameter-value">Nemecko</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require './footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Get product data from sessionStorage
            const productData = JSON.parse(sessionStorage.getItem('selectedProduct'));

            if (productData) {
                // Update product details
                document.querySelector('.product-name').textContent = productData.name;
                document.querySelector('.product-description').textContent = productData.description;
                document.querySelector('.product-price').textContent = `${productData.base_price}€`;

                // Update breadcrumb
                document.getElementById('breadcrumb-product').textContent = productData.name;

                // Update product image
                const carouselContainer = document.querySelector('.carousel-container');
                carouselContainer.innerHTML = `
                    <div class="carousel-slide active">
                        <img src="${productData.photo_link}" alt="${productData.name}" style="width: 100%; height: 100%; object-fit: contain;">
                    </div>
                `;

                // Update carousel indicators to show only one dot
                const carouselIndicators = document.querySelector('.carousel-indicators');
                carouselIndicators.innerHTML = `
                    <span class="indicator active"></span>
                `;

                // Remove carousel buttons since we only have one image
                const carouselButtons = document.querySelectorAll('.carousel-btn');
                carouselButtons.forEach(button => button.style.display = 'none');

                // Update availability status
                const availabilitySpan = document.querySelector('.product-availability');
                if (parseInt(productData.status) > 10) {
                    availabilitySpan.textContent = '✓ Skladom';
                    availabilitySpan.style.background = '#dcfce7';
                    availabilitySpan.style.color = '#15803d';
                } else if (parseInt(productData.status) > 0) {
                    availabilitySpan.textContent = 'Posledné kusy';
                    availabilitySpan.style.background = '#fef3c7';
                    availabilitySpan.style.color = '#b45309';
                } else {
                    availabilitySpan.textContent = 'Vypredané';
                    availabilitySpan.style.background = '#fee2e2';
                    availabilitySpan.style.color = '#dc2626';
                }

                // Update add to cart button functionality
                document.querySelector('.add-to-cart-btn').onclick = () => {
                    const quantity = document.getElementById('quantity').textContent;
                    alert(`Pridané do košíka: ${quantity}x ${productData.name}`);
                };
            } else {
                // Redirect back to products page if no product was selected
                window.location.href = 'produkty.html';
            }
        });

        let currentSlide = 0;
        let quantity = 1;

        // Carousel functions
        function changeSlide(direction) {
            const slides = document.querySelectorAll('.carousel-slide');
            const indicators = document.querySelectorAll('.indicator');

            slides[currentSlide].classList.remove('active');
            indicators[currentSlide].classList.remove('active');

            currentSlide = (currentSlide + direction + slides.length) % slides.length;

            slides[currentSlide].classList.add('active');
            indicators[currentSlide].classList.add('active');
        }

        function goToSlide(index) {
            const slides = document.querySelectorAll('.carousel-slide');
            const indicators = document.querySelectorAll('.indicator');

            slides[currentSlide].classList.remove('active');
            indicators[currentSlide].classList.remove('active');

            currentSlide = index;

            slides[currentSlide].classList.add('active');
            indicators[currentSlide].classList.add('active');
        }

        // Quantity functions
        function increaseQuantity() {
            quantity++;
            document.getElementById('quantity').textContent = quantity;
        }

        function decreaseQuantity() {
            if (quantity > 1) {
                quantity--;
                document.getElementById('quantity').textContent = quantity;
            }
        }

        // Add to cart
        function addToCart() {
            alert(`Pridané do košíka: ${quantity}x Smart Door Lock`);
        }

        // Mobile menu toggle
        const mobileMenu = document.getElementById('mobile-menu');
        const navLinks = document.getElementById('nav-links');

        mobileMenu.addEventListener('click', () => {
            mobileMenu.classList.toggle('active');
            navLinks.classList.toggle('active');
        });

        // Close menu when clicking on a link
        const menuLinks = navLinks.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('active');
                navLinks.classList.remove('active');
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileMenu.contains(e.target) && !navLinks.contains(e.target)) {
                mobileMenu.classList.remove('active');
                navLinks.classList.remove('active');
            }
        });

        // auth UI handled by shared script
    </script>

    <!-- load shared auth UI script -->
    <script src="js/auth.js"></script>
</body>

</html>