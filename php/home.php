<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UnitMate - Pokoj v každom vchode</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/default.css">

</head>

<body>
    <!-- Navbar -->
    <?php require './header.php'; ?>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <h1>UnitMate</h1>
        <p>Pokoj v každom vchode</p>
        <button class="cta-button">Začať teraz</button>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <h2 class="section-title">Inteligentné riešenia pre váš domov</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🏠</div>
                <h3>Smart Monitoring</h3>
                <p>Sledujte svoj domov kedykoľvek a kdekoľvek pomocou moderných technológií a mobilnej aplikácie.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Bezpečnosť</h3>
                <p>Pokročilé zabezpečenie s automatickým zamykaním a kontrolou prístupu pre maximálny pokoj.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💡</div>
                <h3>Automatizácia</h3>
                <p>Inteligentné ovládanie osvetlenia, vykurovania a ostatných zariadení pre pohodlie a úsporu energie.
                </p>
            </div>
        </div>
    </section>

    <!-- Banner -->
    <section class="banner">
        <h2>Prečo zvoliť UnitMate?</h2>
        <p>Poskytujeme komplexné riešenie pre moderné bývanie s dôrazom na bezpečnosť, pohodlie a úsporu energie. Naše
            technológie sú navrhnuté tak, aby vám uľahčili každodenný život.</p>
        <button class="cta-button">Zistiť viac</button>
    </section>

    <!-- Team Section -->
    <section class="team" id="team">
        <h2 class="section-title">Náš tím</h2>
        <div class="team-grid">
            <!-- Row 1: 2 people - Leadership -->
            <h1 style="display: flex; justify-content: center;">Dizajn</h1>
            <div class="team-row team-row-2">
                <div class="team-member manager">
                    <div class="team-photo">ŠN</div>
                    <h3>Šimon Neumeister</h3>
                    <p>Manažér</p>
                </div>
                <div class="team-member">
                    <div class="team-photo">MO</div>
                    <h3>Matúš Ondrejička</h3>
                </div>
                <div class="team-member manager">
                    <div class="team-photo">ŠG</div>
                    <h3>Šarlota Gallovičová</h3>
                    <p>Manažérka
                </div>
            </div>

            <div class="team-section-divider"></div>
            <h1 style="display: flex; justify-content: center;">Softvér</h1>
            <!-- Row 2: 2 people - Development -->
            <div class="team-row team-row-2">

                <div class="team-member">
                    <div class="team-photo">TK</div>
                    <h3>Tomáš Koštial</h3>
                </div>
                <div class="team-member">
                    <div class="team-photo">PD</div>
                    <h3>Pavol Dunka</h3>
                </div>
            </div>

            <div class="team-section-divider"></div>

            <!-- Row 3: 3 people - Product & Design -->
            <h1 style="display: flex; justify-content: center;">Údržba siete</h1>
            <div class="team-row team-row-3">
                <div class="team-member">
                    <div class="team-photo">ŠP</div>
                    <h3>Šimon Piršel</h3>

                </div>
                <div class="team-member">
                    <div class="team-photo">MD</div>
                    <h3>Martin Diačik</h3>

                </div>
            </div>

            <div class="team-section-divider"></div>

            <!-- Row 4: 2 people - Sales & Support -->
            <h1 style="display: flex; justify-content: center;">IoT a Smart tech</h1>
            <div class="team-row team-row-2">
                <div class="team-member">
                    <div class="team-photo">KŽ</div>
                    <h3>Kristián Žuffa</h3>
                </div>
                <div class="team-member">
                    <div class="team-photo">MP</div>
                    <h3>Martin Pospíšil</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Image Banner -->
    <section class="image-banner">
        <div class="image-banner-content">
            <h2>Moderné technológie pre váš komfort</h2>
        </div>
    </section>

    <!-- Footer -->
    <?php require './footer.php'; ?>

    <script>
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
    </script>

    <!-- include shared auth script -->
    <script src="html/js/auth.js"></script>
</body>

</html>