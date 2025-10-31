<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UnitMate - Objednávky</title>
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
            --warning: #f59e0b;
            --danger: #ef4444;
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


        /* Orders Header */
        .orders-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 120px 2rem 60px;
            text-align: center;
            margin-top: 60px;
        }


        .orders-header h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            font-weight: 800;
        }


        .orders-header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }


        /* Orders Container */
        .orders-container {
            max-width: 1200px;
            margin: 40px auto 80px;
            padding: 0 2rem;
        }


        .order-card {
            background: white;
            border-radius: 10px;
            padding: 1rem 1.5rem;
            margin-bottom: 0.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
            display: grid;
            grid-template-columns: 100px 200px minmax(200px, 1fr) 120px 100px 140px;
            align-items: center;
            gap: 1.5rem;
        }


        .order-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        }


        .order-info {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            min-width: auto;
        }


        .order-id {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--primary);
            background: #e0e7ff;
            padding: 0.25rem 0.6rem;
            border-radius: 6px;
            white-space: nowrap;
        }


        .customer-info {
            flex: 1;
            min-width: 180px;
        }


        .customer-name {
            font-size: 1rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.1rem;
        }


        .delivery-address {
            color: #64748b;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }


        .products-info {
            min-width: auto;
            color: #64748b;
            font-size: 0.85rem;
        }


        .products-info strong {
            color: var(--text);
        }


        .order-meta {
            display: contents;
        }


        .delivery-info {
            min-width: auto;
        }


        .price-info {
            min-width: auto;
        }


        .order-status {
            width: 140px;
            text-align: center;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            /* Added this for round edges */
            font-size: 0.85rem;
            font-weight: 500;
        }


        .status-processing-new {
            background: #fef3c7;
            color: #b45309;
        }


        .status-shipped {
            background: #e0e7ff;
            color: #4338ca;
        }


        .status-delivered {
            background: #dcfce7;
            color: #15803d;
        }


        .status-cancelled {
            background: #fee2e2;
            color: #dc2626;
        }


        .no-orders {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }


        .no-orders h2 {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }


        .no-orders p {
            color: #64748b;
            font-size: 1.1rem;
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


        @media (max-width: 1024px) {
            .products-info {
                flex: 1;
                min-width: 200px;
            }

            .order-meta {
                gap: 1rem;
            }
        }


        @media (max-width: 768px) {
            .orders-header h1 {
                font-size: 2rem;
            }


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


            .order-card {
                display: flex;
                flex-wrap: wrap;
                padding: 0.6rem 1rem;
                gap: 0.75rem;
            }


            .order-info {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
                min-width: 100%;
            }


            .order-meta {
                display: flex;
                width: 100%;
                justify-content: space-between;
            }


            .products-info {
                display: none;
            }


            .order-meta {
                width: 100%;
                justify-content: space-between;
                gap: 0.75rem;
            }


            .delivery-info {
                align-items: flex-start;
            }


            .footer-content {
                grid-template-columns: 1fr;
            }


            .orders-grid-header {
                display: none;
            }
        }

        .orders-grid-header {
            display: grid;
            grid-template-columns: 100px 200px minmax(200px, 1fr) 120px 100px 140px;
            gap: 1.5rem;
            padding: 1rem 1.5rem;
            background: var(--primary);
            color: white;
            border-radius: 10px;
            margin-bottom: 1rem;
            font-weight: 500;
            align-items: center;
        }

        /* add profile/navbar styles so auth UI matches */
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
    </style>
</head>

<body>
    <!-- Navbar -->
    <?php require './header.php'; ?>


    <!-- Orders Header -->
    <section class="orders-header">
        <h1>Moje objednávky</h1>
        <p>Prehľad všetkých vašich objednávok</p>
    </section>


    <!-- Orders Container -->
    <section class="orders-container" id="ordersContainer">
        <!-- Orders will be populated by JavaScript -->
    </section>


    <!-- Footer -->
    <?php require './footer.php'; ?>


    <script>
        // Orders data
        const orders = [
            {
                id: "ORD-001",
                customerName: "Ján Novák",
                deliveryAddress: "Hlavná 123, Bratislava 811 01",
                products: "Smart Door Lock, WiFi Security Camera, Motion Sensor",
                status: "delivered",
                price: "283€",
                deliveryDate: "25.10.2025",
                deliveryTime: "14:30"
            },
            {
                id: "ORD-002",
                customerName: "Mária Horváthová",
                deliveryAddress: "Kvetná 45, Košice 040 01",
                products: "Smart Thermostat, Smart Light Hub",
                status: "shipped",
                price: "208€",
                deliveryDate: "29.10.2025",
                deliveryTime: "10:00"
            },
            {
                id: "ORD-003",
                customerName: "Peter Kováč",
                deliveryAddress: "Sadová 78, Žilina 010 01",
                products: "Smart Doorbell, Water Leak Detector, Smart Plug",
                status: "processing",
                price: "203€",
                deliveryDate: "30.10.2025",
                deliveryTime: "15:45"
            },
            {
                id: "ORD-004",
                customerName: "Eva Tóthová",
                deliveryAddress: "Dlhá 12, Prešov 080 01",
                products: "Smart Door Lock, Smart Thermostat, Smart Plug",
                status: "pending",
                price: "207€",
                deliveryDate: "31.10.2025",
                deliveryTime: "11:20"
            },
            {
                id: "ORD-005",
                customerName: "Lukáš Baláž",
                deliveryAddress: "Nová 56, Nitra 949 01",
                products: "WiFi Security Camera (2x), Motion Sensor (3x)",
                status: "delivered",
                price: "313€",
                deliveryDate: "23.10.2025",
                deliveryTime: "16:00"
            },
            {
                id: "ORD-006",
                customerName: "Katarína Szabová",
                deliveryAddress: "Pekná 89, Banská Bystrica 974 01",
                products: "Smart Smoke Detector",
                status: "cancelled",
                price: "69€",
                deliveryDate: "-",
                deliveryTime: ""
            },
            {
                id: "ORD-007",
                customerName: "Martin Varga",
                deliveryAddress: "Krátka 34, Trnava 917 01",
                products: "Smart Light Hub, Smart Plug (3x), Motion Sensor",
                status: "shipped",
                price: "211€",
                deliveryDate: "29.10.2025",
                deliveryTime: "13:15"
            }
        ];


        // Get status info
        function getStatusInfo(status) {
            switch (status) {
                case 'pending':
                case 'processing':
                    return { text: 'V spracovaní', class: 'status-processing-new' };
                case 'shipped':
                    return { text: 'Odoslané', class: 'status-shipped' };
                case 'delivered':
                    return { text: 'Doručené', class: 'status-delivered' };
                case 'cancelled':
                    return { text: 'Zrušené', class: 'status-cancelled' };
                default:
                    return { text: 'Neznámy stav', class: 'status-processing-new' };
            }
        }


        // Render orders
        function renderOrders() {
            const container = document.getElementById('ordersContainer');

            if (orders.length === 0) {
                container.innerHTML = `
                    <div class="no-orders">
                        <h2>Zatiaľ žiadne objednávky</h2>
                        <p>Ešte ste nevytvorili žiadnu objednávku.</p>
                    </div>
                `;
                return;
            }

            // Update the header row in renderOrders function
            container.innerHTML = `
                <div class="orders-grid-header">
                    <div>ID</div>
                    <div>Zákazník</div>
                    <div>Produkty</div>
                    <div>Doručenie</div>
                    <div>Cena</div>
                    <div>Stav</div>
                </div>
            `;

            // Add order cards
            container.innerHTML += orders.map(order => {
                const statusInfo = getStatusInfo(order.status);
                const deliveryInfo = order.status === 'cancelled'
                    ? '<span style="color: #94a3b8;">Zrušené</span>'
                    : `${order.deliveryDate} o ${order.deliveryTime}`;

                // Update the order card template
                return `
                    <div class="order-card">
                        <div class="order-id">${order.id}</div>
                        <div class="customer-info">
                            <div class="customer-name">${order.customerName}</div>
                            <div class="delivery-address">📍 ${order.deliveryAddress}</div>
                        </div>
                        <div class="products-info">${order.products}</div>
                        <div class="delivery-date">${deliveryInfo}</div>
                        <div class="price-value">${order.price}</div>
                        <div class="order-status ${statusInfo.class}">${statusInfo.text}</div>
                    </div>
                `;
            }).join('');
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

        renderOrders();
        // auth UI handled by shared script
    </script>

    <!-- load shared auth UI script -->
    <script src="js/auth.js"></script>
</body>

</html>